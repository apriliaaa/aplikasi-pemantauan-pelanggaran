<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Storage;
use App\Models\Item;
use App\Models\Mahasiswa;
use App\Models\Pelanggaran;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $image = str_replace('data:image/png;base64,', '', $request->image);
        $image = str_replace(' ', '+', $image);
        $imageName = Str::random(10).'.'.'png';

        $this->validate($request, [
            'name' => 'required',
            'nim' => 'required|min:13',
            'id_user' => 'required',
            'id_pelanggaran' => 'required',
            'id_item' => 'required',
            // 'foto' => 'required',
        ]);

        $mahasiswa = Mahasiswa::create([
            'name' => $request->name,
            'nim' => $request->nim,
            'id_user' => $request->id_user,
            'id_pelanggaran' => $request->id_pelanggaran,
            'id_item' => $request->id_item,
            'foto' => $imageName,
            
        ]);

        if ($mahasiswa) {
            Storage::disk('local')->put($imageName, base64_decode($image));
            return redirect()->route('mahasiswa.create')->with('success', 'Data berhasil disimpan!');
        }
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
}
