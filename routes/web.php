<?php

use Illuminate\Support\Facades\Route;

/* ----- AksesPengguna -----*/
use App\Http\Controllers\AksesPengguna\PenggunaController;
use App\Http\Controllers\AksesPengguna\ProgramController;
use App\Http\Controllers\AksesPengguna\LevelPenggunaController;
use App\Http\Controllers\AksesPengguna\LoginController;

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
use App\Http\Controllers\Setup\AdministrasiController;


/* ----- Setup -----* /

/* ----- RekamMedis -----*/

use App\Http\Controllers\RekamMedis\KeanggotaanController;
use App\Http\Controllers\RekamMedis\PasienController;
use App\Http\Controllers\RekamMedis\Pendaftaran_Rawat_JalanController;
use App\Http\Controllers\RekamMedis\RawatInapController;
use App\Http\Controllers\RekamMedis\KamarKosongController;
use App\Http\Controllers\RekamMedis\RM_RawatJalanController;

/* ----- RekamMedis -----*/

/* ----- RawatJalan -----*/
use App\Http\Controllers\RawatJalan\Data_PendaftaranController;
use App\Http\Controllers\RawatJalan\Rekam_Medis_Rawat_JalanController;
use App\Http\Controllers\RawatJalan\Riwayat_Resume_Medis_PasienController;
use App\Http\Controllers\RawatJalan\PenggunaanObatController;
use App\Http\Controllers\RawatJalan\Pelayanan_PoliController;
use App\Http\Controllers\RawatJalan\Transfer_RiController;
use App\Http\Controllers\RawatJalan\Update_Data_Pendaftaran_Pasien_OnlineController;
use App\Http\Controllers\RawatJalan\RawatJalan_RM_Rawat_JalanController;

/* ----- RawatJalan -----*/

/* ----- RawatInap -----*/
use App\Http\Controllers\RawatInap\PenggunaanObatRIController;
use App\Http\Controllers\RawatInap\RuteObatController;
use App\Http\Controllers\RawatInap\Data_Pendaftaran_Rawat_InapController;
use App\Http\Controllers\RawatInap\Ruang_PerawatanController;
use App\Http\Controllers\RawatInap\Ubah_KamarController;
use App\Http\Controllers\RawatInap\CariPasienController;
use App\Http\Controllers\RawatInap\MacamRawatController;
use App\Http\Controllers\RawatInap\PindahKamarController;
use App\Http\Controllers\RawatInap\INOSController;
use App\Http\Controllers\RawatInap\Pemberian_Obat_Rawat_InapController;
use App\Http\Controllers\RawatInap\AnamnesaController;

/* ----- RawatInap -----*/

/* ----- Operasi -----*/
use App\Http\Controllers\Operasi\GolonganOperasiController;
use App\Http\Controllers\Operasi\DokterBedahController;
use App\Http\Controllers\Operasi\Tarif_Tindakan_OperasiController;
use App\Http\Controllers\Operasi\JenisAnestesiController;
use App\Http\Controllers\Operasi\SpesialisBedahController;
use App\Http\Controllers\Operasi\DataOperasiController;
/* ----- Operasi -----*/

/* ----- Billing -----*/
use App\Http\Controllers\Billing\Tagihan_RJController;
use App\Http\Controllers\Billing\PembayaranRJController;
use App\Http\Controllers\Billing\Data_DepositController;
use App\Http\Controllers\Billing\Data_PembayaranRJController;
use App\Http\Controllers\Billing\RekeningRIController;
/* ----- Billing -----*/


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


/* ----- Login -----*/
Route::get('/Login', [LoginController::class, 'index'])->name('login');
Route::post('/Postlogin', [LoginController::class, 'postlogin'])->name('postlogin');
Route::get('/Logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth','idlevel:1,2,3,4,5,6,7,10');
/* ----- Login -----*/

//Route::group(['middleware' => ['auth','idlevel:1']], function(){
//});
    Route::get('/', function () {
        return view('AksesPengguna.Content.index');
    });

    /* ----- AksesPengguna -----*/
    Route::get('/AksesPengguna', function () {
        return view('AksesPengguna.Content.index');
    });

    Route::get('/Program', [ProgramController::class, 'index'])->middleware('auth','idlevel:1,4');

    Route::get('/LevelPengguna', [LevelPenggunaController::class, 'index'])->middleware('auth','idlevel:1,4');

    Route::get('/Pengguna', [PenggunaController::class, 'index'])->middleware('idlevel:1,4');
    Route::post('/Pengguna/store', [PenggunaController::class, 'store'])->middleware('auth','idlevel:1,4');
    Route::get('/Pengguna/ubah{iduser}', [PenggunaController::class, 'ubah'])->middleware('auth','idlevel:1,4');
    Route::post('/Pengguna/update{iduser}', [PenggunaController::class, 'update'])->middleware('auth','idlevel:1,4');
    Route::get('/Pengguna/hapus{iduser}', [PenggunaController::class, 'hapus'])->middleware('auth','idlevel:1,4');

    /* ----- AksesPengguna -----*/

    /* ----- Setup -----*/
    Route::get('/Setup', function () {
        return view('Setup.Content.index');
    });

    Route::get('/Pengirim_Faskes', [Pengirim_FaskesController::class, 'index'])->middleware('auth','idlevel:1,4');
    //Route::get('/Pengirim_Faskes/tambah', [Pengirim_FaskesController::class, 'tambah']);
    Route::post('/Pengirim_Faskes/store', [Pengirim_FaskesController::class, 'store'])->middleware('auth','idlevel:1,4');
    Route::get('/Pengirim_Faskes/ubah{kodefaskes}', [Pengirim_FaskesController::class, 'ubah'])->middleware('auth','idlevel:1,4');
    Route::post('/Pengirim_Faskes/update{kodefaskes}', [Pengirim_FaskesController::class, 'update'])->middleware('auth','idlevel:1,4');
    Route::get('/Pengirim_Faskes/hapus{kodefaskes}', [Pengirim_FaskesController::class, 'hapus'])->middleware('auth','idlevel:1,4');

    Route::get('/Poli', [PoliController::class, 'index'])->middleware('auth','idlevel:1,2,4,5,6,7');
    Route::post('/Poli/store', [PoliController::class, 'store'])->middleware('auth','idlevel:1,2,4');
    Route::get('/Poli/ubah{kode}', [PoliController::class, 'ubah'])->middleware('auth','idlevel:1,2,4');
    Route::post('/Poli/update{kode}', [PoliController::class, 'update'])->middleware('auth','idlevel:1,2,4');
    Route::get('/Poli/hapus{kode}', [PoliController::class, 'hapus'])->middleware('auth','idlevel:1,2,4');

    Route::get('/Kelas', [KelasController::class, 'index'])->middleware('auth','idlevel:1,4');
    Route::post('/Kelas/store', [KelasController::class, 'store'])->middleware('auth','idlevel:1,4');
    Route::get('/Kelas/ubah{kodekelas}', [KelasController::class, 'ubah'])->middleware('auth','idlevel:1,4');
    Route::post('/Kelas/update{kodekelas}', [KelasController::class, 'update'])->middleware('auth','idlevel:1,4');
    Route::get('/Kelas/hapus{kodekelas}', [KelasController::class, 'hapus'])->middleware('auth','idlevel:1,4');

    Route::get('/Bank', [BankController::class, 'index'])->middleware('auth','idlevel:1,4');
    Route::post('/Bank/store', [BankController::class, 'store'])->middleware('auth','idlevel:1,4');
    Route::get('/Bank/ubah{idbank}', [BankController::class, 'ubah'])->middleware('auth','idlevel:1,4');
    Route::post('/Bank/update{idbank}', [BankController::class, 'update'])->middleware('auth','idlevel:1,4');
    Route::get('/Bank/hapus{idbank}', [BankController::class, 'hapus'])->middleware('auth','idlevel:1,4');

    Route::get('/Dokter', [DokterController::class, 'index'])->middleware('auth','idlevel:1,4');
    Route::post('/Dokter/store', [DokterController::class, 'store'])->middleware('auth','idlevel:1,4');
    Route::get('/Dokter/ubah{iddokter}', [DokterController::class, 'ubah'])->middleware('auth','idlevel:1,4');
    Route::post('/Dokter/update{iddokter}', [DokterController::class, 'update'])->middleware('auth','idlevel:1,4');
    Route::get('/Dokter/hapus{iddokter}', [DokterController::class, 'hapus'])->middleware('auth','idlevel:1,4');

    Route::get('/Icd10', [Icd10Controller::class, 'index'])->middleware('auth','idlevel:1,4');
    Route::post('/Icd10/store', [Icd10Controller::class, 'store'])->middleware('auth','idlevel:1,4');
    Route::get('/Icd10/ubah{kode}', [Icd10Controller::class, 'ubah'])->middleware('auth','idlevel:1,4');
    Route::post('/Icd10/update{kode}', [Icd10Controller::class, 'update'])->middleware('auth','idlevel:1,4');
    Route::get('/Icd10/hapus{kode}', [Icd10Controller::class, 'hapus'])->middleware('auth','idlevel:1,4');

    Route::get('/Icd9', [Icd9Controller::class, 'index'])->middleware('auth','idlevel:1,4');
    Route::post('/Icd9/store', [Icd9Controller::class, 'store'])->middleware('auth','idlevel:1,4');
    Route::get('/Icd9/ubah{kode}', [Icd9Controller::class, 'ubah'])->middleware('auth','idlevel:1,4');
    Route::post('/Icd9/update{kode}', [Icd9Controller::class, 'update'])->middleware('auth','idlevel:1,4');
    Route::get('/Icd9/hapus{kode}', [Icd9Controller::class, 'hapus'])->middleware('auth','idlevel:1,4');

    Route::get('/Jabatan', [JabatanController::class, 'index'])->middleware('auth','idlevel:1,4');
    Route::post('/Jabatan/store', [JabatanController::class, 'store'])->middleware('auth','idlevel:1,4');
    Route::get('/Jabatan/ubah{id}', [JabatanController::class, 'ubah'])->middleware('auth','idlevel:1,4');
    Route::post('/Jabatan/update{id}', [JabatanController::class, 'update'])->middleware('auth','idlevel:1,4');
    Route::get('/Jabatan/hapus{id}', [JabatanController::class, 'hapus'])->middleware('auth','idlevel:1,4');

    Route::get('/Jaminan', [JaminanController::class, 'index'])->middleware('auth','idlevel:1,4');
    Route::post('/Jaminan/store', [JaminanController::class, 'store'])->middleware('auth','idlevel:1,4');
    Route::get('/Jaminan/ubah{idprsh}', [JaminanController::class, 'ubah'])->middleware('auth','idlevel:1,4');
    Route::post('/Jaminan/update{idprsh}', [JaminanController::class, 'update'])->middleware('auth','idlevel:1,4');
    Route::get('/Jaminan/hapus{idprsh}', [JaminanController::class, 'hapus'])->middleware('auth','idlevel:1,4');

    Route::get('/Perusahaankategori', [PerusahaankategoriController::class, 'index'])->middleware('auth','idlevel:1');
    Route::post('/Perusahaankategori/store', [PerusahaankategoriController::class, 'store'])->middleware('auth','idlevel:1');
    Route::get('/Perusahaankategori/ubah{idkategori}', [PerusahaankategoriController::class, 'ubah'])->middleware('auth','idlevel:1');
    Route::post('/Perusahaankategori/update{idkategori}', [PerusahaankategoriController::class, 'update'])->middleware('auth','idlevel:1');
    Route::get('/Perusahaankategori/hapus{idkategori}', [PerusahaankategoriController::class, 'hapus'])->middleware('auth','idlevel:1');

    Route::get('/Ruang', [RuangController::class, 'index'])->middleware('auth','idlevel:1,4');
    Route::post('/Ruang/store', [RuangController::class, 'store'])->middleware('auth','idlevel:1,4');
    Route::get('/Ruang/ubah{koderuang}', [RuangController::class, 'ubah'])->middleware('auth','idlevel:1,4');
    Route::post('/Ruang/update{koderuang}', [RuangController::class, 'update'])->middleware('auth','idlevel:1,4');
    Route::get('/Ruang/hapus{koderuang}', [RuangController::class, 'hapus'])->middleware('auth','idlevel:1,4');

    Route::get('/Kamar', [KamarController::class, 'index'])->middleware('auth','idlevel:1,4');
    Route::post('/Kamar/store', [KamarController::class, 'store'])->middleware('auth','idlevel:1,4');
    Route::get('/Kamar/ubah{kodekamar}', [KamarController::class, 'ubah'])->middleware('auth','idlevel:1,4');
    Route::post('/Kamar/update{kodekamar}', [KamarController::class, 'update'])->middleware('auth','idlevel:1,4');
    Route::get('/Kamar/hapus{kodekamar}', [KamarController::class, 'hapus'])->middleware('auth','idlevel:1,4');

    Route::get('/Karyawan', [KaryawanController::class, 'index'])->middleware('auth','idlevel:1,4');
    //Route::get('/Karyawan/tambah', [KaryawanController::class, 'tambah'])->middleware('auth','idlevel:1,4');
    Route::post('/Karyawan/store', [KaryawanController::class, 'store'])->middleware('auth','idlevel:1,4');
    Route::get('/Karyawan/ubah{idkaryawan}', [KaryawanController::class, 'ubah'])->middleware('auth','idlevel:1,4');
    Route::post('/Karyawan/update{idkaryawan}', [KaryawanController::class, 'update'])->middleware('auth','idlevel:1,4');
    Route::get('/Karyawan/hapus{idkaryawan}', [KaryawanController::class, 'hapus'])->middleware('auth','idlevel:1,4');

    Route::get('/DokterPoli', [DokterPoliController::class, 'index'])->middleware('auth','idlevel:1,4');
    Route::post('/DokterPoli/store', [DokterPoliController::class, 'store'])->middleware('auth','idlevel:1,4');
    Route::get('/DokterPoli/ubah{kodepoli},{iddokter}', [DokterPoliController::class, 'ubah'])->middleware('auth','idlevel:1,4');
    Route::post('/DokterPoli/update{kodepoli},{iddokter}', [DokterPoliController::class, 'update'])->middleware('auth','idlevel:1,4');
    Route::get('/DokterPoli/hapus{kodepoli},{iddokter}', [DokterPoliController::class, 'hapus'])->middleware('auth','idlevel:1,4');

    Route::get('/DokterKonsultasi', [DokterKonsultasiController::class, 'index'])->middleware('auth','idlevel:1,2,4');
    Route::post('/DokterKonsultasi/store', [DokterKonsultasiController::class, 'store'])->middleware('auth','idlevel:1,2,4');
    Route::get('/DokterKonsultasi/ubah{iddokter}', [DokterKonsultasiController::class, 'ubah'])->middleware('auth','idlevel:1,2,4');
    Route::post('/DokterKonsultasi/update{iddokter}', [DokterKonsultasiController::class, 'update'])->middleware('auth','idlevel:1,2,4');
    Route::get('/DokterKonsultasi/hapus{iddokter}', [DokterKonsultasiController::class, 'hapus'])->middleware('auth','idlevel:1,2,4');

    Route::get('/DokterVisit', [DokterVisitController::class, 'index'])->middleware('auth','idlevel:1,4');
    Route::post('/DokterVisit/store', [DokterVisitController::class, 'store'])->middleware('auth','idlevel:1,4');
    Route::get('/DokterVisit/ubah{iddokter}', [DokterVisitController::class, 'ubah'])->middleware('auth','idlevel:1,4');
    Route::post('/DokterVisit/update{iddokter}', [DokterVisitController::class, 'update'])->middleware('auth','idlevel:1,4');
    Route::get('/DokterVisit/hapus{iddokter}', [DokterVisitController::class, 'hapus'])->middleware('auth','idlevel:1,4');

    Route::get('/TindakanInap', [TindakanInapController::class, 'index'])->middleware('auth','idlevel:1,2,4');
    Route::post('/TindakanInap/store', [TindakanInapController::class, 'store'])->middleware('auth','idlevel:1,2,4');
    Route::get('/TindakanInap/ubah{idtindakan}', [TindakanInapController::class, 'ubah'])->middleware('auth','idlevel:1,2,4');
    Route::post('/TindakanInap/update{idtindakan}', [TindakanInapController::class, 'update'])->middleware('auth','idlevel:1,2,4');
    Route::get('/TindakanInap/hapus{idtindakan}', [TindakanInapController::class, 'hapus'])->middleware('auth','idlevel:1,2,4');

    Route::get('/TindakanPoli', [TindakanPoliController::class, 'index'])->middleware('auth','idlevel:1,4');
    Route::post('/TindakanPoli/store', [TindakanPoliController::class, 'store'])->middleware('auth','idlevel:1,4');
    Route::get('/TindakanPoli/ubah{idtindakan}', [TindakanPoliController::class, 'ubah'])->middleware('auth','idlevel:1,4');
    Route::post('/TindakanPoli/update{idtindakan}', [TindakanPoliController::class, 'update'])->middleware('auth','idlevel:1,4');
    Route::get('/TindakanPoli/hapus{idtindakan}', [TindakanPoliController::class, 'hapus'])->middleware('auth','idlevel:1,4');

    Route::get('/Administrasi', [AdministrasiController::class, 'index'])->middleware('auth','idlevel:1,4');
    Route::post('/Administrasi/store', [AdministrasiController::class, 'store'])->middleware('auth','idlevel:1,4');
    Route::get('/Administrasi/ubah{idadm}', [AdministrasiController::class, 'ubah'])->middleware('auth','idlevel:1,4');
    Route::post('/Administrasi/update{idadm}', [AdministrasiController::class, 'update'])->middleware('auth','idlevel:1,4');
    Route::get('/Administrasi/hapus{idadm}', [AdministrasiController::class, 'hapus'])->middleware('auth','idlevel:1,4');

    Route::get('/Jaminan/cetakdatajaminan', [JaminanController::class, 'cetakdatajaminan'])->middleware('auth','idlevel:1,4');
    Route::get('/Icd9/cetakdataicd9', [Icd9Controller::class, 'cetakdataicd9'])->middleware('auth','idlevel:1,4');
    Route::get('/Dokter/cetakdatadokter', [DokterController::class, 'cetakdatadokter'])->middleware('auth','idlevel:1,4');
    Route::get('/Kelas/cetakdatakelas', [KelasController::class, 'cetakdatakelas'])->middleware('auth','idlevel:1,4');
    Route::get('/Poli/cetakdatapoli', [PoliController::class, 'cetakdatapoli'])->middleware('auth','idlevel:1,2,4');
    Route::get('/Bank/cetakdatabank', [BankController::class, 'cetakdatabank'])->middleware('auth','idlevel:1,4');
    Route::get('/Pengirim_Faskes/cetakdatapengirimfaskes', [Pengirim_FaskesController::class, 'cetakdatapengirimfaskes'])->middleware('auth','idlevel:1,4');
    Route::get('/Karyawan/cetakdatakaryawan', [KaryawanController::class, 'cetakdatakaryawan'])->middleware('auth','idlevel:1,4');
    Route::get('/Ruang/cetakdataruang', [RuangController::class, 'cetakdataruang'])->middleware('auth','idlevel:1,4');
    Route::get('/Kamar/cetakdatakamar', [KamarController::class, 'cetakdatakamar'])->middleware('auth','idlevel:1,4');
    Route::get('/DokterPoli/cetakdatadokterpoli', [DokterPoliController::class, 'cetakdatadokterpoli'])->middleware('auth','idlevel:1,4');
    Route::get('/TindakanPoli/cetakdatatindakanpoli', [TindakanPoliController::class, 'cetakdatatindakanpoli'])->middleware('auth','idlevel:1,4');
    /* ----- Setup -----*/

    /* ----- RekamMedis -----*/
    Route::get('/RekamMedis', function () {
        return view('RekamMedis.Content.index');
    });

    Route::get('/Keanggotaan', [KeanggotaanController::class, 'index'])->middleware('auth','idlevel:1,4');
    Route::post('/Keanggotaan/store', [KeanggotaanController::class, 'store'])->middleware('auth','idlevel:1,4');
    Route::get('/Keanggotaan/ubah{idkeanggotaan}', [KeanggotaanController::class, 'ubah'])->middleware('auth','idlevel:1,4');
    Route::post('/Keanggotaan/update{idkeanggotaan}', [KeanggotaanController::class, 'update'])->middleware('auth','idlevel:1,4');
    Route::get('/keanggotaan/hapus{idkeanggotaan}', [KeanggotaanController::class, 'hapus'])->middleware('auth','idlevel:1,4');

    Route::get('/Pasien', [PasienController::class, 'index'])->middleware('auth','idlevel:1,2,4,5');
    Route::post('/Pasien/store', [PasienController::class, 'store'])->middleware('auth','idlevel:1,2,4,5');
    Route::get('/Pasien/ubah{norm}', [PasienController::class, 'ubah'])->middleware('auth','idlevel:1,2,4,5');
    Route::post('/Pasien/update{norm}', [PasienController::class, 'update'])->middleware('auth','idlevel:1,2,4,5');
    Route::get('/Pasien/hapus{norm}', [PasienController::class, 'hapus'])->middleware('auth','idlevel:1,2,4,5');

    Route::get('/Pendaftaran_Rawat_Jalan', [Pendaftaran_Rawat_JalanController::class, 'index'])->middleware('auth','idlevel:1,2,4,5,6,7,10');
    Route::post('/Pendaftaran_Rawat_Jalan/store', [Pendaftaran_Rawat_JalanController::class, 'store'])->middleware('auth','idlevel:1,2,4,5,6,7,10');
    Route::get('/RM_RawatJalan', [RM_RawatJalanController::class, 'index'])->middleware('auth','idlevel:1,2,3,4,5,7');
    Route::get('/RM_RawatInap', [RawatInapController::class, 'index'])->middleware('auth','idlevel:1,2,3,5,7');
    //Route::post('/RM_RawatInap/store', [RawatInapController::class, 'store'])->middleware('auth','idlevel:1,2,3,5,7');
    Route::get('/KamarKosong', [KamarKosongController::class, 'index'])->middleware('auth','idlevel:1,2,3,5,6,7,10');

    Route::get('/Pasien/cetakdatapasien', [PasienController::class, 'cetakdatapasien'])->middleware('auth','idlevel:1,4');
    Route::get('/Keanggotaan/cetakdatakeanggotaan', [KeanggotaanController::class, 'cetakdatakeanggotaan'])->middleware('auth','idlevel:1,4');
    Route::get('/RM_RawatInap/cetakdatarmrawatinap', [RawatInapController::class, 'cetakdatarmrawatinap'])->middleware('auth','idlevel:1,2,3,4,5,7');
    /* ----- RekamMedis -----*/

    /* ----- RawatJalan -----*/
    Route::get('/RawatJalan', function () {
        return view('RawatJalan.Content.index');
    });
    Route::get('/Data_Pendaftaran', [Data_PendaftaranController::class, 'index'])->middleware('auth','idlevel:1,2,4,5,6,7,10');
    Route::get('/Data_Pendaftaran/tambah', [Data_PendaftaranController::class, 'tambah'])->middleware('auth','idlevel:1,2,4,5,6,7,10');
    Route::post('/Data_Pendaftaran/store', [Data_PendaftaranController::class, 'store'])->middleware('auth','idlevel:1,2,4,5,6,7,10');
    Route::get('/Data_Pendaftaran/ubah{faktur_rawatjalan}', [Data_PendaftaranController::class, 'ubah'])->middleware('auth','idlevel:1,2,4,5,6,7,10');
    Route::post('/Data_Pendaftaran/update{faktur_rawatjalan}', [Data_PendaftaranController::class, 'update'])->middleware('auth','idlevel:1,2,4,5,6,7,10');
    Route::get('/Data_Pendaftaran/hapus{faktur_rawatjalan}', [Data_PendaftaranController::class, 'hapus'])->middleware('auth','idlevel:1,2,4,5,6,7,10');
    Route::get('/Data_Pendaftaran/lihat{faktur_rawatjalan}', [Data_PendaftaranController::class, 'lihat'])->middleware('auth','idlevel:1,2,4,5,6,7,10');
    Route::get('/Riwayat_Resume_Medis_Pasien', [Riwayat_Resume_Medis_PasienController::class, 'index'])->middleware('auth','idlevel:1,2,4,6');

    Route::get('/Data_Pendaftaran/cetakdatapendaftaran', [Data_PendaftaranController::class, 'cetakdatapendaftaran'])->middleware('auth','idlevel:1,2,4,5,6,7,10');

    Route::get('/Rekam_Medis_Rawat_Jalan/index{faktur_rawatjalan}', [Rekam_Medis_Rawat_JalanController::class, 'index'])->middleware('auth','idlevel:1,4');

    Route::get('/PenggunaanObat', [PenggunaanObatController::class, 'index'])->middleware('auth','idlevel:1,4');
    Route::get('/RawatJalan_RM_Rawat_Jalan', [RawatJalan_RM_Rawat_JalanController::class, 'index'])->middleware('auth','idlevel:1,4');

    Route::get('/Data_Pendaftaran/suratketerangansakit{faktur_rawatjalan}', [Data_PendaftaranController::class, 'suratketerangansakit'])->middleware('auth','idlevel:1,2,4,5,6,7,10');
    Route::get('/Data_Pendaftaran/suratketerangansehat{faktur_rawatjalan}', [Data_PendaftaranController::class, 'suratketerangansehat'])->middleware('auth','idlevel:1,2,4,5,6,7,10');

    Route::get('/Pelayanan_Rawat_Jalan', [Pelayanan_PoliController::class, 'index'])->middleware('auth','idlevel:1,4,5,6,7');
    Route::get('/Pelayanan_Rawat_Jalan/select{faktur_rawatjalan}', [Pelayanan_PoliController::class, 'selectrawatjalan'])->middleware('auth','idlevel:1,4,5,6,7');
    Route::post('/Pelayanan_Rawat_Jalan/store', [Pelayanan_PoliController::class, 'store'])->middleware('auth','idlevel:1,4,5,6,7');
    Route::post('/Pelayanan_Rawat_Jalan/update{notransaksi}', [Pelayanan_PoliController::class, 'update'])->middleware('auth','idlevel:1,4,5,6,7');
    Route::get('/Pelayanan_Rawat_Jalan/hapus{notransaksi},{faktur_rawatjalan}', [Pelayanan_PoliController::class, 'hapus'])->middleware('auth','idlevel:1,4,5,6,7');

    Route::get('/Pendaftaran_Rawat_Inap', [Transfer_RiController::class, 'index'])->middleware('auth','idlevel:1,3,4,5,6,7');
    Route::post('/Pendaftaran_Rawat_Inap/store', [Transfer_RiController::class, 'store'])->middleware('auth','idlevel:1,3,4,5,6,7');

    Route::get('/Update_Data_Pendaftaran_Pasien_Online', [Update_Data_Pendaftaran_Pasien_OnlineController::class, 'index'])->middleware('auth','idlevel:1,4,5,7,10');


    /* ----- RawatJalan -----*/


    /* ----- RawatInap -----*/
    Route::get('/RawatInap', function () {
        return view('RawatInap.Content.index');
    });
    Route::get('/Pemberian_Obat_Rawat_Inap', [Pemberian_Obat_Rawat_InapController::class, 'index'])->middleware('auth','idlevel:1,4');
    Route::get('/PenggunaanObatRI', [PenggunaanObatRIController::class, 'index'])->middleware('auth','idlevel:1,4');
    Route::get('/RuteObat', [RuteObatController::class, 'index'])->middleware('auth','idlevel:1,4');
    Route::get('/Anamnesa', [AnamnesaController::class, 'index'])->middleware('auth','idlevel:1,4');
    Route::get('/Data_Pendaftaran_Rawat_Inap', [Data_Pendaftaran_Rawat_InapController::class, 'index'])->middleware('auth','idlevel:1,4,3,5,6,7,10');
    Route::get('/Data_Pendaftaran_Rawat_Inap/tambah', [Data_Pendaftaran_Rawat_InapController::class, 'tambah'])->middleware('auth','idlevel:1,4,3,5,6,7,10');
    Route::post('/Data_Pendaftaran_Rawat_Inap/store', [Data_Pendaftaran_Rawat_InapController::class, 'store'])->middleware('auth','idlevel:1,4,3,5,6,7,10');
    Route::get('/Data_Pendaftaran_Rawat_Inap/ubah{faktur_rawatinap}', [Data_Pendaftaran_Rawat_InapController::class, 'ubah'])->middleware('auth','idlevel:1,4,3,5,6,7,10');
    Route::get('/Data_Pendaftaran_Rawat_Inap/detaildiagnosa{faktur_rawatinap}', [Data_Pendaftaran_Rawat_InapController::class, 'detaildiagnosa'])->middleware('auth','idlevel:1,4,3,5,6,7,10');
    Route::get('/Data_Pendaftaran_Rawat_Inap/detailpendaftaran{faktur_rawatinap}', [Data_Pendaftaran_Rawat_InapController::class, 'detailpendaftaran'])->middleware('auth','idlevel:1,4,3,5,6,7,10');
    Route::get('/Data_Pendaftaran_Rawat_Inap/hapus{faktur_rawatinap}', [Data_Pendaftaran_Rawat_InapController::class, 'hapus'])->middleware('auth','idlevel:1,4,3,5,6,7,10');

    Route::get('/Ubah_Kamar{faktur_rawatinap}', [Ubah_KamarController::class, 'index'])->middleware('auth','idlevel:1,4,6');
    Route::post('/Ubah_Kamar/update{faktur_rawatinap}', [Ubah_KamarController::class, 'update'])->middleware('auth','idlevel:1,4,6');

    Route::get('/PindahKamar', [PindahKamarController::class, 'index'])->middleware('auth','idlevel:1,3,4,6');
    Route::get('/PindahKamar/selectrawatinap{faktur_rawatinap}', [PindahKamarController::class, 'selectfakturri'])->middleware('auth','idlevel:1,3,4,6');

    Route::get('/Ruang_Perawatan', [Ruang_PerawatanController::class, 'index'])->middleware('auth','idlevel:1,3,4,6');

    Route::get('/Pemberian_Obat_Rawat_Inap', [Pemberian_Obat_Rawat_InapController::class, 'index'])->middleware('auth','idlevel:1,4');

    Route::get('/CariPasien', [CariPasienController::class, 'index'])->middleware('auth','idlevel:1,4');
    Route::post('/CariPasien/store', [CariPasienController::class, 'store'])->middleware('auth','idlevel:1,4');

    Route::get('/MacamRawat', [MacamRawatController::class, 'index'])->middleware('auth','idlevel:1,4');
    Route::post('/MacamRawat/store', [MacamRawatController::class, 'store'])->middleware('auth','idlevel:1,4');
    Route::get('/MacamRawat/ubah{kode}', [MacamRawatController::class, 'ubah'])->middleware('auth','idlevel:1,4');
    Route::post('/MacamRawat/update{kode}', [MacamRawatController::class, 'update'])->middleware('auth','idlevel:1,4');
    Route::get('/MacamRawat/hapus{kode}', [MacamRawatController::class, 'hapus'])->middleware('auth','idlevel:1,4');

    Route::get('/INOS', [INOSController::class, 'index'])->middleware('auth','idlevel:1,4');

    Route::get('/Status_Pulang', function () {
        return view('RawatInap.Content.Status_Pulang');
    })->middleware('auth','idlevel:1,4,6');

    Route::get('/PenggunaanObatRI', [PenggunaanObatRIController::class, 'index'])->middleware('auth','idlevel:1,4');

    Route::get('/Data_Pendaftaran_Rawat_Inap/cetakdatapendaftaranrawatinap', [Data_Pendaftaran_Rawat_InapController::class, 'cetakdatapendaftaranrawatinap'])->middleware('auth','idlevel:1,3,4,5,7,10');

    /* ----- RawatInap -----*/

    /* ----- Operasi -----*/
    Route::get('/Operasi', function () {
        return view('Operasi.Content.index');
    });

    Route::get('/GolonganOperasi', [GolonganOperasiController::class, 'index'])->middleware('auth','idlevel:1,4');
    Route::get('/JenisAnestesi', [JenisAnestesiController::class, 'index'])->middleware('auth','idlevel:1,4');
    Route::get('/SpesialisBedah', [SpesialisBedahController::class, 'index'])->middleware('auth','idlevel:1,4');
    Route::get('/DataOperasi', [DataOperasiController::class, 'index'])->middleware('auth','idlevel:1,3,4,6,7,10');
    Route::get('/Tarif_Tindakan_Operasi', [Tarif_Tindakan_OperasiController::class, 'index'])->middleware('auth','idlevel:1,4');
    Route::get('/DokterBedah', [DokterBedahController::class, 'index'])->middleware('auth','idlevel:1,4');
    Route::post('/DokterBedah/store', [DokterBedahController::class, 'store'])->middleware('auth','idlevel:1,4');
    Route::get('/DokterBedah/ubah{iddokter},{jenisrawat}', [DokterBedahController::class, 'ubah'])->middleware('auth','idlevel:1,4');
    Route::post('/DokterBedah/update{iddokter},{jenisrawat}', [DokterBedahController::class, 'update'])->middleware('auth','idlevel:1,4');
    Route::get('/DokterBedah/hapus{iddokter},{jenisrawat}', [DokterBedahController::class, 'hapus'])->middleware('auth','idlevel:1,4');

    Route::get('/DokterBedah/cetakdatadokterbedah', [DokterBedahController::class, 'cetakdatadokterbedah'])->middleware('auth','idlevel:1,4');
    /* ----- Operasi -----*/

    /* ----- Billing -----*/
    Route::get('/Billing', function () {
        return view('Billing.Content.index');
    });

    Route::get('/Tagihan_RJ', [Tagihan_RJController::class, 'index'])->middleware('auth','idlevel:1')->middleware('auth','idlevel:1,4,6');
    Route::get('/PembayaranRJ', [PembayaranRJController::class, 'index'])->middleware('auth','idlevel:1')->middleware('auth','idlevel:1,4,6');
    Route::get('/PembayaranRJ/selectbayarrjalan{nobayar_rjalan}', [PembayaranRJController::class, 'selectbayarrjalan'])->middleware('auth','idlevel:1')->middleware('auth','idlevel:1,4,6');
    Route::post('/PembayaranRJ/store', [PembayaranRJController::class, 'store'])->middleware('auth','idlevel:1')->middleware('auth','idlevel:1,4,6');

    Route::get('/Data_PembayaranRJ', [Data_PembayaranRJController::class, 'index'])->middleware('auth','idlevel:1')->middleware('auth','idlevel:1,4,6');

    Route::get('/Tagihan_RJ/selectnorm{norm}', [Tagihan_RJController::class, 'selectnorm'])->middleware('auth','idlevel:1')->middleware('auth','idlevel:1,4,6');
    Route::get('/Tagihan_RJ/selectfakturrj{faktur_rawatjalan}', [Tagihan_RJController::class, 'selectfakturrj'])->middleware('auth','idlevel:1')->middleware('auth','idlevel:1,4,6');
    Route::post('/Tagihan_RJ/store', [Tagihan_RJController::class, 'store'])->middleware('auth','idlevel:1')->middleware('auth','idlevel:1,4,6');

    Route::get('/RekeningRI', [RekeningRIController::class, 'index'])->middleware('auth','idlevel:1')->middleware('auth','idlevel:1,4,6');
    Route::get('/Deposit', [Data_DepositController::class, 'tambah'])->middleware('auth','idlevel:1')->middleware('auth','idlevel:1,4,6');
    Route::get('/Deposit/selecttambah{norm}', [Data_DepositController::class, 'selecttambah'])->middleware('auth','idlevel:1,4,6');
    Route::get('/Deposit/lihatdetail{notrans}', [Data_DepositController::class, 'lihatdetail'])->middleware('auth','idlevel:1,4,6');

    Route::get('/Data_Deposit', [Data_DepositController::class, 'index'])->middleware('auth','idlevel:1,4,6');
    Route::post('/Data_Deposit/store', [Data_DepositController::class, 'store'])->middleware('auth','idlevel:1,4,6');

    /* ----- Billing -----*/

    /* ----- Laporan -----*/
    Route::get('/Laporan', function () {
        return view('Laporan.Content.index');
    });

    /* ----- Laporan -----*/

    /* ----- BPJS -----*/
    Route::get('/BPJS', function () {
        return view('BPJS.Content.index');
    });

    /* ----- BPJS -----*/

    /* ----- Akuntansi -----*/
    Route::get('/Akuntansi', function () {
        return view('Akuntansi.Content.index');
    });

    /* ----- Akuntansi -----*/

    /* ----- Panduan -----*/
    Route::get('/Panduan', function () {
        return view('Panduan.Content.index');
    });

    /* ----- Panduan -----*/


/* ----- Penutup Middleware -----*/
//});
/* ----- Penutup Middleware -----*/