<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MatkulController;
use App\Http\Controllers\BarcodeController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\RekapAbsenController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware(['auth', 'CekLogin:1,2,3']);


Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/doLogin', [LoginController::class, 'doLogin'])->name('doLogin')->middleware('guest');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');


Route::resource('/mahasiswa', MahasiswaController::class)->middleware('auth')->except(['index', 'show', 'destroy']);
Route::resource('/mahasiswa', MahasiswaController::class)->middleware('auth')->only(['index', 'show']);


Route::get('/mahasiswa/destroy/{id}', [MahasiswaController::class, 'destroy'])->middleware('auth')->name('mahasiswa.destroy');
Route::resource('/barcode', BarcodeController::class)->middleware('auth')->except(['index', 'show', 'destroy']);
Route::resource('/barcode', BarcodeController::class)->middleware('auth')->only(['index', 'show']);

Route::resource('/dosen', DosenController::class)->middleware('auth')->except(['index', 'show', 'destroy']);
Route::resource('/dosen', DosenController::class)->middleware('auth')->only(['index', 'show']);

Route::get('/dosen/destroy/{id}', [DosenController::class, 'destroy'])->middleware('auth')->name('dosen.destroy');

Route::resource('/matkul', MatkulController::class)->middleware('auth')->except(['index', 'show', 'destroy']);
Route::resource('/matkul', MatkulController::class)->middleware('auth')->only(['index', 'show']);

Route::get('/matkul/destroy/{id}', [MatkulController::class, 'destroy'])->middleware('auth')->name('matkul.destroy');

Route::post('/absensi', [BarcodeController::class, 'absensi'])->middleware(['auth'])->name('absensi');

// Route::get('/rekap_absen/destroy/{id}', [RekapAbsenController::class, 'destroy'])->middleware('auth')->name('rekap_absen.destroy');
// Route::resource('/rekap_absen', RekapAbsenController::class)->middleware('auth')->except(['destroy']);
// Route::resource('/rekap_absen', RekapAbsenController::class)->middleware('auth')->only(['index', 'show']);

Route::get('rekap_absen/filter', [RekapAbsenController::class, 'filter'])->middleware(['auth'])->name('rekap_absen.filter');
Route::get('rekap_absen/index', [RekapAbsenController::class, 'index'])->middleware(['auth'])->name('rekap_absen.index');
Route::get('rekap_absen/store', [RekapAbsenController::class, 'store'])->middleware(['auth'])->name('rekap_absen.store');
// Route::get('rekap_absen/filter','RekapAbsenController@filter')->middleware(['auth'])->name('rekap_absen.filter');
