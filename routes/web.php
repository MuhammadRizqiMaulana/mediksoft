<?php

use Illuminate\Support\Facades\Route;

/* ----- AksesPengguna -----*/
/* ----- AksesPengguna -----*/

/* ----- Setup -----*/
use App\Http\Controllers\Setup\Pengirim_FaskesController;
use App\Http\Controllers\Setup\KaryawanController;
use App\Http\Controllers\Setup\PoliController;
use App\Http\Controllers\Setup\RuangController;
/* ----- Setup -----*/

/* ----- RekamMedis -----*/
/* ----- RekamMedis -----*/

/* ----- RawatJalan -----*/
use App\Http\Controllers\RawatJalan\Data_PendaftaranController;
/* ----- RawatJalan -----*/


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('AksesPengguna.Content.index');
});

/* ----- AksesPengguna -----*/
Route::get('/AksesPengguna', function () {
    return view('AksesPengguna.Content.index');
});

/* ----- AksesPengguna -----*/

/* ----- Setup -----*/
Route::get('/Setup', function () {
    return view('Setup.Content.index');
});
Route::get('/Pengirim_Faskes', [Pengirim_FaskesController::class, 'index']);
//Route::post('/Pengirim_Faskes/tambah', [Pengirim_FaskesController::class, 'tambah']);
Route::post('/Pengirim_Faskes/store', [Pengirim_FaskesController::class, 'store']);
Route::get('/Pengirim_Faskes/ubah{kodefaskes}', [Pengirim_FaskesController::class, 'ubah']);
Route::post('/Pengirim_Faskes/update{kodefaskes}', [Pengirim_FaskesController::class, 'update']);
Route::get('/Pengirim_Faskes/hapus{kodefaskes}', [Pengirim_FaskesController::class, 'hapus']);

Route::get('/Poli', [PoliController::class, 'index']);
Route::post('/Poli/store', [PoliController::class, 'store']);
Route::get('/Poli/ubah{kode}', [PoliController::class, 'ubah']);
Route::post('/Poli/update{kode}', [PoliController::class, 'update']);
Route::get('/Poli/hapus{kode}', [PoliController::class, 'hapus']);

Route::get('/Ruang', [RuangController::class, 'index']);
Route::post('/Ruang/store', [RuangController::class, 'store']);
Route::get('/Ruang/ubah{koderuang}', [RuangController::class, 'ubah']);
Route::post('/Ruang/update{koderuang}', [RuangController::class, 'update']);
Route::get('/Ruang/hapus{koderuang}', [RuangController::class, 'hapus']);

Route::get('/Karyawan', [KaryawanController::class, 'index']);
//Route::post('/Karyawan/tambah', [KaryawanController::class, 'tambah']);
Route::post('/Karyawan/store', [KaryawanController::class, 'store']);
Route::get('/Karyawan/ubah{idkaryawan}', [KaryawanController::class, 'ubah']);
Route::post('/Karyawan/update{idkaryawan}', [KaryawanController::class, 'update']);
Route::get('/Karyawan/hapus{idkaryawan}', [KaryawanController::class, 'hapus']);

/* ----- Setup -----*/

/* ----- RekamMedis -----*/
Route::get('/RekamMedis', function () {
    return view('RekamMedis.Content.index');
});
/* ----- RekamMedis -----*/

/* ----- RawatJalan -----*/
Route::get('/RawatJalan', function () {
    return view('RawatJalan.Content.index');
});
Route::get('/Data_Pendaftaran', [Data_PendaftaranController::class, 'index']);

/* ----- RawatJalan -----*/
