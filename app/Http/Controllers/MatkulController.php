<?php

namespace App\Http\Controllers;

use App\Models\Matkul;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class MatkulController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $matkul = Matkul::all();

        $title="Data Matkul";
        return view('admin.matkul.index',compact('matkul','title'));
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
       $matkul =new Matkul();
       $matkul->nm_matkul=$request->nm_matkul;
       $matkul->save();
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
        $matkul =Matkul::find($id);
       $matkul->nm_matkul=$request->nm_matkul;
       $matkul->save();
       Alert::success('Berhasil', 'Data Berhasil Diedit');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $matkul = Matkul::destroy($id);

       Alert::success('Berhasil', 'Data Berhasil Dihapus');
        return redirect()->back();
    }
}
