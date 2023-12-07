<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        $dosen = Dosen::with('matkul')->where('nama',auth()->user()->name)->first();
        $mahasiswa = Mahasiswa::where('nama',auth()->user()->name)->first();
        $title="Dashboard";

        return view('admin.index',compact('title','dosen','mahasiswa'));
    }
}
