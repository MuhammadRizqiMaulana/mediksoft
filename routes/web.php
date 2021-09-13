<?php

use Illuminate\Support\Facades\Route;

/* ----- AksesPengguna -----*/
/* ----- AksesPengguna -----*/

/* ----- Setup -----*/
use App\Http\Controllers\Setup\Pengirim_FaskesController;
use App\Http\Controllers\Setup\KaryawanController;
use App\Http\Controllers\Setup\PoliController;
use App\Http\Controllers\Setup\BankController;
use App\Http\Controllers\Setup\RuangController;
use App\Http\Controllers\Setup\KelasController;
use App\Http\Controllers\Setup\DokterController;
use App\Http\Controllers\Setup\JabatanController;
use App\Http\Controllers\Setup\JaminanController;
use App\Http\Controllers\Setup\PerusahaankategoriController;
use App\Http\Controllers\Setup\KamarController;
use App\Http\Controllers\Setup\DokterPoliController;
use App\Http\Controllers\Setup\DokterKonsultasiController;
use App\Http\Controllers\Setup\DokterVisitController;
use App\Http\Controllers\Setup\TindakanInapController;

/* ----- Setup -----*/

/* ----- RekamMedis -----*/

use App\Http\Controllers\RekamMedis\KeanggotaanController;
use App\Http\Controllers\RekamMedis\PasienController;
use App\Http\Controllers\RekamMedis\Pendaftaran_Rawat_JalanController;

/* ----- RekamMedis -----*/

/* ----- RawatJalan -----*/
use App\Http\Controllers\RawatJalan\Data_PendaftaranController;
use App\Http\Controllers\RawatJalan\Rekam_Medis_Rawat_JalanController;
use App\Http\Controllers\RawatJalan\PenggunaanObatController;
use App\Http\Controllers\RawatJalan\Pelayanan_PoliController;
use App\Http\Controllers\RawatJalan\Transfer_RiController;

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
//Route::get('/Pengirim_Faskes/tambah', [Pengirim_FaskesController::class, 'tambah']);
Route::post('/Pengirim_Faskes/store', [Pengirim_FaskesController::class, 'store']);
Route::get('/Pengirim_Faskes/ubah{kodefaskes}', [Pengirim_FaskesController::class, 'ubah']);
Route::post('/Pengirim_Faskes/update{kodefaskes}', [Pengirim_FaskesController::class, 'update']);
Route::get('/Pengirim_Faskes/hapus{kodefaskes}', [Pengirim_FaskesController::class, 'hapus']);

Route::get('/Poli', [PoliController::class, 'index']);
Route::post('/Poli/store', [PoliController::class, 'store']);
Route::get('/Poli/ubah{kode}', [PoliController::class, 'ubah']);
Route::post('/Poli/update{kode}', [PoliController::class, 'update']);
Route::get('/Poli/hapus{kode}', [PoliController::class, 'hapus']);

Route::get('/Kelas', [KelasController::class, 'index']);
Route::post('/Kelas/store', [KelasController::class, 'store']);
Route::get('/Kelas/ubah{kodekelas}', [KelasController::class, 'ubah']);
Route::post('/Kelas/update{kodekelas}', [KelasController::class, 'update']);
Route::get('/Kelas/hapus{kodekelas}', [KelasController::class, 'hapus']);

Route::get('/Bank', [BankController::class, 'index']);
Route::post('/Bank/store', [BankController::class, 'store']);
Route::get('/Bank/ubah{idbank}', [BankController::class, 'ubah']);
Route::post('/Bank/update{idbank}', [BankController::class, 'update']);
Route::get('/Bank/hapus{idbank}', [BankController::class, 'hapus']);

Route::get('/Dokter', [DokterController::class, 'index']);
Route::post('/Dokter/store', [DokterController::class, 'store']);
Route::get('/Dokter/ubah{iddokter}', [DokterController::class, 'ubah']);
Route::post('/Dokter/update{iddokter}', [DokterController::class, 'update']);
Route::get('/Dokter/hapus{iddokter}', [DokterController::class, 'hapus']);

Route::get('/Jabatan', [JabatanController::class, 'index']);
Route::post('/Jabatan/store', [JabatanController::class, 'store']);
Route::get('/Jabatan/ubah{id}', [JabatanController::class, 'ubah']);
Route::post('/Jabatan/update{id}', [JabatanController::class, 'update']);
Route::get('/Jabatan/hapus{id}', [JabatanController::class, 'hapus']);

Route::get('/Jaminan', [JaminanController::class, 'index']);
Route::post('/Jaminan/store', [JaminanController::class, 'store']);
Route::get('/Jaminan/ubah{idprsh}', [JaminanController::class, 'ubah']);
Route::post('/Jaminan/update{idprsh}', [JaminanController::class, 'update']);
Route::get('/Jaminan/hapus{idprsh}', [JaminanController::class, 'hapus']);

Route::get('/Perusahaankategori', [PerusahaankategoriController::class, 'index']);
Route::post('/Perusahaankategori/store', [PerusahaankategoriController::class, 'store']);
Route::get('/Perusahaankategori/ubah{idkategori}', [PerusahaankategoriController::class, 'ubah']);
Route::post('/Perusahaankategori/update{idkategori}', [PerusahaankategoriController::class, 'update']);
Route::get('/Perusahaankategori/hapus{idkategori}', [PerusahaankategoriController::class, 'hapus']);

Route::get('/Ruang', [RuangController::class, 'index']);
Route::post('/Ruang/store', [RuangController::class, 'store']);
Route::get('/Ruang/ubah{koderuang}', [RuangController::class, 'ubah']);
Route::post('/Ruang/update{koderuang}', [RuangController::class, 'update']);
Route::get('/Ruang/hapus{koderuang}', [RuangController::class, 'hapus']);

Route::get('/Kamar', [KamarController::class, 'index']);
Route::post('/Kamar/store', [KamarController::class, 'store']);
Route::get('/Kamar/ubah{kodekamar}', [KamarController::class, 'ubah']);
Route::post('/Kamar/update{kodekamar}', [KamarController::class, 'update']);
Route::get('/Kamar/hapus{kodekamar}', [KamarController::class, 'hapus']);

Route::get('/Karyawan', [KaryawanController::class, 'index']);
//Route::get('/Karyawan/tambah', [KaryawanController::class, 'tambah']);
Route::post('/Karyawan/store', [KaryawanController::class, 'store']);
Route::get('/Karyawan/ubah{idkaryawan}', [KaryawanController::class, 'ubah']);
Route::post('/Karyawan/update{idkaryawan}', [KaryawanController::class, 'update']);
Route::get('/Karyawan/hapus{idkaryawan}', [KaryawanController::class, 'hapus']);

Route::get('/DokterPoli', [DokterPoliController::class, 'index']);
Route::post('/DokterPoli/store', [DokterPoliController::class, 'store']);
Route::get('/DokterPoli/ubah{kodepoli}', [DokterPoliController::class, 'ubah']);
Route::post('/DokterPoli/update{kodepoli}', [DokterPoliController::class, 'update']);
Route::get('/DokterPoli/hapus{kodepoli}', [DokterPoliController::class, 'hapus']);

Route::get('/DokterKonsultasi', [DokterKonsultasiController::class, 'index']);
Route::post('/DokterKonsultasi/store', [DokterKonsultasiController::class, 'store']);
Route::get('/DokterKonsultasi/ubah{iddokter}', [DokterKonsultasiController::class, 'ubah']);
Route::post('/DokterKonsultasi/update{iddokter}', [DokterKonsultasiController::class, 'update']);
Route::get('/DokterKonsultasi/hapus{iddokter}', [DokterKonsultasiController::class, 'hapus']);

Route::get('/DokterVisit', [DokterVisitController::class, 'index']);
Route::post('/DokterVisit/store', [DokterVisitController::class, 'store']);
Route::get('/DokterVisit/ubah{iddokter}', [DokterVisitController::class, 'ubah']);
Route::post('/DokterVisit/update{iddokter}', [DokterVisitController::class, 'update']);
Route::get('/DokterVisit/hapus{iddokter}', [DokterVisitController::class, 'hapus']);

Route::get('/TindakanInap', [TindakanInapController::class, 'index']);
Route::post('/TindakanInap/store', [TindakanInapController::class, 'store']);
Route::get('/TindakanInap/ubah{idtindakan}', [TindakanInapController::class, 'ubah']);
Route::post('/TindakanInap/update{idtindakan}', [TindakanInapController::class, 'update']);
Route::get('/TindakanInap/hapus{idtindakan}', [TindakanInapController::class, 'hapus']);
/* ----- Setup -----*/

/* ----- RekamMedis -----*/
Route::get('/RekamMedis', function () {
    return view('RekamMedis.Content.index');
});

Route::get('/Keanggotaan', [KeanggotaanController::class, 'index']);
Route::post('/Keanggotaan/store', [KeanggotaanController::class, 'store']);
Route::get('/Keanggotaan/ubah{idkeanggotaan}', [KeanggotaanController::class, 'ubah']);
Route::post('/Keanggotaan/update{idkeanggotaan}', [KeanggotaanController::class, 'update']);
Route::get('/keanggotaan/hapus{idkeanggotaan}', [KeanggotaanController::class, 'hapus']);

Route::get('/Pasien', [PasienController::class, 'index']);
Route::post('/Pasien/store', [PasienController::class, 'store']);
Route::get('/Pasien/ubah{norm}', [PasienController::class, 'ubah']);
Route::post('/Pasien/update{norm}', [PasienController::class, 'update']);
Route::get('/Pasien/hapus{norm}', [PasienController::class, 'hapus']);

Route::get('/Pendaftaran_Rawat_Jalan', [Pendaftaran_Rawat_JalanController::class, 'index']);
Route::post('/Pendaftaran_Rawat_Jalan/store', [Pendaftaran_Rawat_JalanController::class, 'store']);

/* ----- RekamMedis -----*/

/* ----- RawatJalan -----*/
Route::get('/RawatJalan', function () {
    return view('RawatJalan.Content.index');
});
Route::get('/Data_Pendaftaran', [Data_PendaftaranController::class, 'index']);
Route::get('/Data_Pendaftaran/tambah', [Data_PendaftaranController::class, 'tambah']);
Route::post('/Data_Pendaftaran/store', [Data_PendaftaranController::class, 'store']);
Route::get('/Data_Pendaftaran/ubah{faktur_rawatjalan}', [Data_PendaftaranController::class, 'ubah']);
Route::post('/Data_Pendaftaran/update{faktur_rawatjalan}', [Data_PendaftaranController::class, 'update']);
Route::get('/Data_Pendaftaran/hapus{faktur_rawatjalan}', [Data_PendaftaranController::class, 'hapus']);
Route::get('/Data_Pendaftaran/lihat{faktur_rawatjalan}', [Data_PendaftaranController::class, 'lihat']);
Route::get('/Data_Pendaftaran/cetakdatapendaftaran', [Data_PendaftaranController::class, 'cetakdatapendaftaran']);

Route::get('/Rekam_Medis_Rawat_Jalan/index{faktur_rawatjalan}', [Rekam_Medis_Rawat_JalanController::class, 'index']);

Route::get('/PenggunaanObat', [PenggunaanObatController::class, 'index']);

Route::get('/Data_Pendaftaran/suratketerangansakit{faktur_rawatjalan}', [Data_PendaftaranController::class, 'suratketerangansakit']);
Route::get('/Data_Pendaftaran/suratketerangansehat{faktur_rawatjalan}', [Data_PendaftaranController::class, 'suratketerangansehat']);

Route::get('/Pelayanan_Rawat_Jalan', [Pelayanan_PoliController::class, 'index']);

Route::get('/Pendaftaran_Rawat_Inap', [Transfer_RiController::class, 'index']);



/* ----- RawatJalan -----*/