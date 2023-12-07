<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dosen;
use App\Models\Matkul;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $dosen = Dosen::with('matkul')->get();
        $matkul = Matkul::all();
        $days = Dosen::Days;

        $title = "Data Dosen";
        return view('admin.dosen.index', compact('dosen', 'matkul', 'days', 'title'));
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
            'nidn' => 'required|unique:data_dosen,nidn',
            // 'user_id' => $createUser->id,
            'email' => 'required|email|unique:users,email',
            'id_matkul' => 'required',
            'days' => 'required',
            'start' => 'required',
            'end' => 'requi red',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            Alert::error('Gagal Input', $validator->messages()->all()[0]);
            return redirect()->back()->withInput();
        }
        $createUser = User::create([
            'role_id' => 2,
            'name' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make('123'),
        ]);
        $createDosen = Dosen::create([
            'nama' => $request->nama,
            'nidn' => $request->nidn,
            'user_id' => $createUser->id,
            'id_matkul' => $request->id_matkul,
            'days' => $request->days,
            'start' => $request->start,
            'end' => $request->end,
            'barcode' => mt_rand(10000000, 999999999),
            // 'ttl' => $request->ttl,
            // 'agama' => $request->agama,
            // 'jk' => $request->jk,
            // 'alamat' => $request->alamat,

        ]);



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
        $getData = Dosen::where('id', '=', $id)->first();
        $user = User::where('id', $getData->user_id)->first();
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'nidn' => 'required|unique:data_dosen,nidn,' . $getData->id,
            // 'user_id' => $createUser->id,
            'email' => 'required|email|unique:users,email,' . $user->id,
            'id_matkul' => 'required',
            'days' => 'required',
            'start' => 'required',
            'end' => 'required',
        ]);





        if ($validator->fails()) {
            $errors = $validator->errors();
            Alert::error('Gagal Input', $validator->messages()->all()[0]);
            return redirect()->back()->withInput();
        }



        $updateData = $getData->update([
            'nama' => $request->nama,
            'nidn' => $request->nidn,
            'id_matkul' => $request->id_matkul,
            'days' => $request->days,
            'start' => $request->start,
            'end' => $request->end,
            // 'ttl' => $request->ttl,
            // 'agama' => $request->agama,
            // 'jk' => $request->jk,
            // 'alamat' => $request->alamat,
        ]);

        $createUser = $user->update([
            'role_id' => 2,
            'name' => $request->nama,
            'email' => $request->email,
            // 'password' => Hash::make('123'),
        ]);

        Alert::success('Berhasil', 'Data Berhasil Diubah');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $getData = Dosen::where('id', '=', $id)->first();
        $deleteData = $getData->delete();


        $user = User::where('id', $getData->user_id)->delete();
        Alert::success('Berhasil', 'Data Berhasil Dihapus');
        return redirect()->back();
    }
}
