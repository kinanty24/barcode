<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\RekapAbsen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarcodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswa = Mahasiswa::all();
        $title = "Data Barcode";

        return view('admin.barcode.index', compact('mahasiswa', 'title'));
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    public function absensi(Request $request)
    {
        // dd($request->all());
        $kode = $request->code;
        $mahasiswa = Mahasiswa::where('user_id', auth()->user()->id)->first();
        // $mahasiswa = Mahasiswa::where('n')
        $dosen = Dosen::with('matkul')->where('barcode', $kode)->first();
        // dd($dosen);

        $rekap = RekapAbsen::where([
            'id_mahasiswa' => $mahasiswa->id,

        ])->first();


        if (isset($rekap)) {
            $cek = RekapAbsen::where(
                'id_mahasiswa',
                $mahasiswa->id
            )->whereDate('tanggal', date('Y-m-d', strtotime($rekap->tanggal)))->first();
            // dd($cek);
            if ($cek) {
                return response()->json([
                    'message' => 'Error',
                    'status' => '400',
                    'data' => $dosen

                ]);
            }
        }

        RekapAbsen::create([
            'id_dosen' => $dosen->id,
            'id_mahasiswa' => $mahasiswa->id,
            'tanggal' => now(),
        ]);
        return response()->json([
            'message' => 'success',
            'status' => '200',
            'data' => $dosen
        ]);




        // $absen = DB::table('absensi')->insert([
        //     'kode_mhs' => $kode_mhs,
        //     'tgl_masuk' => date('Y-m-d', strtotime(now()))
        // ]);
    }
}
