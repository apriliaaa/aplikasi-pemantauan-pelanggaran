<?php

namespace App\Http\Controllers;

use App\Models\DaftarPelanggaran;
use App\Models\DetailPelanggaran;
use Illuminate\Support\Facades\Storage;
use App\Models\Item;
use App\Models\Mahasiswa;
use App\Models\Pelanggaran;
use App\Models\ProgramStudi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\Input;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // if ($request->query('search')) {
        //     $mahasiswa = Mahasiswa::where('nim', 'LIKE', '%'.$request->search.'%')
        //                 ->orWhere('name', 'LIKE', '%'.$request->search.'%')
        //                 ->pagination(10);
        // }else{
            $daftar_pelanggaran = DaftarPelanggaran::with('mahasiswa','user','pelanggaran','item')->paginate(10);
        // }

        return view('mahasiswa.data-mahasiswa', compact('daftar_pelanggaran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pelanggaran = Pelanggaran::all();
        $item = Item::all();
        $user = User::all();
        $id_user = Auth::user()->id;
        $nama_user = Auth::user()->name;
        return view('mahasiswa.create-mahasiswa', compact('pelanggaran', 'item', 'id_user', 'nama_user'));
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
            'nim' => 'required|min:12|unique:mahasiswa',
            'id_prodi' => 'required',
            // 'id_user' => 'required',
            // 'id_pelanggaran' => 'required',
            // 'id_item' => 'required',
            // 'foto' => 'required',
        ]);

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
        
        // dd($mahasiswa);


        // get 1 data mahasiswa paling baru
        $mahasiswa_get = Mahasiswa::orderBy('id', 'desc')->limit(1)->first();
        $id = $mahasiswa_get->id;


        // create daftar pelanggaran
            // taruh id dari mhs terbaru
        $daftar_pelanggaran = DaftarPelanggaran::create([
            'id_mahasiswa' => $id,
            'id_pelanggaran' => $request->id_pelanggaran, 
            'id_user' => $request->id_user,
            'id_item' => $request->id_item,
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
        return view('laporan.laporan-detail-prodi', compact('program_studi'));
    }

    public function prodiReport()
    {
        return view('laporan.laporan-prodi');
    }

    public function mahasiswaReport()
    {
        return view('laporan.laporan-mahasiswa');
    }
}
