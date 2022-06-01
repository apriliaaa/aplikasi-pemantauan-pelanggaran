<?php

namespace App\Http\Controllers;

use App\Models\ProgramStudi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $admin = User::where('nama','LIKE','%'.$request->search.'%')
                ->orWhere('email','LIKE','%'.$request->search.'%')
                ->orWhere('role','LIKE','%'.$request->search.'%')
                ->paginate(10);
        }else{
            // $admin = User::with('program_studi')->paginate(10);
            // $admin   = DB::table('users')->where('role', 'Admin')->get();
            $admin = User::with('program_studi')->where('role', 'Admin')->paginate(10);
                
        }

        return view('admin.data-admin', compact('admin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $program_studi = ProgramStudi::all();
        return view('admin.create', compact('program_studi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'id_prodi' => 'required',
            'role' => 'required',
            'name' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|min:8',
        ]);

        $admin = User::create([
            'id_prodi' => $request->id_prodi,
            'role' => $request->role,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if($admin){
            return redirect()->route('admin.create')->with('success', 'Data berhasil disimpan!');
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
        $admin = User::with('program_studi')->findorfail($id);
        return view('admin.edit-admin', compact('admin', 'program_studi'));
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
        $admin = User::findorfail($id);
        $admin->update($request->all());
        return redirect()->route('admin.data')->with('success', 'Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = User::findorfail($id);
        $admin->delete();
        return back()->with('success', 'Data berhasil dihapus!');
    }
}
