<?php

namespace App\Http\Controllers;

use App\Models\DaftarPelanggaran;
use Illuminate\Support\Facades\Storage;
use App\Models\Item;
use App\Models\Mahasiswa;
use App\Models\Pelanggaran;
use App\Models\ProgramStudi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use PDF;


class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->query('search')) {
            $mhs = Mahasiswa::where('nim', 'LIKE', '%'.$request->search.'%')
                        ->orWhere('name', 'LIKE', '%'.$request->search.'%');
                        // ->pagination(10);
        }else{
            $daftar_pelanggaran = DaftarPelanggaran::with('mahasiswa','user','pelanggaran','item')->paginate(10);
            // return view('mahasiswa.data-mahasiswa', compact('daftar_pelanggaran'));
        }

        return view('mahasiswa.data-mahasiswa', compact('daftar_pelanggaran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $program_studi = ProgramStudi::all();
        $pelanggaran = Pelanggaran::all();
        $item = Item::all();
        $user = User::all();
        $id_user = Auth::user()->id;
        $nama_user = Auth::user()->name;
        return view('mahasiswa.create-mahasiswa', compact('pelanggaran', 'item', 'id_user', 'nama_user', 'program_studi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = str_replace('data:image/png;base64,', '', $request->foto);
        $image = str_replace(' ', '+', $image);
        $imageName = Str::random(10).'.'.'png';

        

        $this->validate($request, [
            'name' => 'required',
            'nim' => 'required|min:12',
            'id_prodi' => 'required',
            // 'id_user' => 'required',
            // 'id_pelanggaran' => 'required',
            // 'id_item' => 'required',
            // 'foto' => 'required',
        ]);

        
        // get mahasiswa exist
        // $mahasiswa = Mahasiswa::all();

        $nim = $request->nim;

        $mahasiswaLength = Mahasiswa::where('nim', $nim)->count();
        if($mahasiswaLength > 0){
            // $mahasiswaLength = Mahasiswa::where('nim', $nim)->first();
            // dd();
            $id = Mahasiswa::where('nim', $nim)->first()->id;
        }else{

            // create mahasiswa
            
            $mahasiswa = Mahasiswa::create([
                'name' => $request->name,
                'nim' => $request->nim,
                'id_prodi' => $request->id_prodi,
                // 'id_user' => $request->id_user,
                // 'id_pelanggaran' => $request->id_pelanggaran,
                // 'id_item' => $request->id_item,
                // 'foto' => $imageName,
                
            ]);
            
            // get 1 data mahasiswa paling baru
            $mahasiswa_get = Mahasiswa::orderBy('id', 'desc')->limit(1)->first();
            $id = $mahasiswa_get->id;
        }

        

        
        // dd($mahasiswa);




        // create daftar pelanggaran
            // taruh id dari mhs terbaru
        $daftar_pelanggaran = DaftarPelanggaran::create([
            'id_mahasiswa' => $id,
            'id_pelanggaran' => $request->id_pelanggaran, 
            'id_user' => $request->id_user,
            'id_item' => $request->id_item,
            'id_prodi' => $request->id_prodi,
            'foto' => $imageName,
        ]);

        
        if ($daftar_pelanggaran) {
            Storage::disk('public')->put($imageName, base64_decode($image));
            return redirect()->route('mahasiswa.create')->with('success', 'Data berhasil disimpan!');
        }


        // $mahasiswa = Mahasiswa::create($request->all());
        
        // $pelanggaran = $request->input('id_pelanggaran');
        // $user = $request->input('id_user');


        // $mahasiswa->pelanggaran()->attach($request->input('id_pelanggaran'));
        // $mahasiswa->user()->attach($request->input('id_user'));


        // if ($mahasiswa) {
        //     Storage::disk('local')->put($imageName, base64_decode($image));
        //     return redirect()->route('mahasiswa.create')->with('success', 'Data berhasil disimpan!');
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        //
    }

    public function detailReport()
    {
        $program_studi = ProgramStudi::all();
        $pelanggaran = DaftarPelanggaran::groupBy('id_pelanggaran')
                        ->select('id_pelanggaran', DB::raw('count(*) as jumlah'))
                        ->get();

        // $daftar_pelanggaran = DaftarPelanggaran::with('pelanggaran')->$pelanggaran->paginate(10);
        // Genre::withCount('bands')->orderBy('name', 'asc')->paginate(10);
        // $daftar_pelanggaran = DaftarPelanggaran::groupBy('id_pelanggaran')->get();
        // $pelanggaran = DaftarPelanggaran::withCount()->groupBy('id_pelanggaran');
        // echo $jumlah_pelanggaran;
        // $daftar_pelanggaran = DaftarPelanggaran::count('id_pelanggaran')->groupBy('id_pelanggaran', 'asc')->get();
        // dd($daftar_pelanggaran);
        return view('laporan.laporan-detail-prodi', compact('program_studi', 'pelanggaran'));
    }

    // public function prodiReport()
    // {
    //     // join('program_studi', 'program_studi.id', '=', 'mahasiswa', 'mahasiswa.id_prodi')
    //     $program_studi = ProgramStudi::all();
    //     $prodi = DaftarPelanggaran::join('mahasiswa','mahasiswa.id', '=', 'daftar_pelanggaran.id_mahasiswa')
    //             // ->join('program_studi', 'program_studi.id', '=', 'mahasiswa', 'mahasiswa.id_prodi')
    //             ->select('mahasiswa.id', 'mahasiswa.id_prodi', DB::raw('count(*) as total'))
    //             ->groupBy('mahasiswa.id_prodi')
    //             ->get();
    //     // echo $prodi;
    //     // dd($program_studi);
    //     return view('laporan.laporan-prodi', compact('prodi', 'program_studi'));
    // }

    public function prodiReport()
    {
        
        $nama_prodi = ProgramStudi::all();
        $program_studi = DaftarPelanggaran::groupBy('id_prodi')->select('id_prodi', DB::raw('count(*) as total'))->get();
        return view('laporan.laporan-prodi', compact( 'program_studi', 'nama_prodi'));
    }

    public function mahasiswaReport()
    {
        $mahasiswa = DaftarPelanggaran::groupBy('id_mahasiswa')->select('id_mahasiswa', DB::raw('count(*) as total'))->get();
        // echo $mahasiswa;
        return view('laporan.laporan-mahasiswa', compact('mahasiswa'));
    }

    // Cetak laporan mahasiswa
    public function cetakLaporanMhs()
    {
        // $data = [
        //     'title' => 'Welcome to ItSolutionStuff.com',
        //     'date' => date('m/d/Y')
        // ];
          
        // // $pdf = PDF::loadView('myPDF', $data);
       
        // return $pdf->download('itsolutionstuff.pdf');

        $cetakMhs = DaftarPelanggaran::groupBy('id_mahasiswa')->select('id_mahasiswa', DB::raw('count(*) as total'))->get();
        return view('print-laporan.laporan-mahasiswa', compact('cetakMhs'));
    }
}
