<?php

namespace App\Http\Controllers;


use App\Models\Dosen;
use App\Models\Matkul;

use App\Models\Mahasiswa;
use App\Models\RekapAbsen;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class RekapAbsenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // dd($request->all());
        $dosen = Dosen::with('matkul')->find($request->dosen);
        // dd($dosen);
        $matkul = Matkul::all();
        $days = Dosen::Days;
        $rekapAbsen = RekapAbsen::where('id_dosen', $request->dosen)->whereDate('tanggal', date('Y-m-d', strtotime($request->tanggal)))->with('mahasiswa')->get();

        $title = "Data Rekap Absen";
        return view('admin.rekap_absen.index', compact('rekapAbsen', 'dosen', 'matkul', 'days', 'title'));
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

        $createRekapAbsen = RekapAbsen::create([
            'id' => $request->id,
            'id_mahasiswa' => $request->id_mahasiswa,
            'id_dosen' => $request->id_dosen,

            // 'days' => $request->days,
            // 'start' => $request->start,
            // 'end' => $request->end,
            // 'barcode' => mt_rand(10000000,999999999),
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
        // dd($request->all());

        $getData = RekapAbsen::where('id', '=', $id)->first();
        $updateData = $getData->update([
            // 'nama' => $request->nama,
            // 'nidn' => $request->nidn,
            'id_mahasiswa' => $request->id_mahsiswa,
            'id_dosen' => $request->id_dosen,

            // 'start' => $request->start,
            // 'end' => $request->end,
            // 'ttl' => $request->ttl,
            // 'agama' => $request->agama,
            // 'jk' => $request->jk,
            // 'alamat' => $request->alamat,
        ]);

        Alert::success('Berhasil', 'Data Berhasil Diubah');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $getData = RekapAbsen::where('id', '=', $id)->first();
        $deleteData = $getData->delete();

        Alert::success('Berhasil', 'Data Berhasil Dihapus');
        return redirect()->back();
    }


    public function filter()
    {
        $title = 'Filter Rekap Absen';
        if (auth()->user()->role_id == 2) {
            $dosen = Dosen::where('nama', auth()->user()->name)->get();
        } elseif (auth()->user()->role_id == 1) {

            $dosen = Dosen::with('matkul')->get();
        }

        return view('admin.rekap_absen.filter', compact('title', 'dosen'));
    }
}
