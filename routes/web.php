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
use App\Http\Controllers\Setup\Icd10Controller;
use App\Http\Controllers\Setup\Icd9Controller;
use App\Http\Controllers\Setup\DokterKonsultasiController;
use App\Http\Controllers\Setup\DokterVisitController;
use App\Http\Controllers\Setup\TindakanInapController;
use App\Http\Controllers\Setup\TindakanPoliController;

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
use App\Http\Controllers\RawatJalan\Update_Data_Pendaftaran_Pasien_OnlineController;

/* ----- RawatJalan -----*/

/* ----- RawatInap -----*/

use App\Http\Controllers\RawatInap\PenggunaanObatRIController;
use App\Http\Controllers\RawatInap\RuteObatController;

use App\Http\Controllers\RawatInap\Data_Pendaftaran_Rawat_InapController;
use App\Http\Controllers\RawatInap\Ruang_PerawatanController;
use App\Http\Controllers\RawatInap\Ubah_KamarController;
use App\Http\Controllers\RawatInap\CariPasienController;
use App\Http\Controllers\RawatInap\MacamRawatController;

/* ----- RawatInap -----*/

/* ----- Operasi -----*/
use App\Http\Controllers\Operasi\GolonganOperasiController;
/* ----- Operasi -----*/


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

Route::get('/Icd10', [Icd10Controller::class, 'index']);
Route::post('/Icd10/store', [Icd10Controller::class, 'store']);
Route::get('/Icd10/ubah{kode}', [Icd10Controller::class, 'ubah']);
Route::post('/Icd10/update{kode}', [Icd10Controller::class, 'update']);
Route::get('/Icd10/hapus{kode}', [Icd10Controller::class, 'hapus']);

Route::get('/Icd9', [Icd9Controller::class, 'index']);
Route::post('/Icd9/store', [Icd9Controller::class, 'store']);
Route::get('/Icd9/ubah{kode}', [Icd9Controller::class, 'ubah']);
Route::post('/Icd9/update{kode}', [Icd9Controller::class, 'update']);
Route::get('/Icd9/hapus{kode}', [Icd9Controller::class, 'hapus']);

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

Route::get('/TindakanPoli', [TindakanPoliController::class, 'index']);
Route::post('/TindakanPoli/store', [TindakanPoliController::class, 'store']);
Route::get('/TindakanPoli/ubah{idtindakan}', [TindakanPoliController::class, 'ubah']);
Route::post('/TindakanPoli/update{idtindakan}', [TindakanPoliController::class, 'update']);
Route::get('/TindakanPoli/hapus{idtindakan}', [TindakanPoliController::class, 'hapus']);

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
Route::post('/Pendaftaran_Rawat_Inap/store', [Transfer_RiController::class, 'store']);

Route::get('/Update_Data_Pendaftaran_Pasien_Online', [Update_Data_Pendaftaran_Pasien_OnlineController::class, 'index']);


/* ----- RawatJalan -----*/


/* ----- RawatInap -----*/
Route::get('/RawatInap', function () {
    return view('RawatInap.Content.index');
});


Route::get('/PenggunaanObatRI', [PenggunaanObatRIController::class, 'index']);

Route::get('/RuteObat', [RuteObatController::class, 'index']);

Route::get('/Data_Pendaftaran_Rawat_Inap', [Data_Pendaftaran_Rawat_InapController::class, 'index']);
Route::get('/Data_Pendaftaran_Rawat_Inap/tambah', [Data_Pendaftaran_Rawat_InapController::class, 'tambah']);
Route::post('/Data_Pendaftaran_Rawat_Inap/store', [Data_Pendaftaran_Rawat_InapController::class, 'store']);
Route::get('/Data_Pendaftaran_Rawat_Inap/detaildiagnosa{faktur_rawatinap}', [Data_Pendaftaran_Rawat_InapController::class, 'detaildiagnosa']);

Route::get('/Ubah_Kamar', [Ubah_KamarController::class, 'index']);

Route::get('/Ruang_Perawatan', [Ruang_PerawatanController::class, 'index']);

Route::get('/CariPasien', [CariPasienController::class, 'index']);
Route::post('/CariPasien/store', [CariPasienController::class, 'store']);

Route::get('/MacamRawat', [MacamRawatController::class, 'index']);
Route::post('/MacamRawat/store', [MacamRawatController::class, 'store']);
Route::get('/MacamRawat/ubah{kode}', [MacamRawatController::class, 'ubah']);
Route::post('/MacamRawat/update{kode}', [MacamRawatController::class, 'update']);
Route::get('/MacamRawat/hapus{kode}', [MacamRawatController::class, 'hapus']);


/* ----- RawatInap -----*/

/* ----- Operasi -----*/
Route::get('/Operasi', function () {
    return view('Operasi.Content.index');
});

Route::get('/GolonganOperasi', [GolonganOperasiController::class, 'index']);
/* ----- Operasi -----*/