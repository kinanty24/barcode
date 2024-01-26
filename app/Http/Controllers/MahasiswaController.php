<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $mahasiswa = Mahasiswa::all();
        $title = "Data Mahasiswa";

        return view('admin.mahasiswa.index', compact('mahasiswa', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'nim' => 'required|numeric',
            'email' => 'required|email|unique:users,email',
            'ttl' => 'required',
            'jk' => 'required',
            'prodi' => 'required',
            'agama' => 'required',

        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            Alert::error('Gagal Input', $validator->messages()->all()[0]);
            return redirect()->back()->withInput();
        }


        $mahasiswa = new Mahasiswa();

        $mahasiswa->nama = $request->nama;
        $mahasiswa->nim = $request->nim;
        $mahasiswa->ttl = $request->ttl;
        $mahasiswa->agama = $request->agama;
        $mahasiswa->jk = $request->jk;
        $mahasiswa->prodi = $request->prodi;
        $mahasiswa->alamat = $request->alamat;


        $mahasiswa->save();
        Alert::success('Berhasil', 'Data Berhasil Ditambahkan');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $mahasiswa = Mahasiswa::with('user')->find($id);



        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'nim' => 'required|numeric',
            'email' => 'required|email|unique:users,email,' . $mahasiswa->user->id,
            'ttl' => 'required',
            'jk' => 'required',
            'prodi' => 'required',
            'agama' => 'required',

        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            Alert::error('Gagal Input', $validator->messages()->all()[0]);
            return redirect()->back()->withInput();
        }


        $mahasiswa->nama = $request->nama;
        $mahasiswa->nim = $request->nim;
        $mahasiswa->ttl = $request->ttl;
        $mahasiswa->agama = $request->agama;
        $mahasiswa->jk = $request->jk;
        $mahasiswa->prodi = $request->prodi;
        $mahasiswa->alamat = $request->alamat;
        $mahasiswa->save();
        Alert::success('Berhasil', 'Data Berhasil Diedit');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Mahasiswa::find($id)->delete();
        Alert::success('Berhasil', 'Data Berhasil Dihapus');
        return redirect()->back();
    }
}