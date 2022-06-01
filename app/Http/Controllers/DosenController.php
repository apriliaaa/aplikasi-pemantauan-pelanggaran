<?php

namespace App\Http\Controllers;

use App\Models\ProgramStudi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;


class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->query('search')){
            $dosen = User::where('name','LIKE','%'.$request->search.'%')
                ->orWhere('email','LIKE','%'.$request->search.'%')
                ->orWhere('role','LIKE','%'.$request->search.'%')
                ->paginate(10);
            // while ($dosen === 0) {
            //     Alert::toast('Data tidak ditemukan!', 'warning')->autoClose(500)->animation('animate__fadeInUp', '');
            // }
        }else{
            
            $dosen = User::with('program_studi')->where('role', 'Dosen')->paginate(10);
        }
        // memanggil data dosen
        // $dosen = Dosen::with('program_studi')->paginate(10);
        return view('dosen.data-dosen', compact('dosen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // memanggil data program studi
        $program_studi = ProgramStudi::all();
        return view('dosen.create-dosen', compact('program_studi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // create validate
        $this->validate($request, [
            'id_prodi' => 'required',
            'role' => 'required',
            'name' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|min:8',
        ]);

        $dosen = User::create([
            'id_prodi' => $request->id_prodi,
            'role' => $request->role,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if ($dosen) {
            return redirect()->route('dosen.create')->with('success', 'Data berhasil disimpan!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $program_studi = ProgramStudi::all();
        $dosen = User::with('program_studi')->findorfail($id);
        return view('dosen.edit-dosen', compact('dosen', 'program_studi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dosen = User::findorfail($id);
        $dosen->update($request->all());
        return redirect()->route('dosen.data')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dosen = User::findorfail($id);
        $dosen->delete();
        return back()->with('success', 'Data berhasil dihapus!');
    }
}
