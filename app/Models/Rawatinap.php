<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rawatinap extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $keyType = 'string';
    protected $table        = 'rawatinap'; // nama tabel 
    protected $primaryKey   = 'faktur_rawatinap'; // primary key tabel 
    protected $fillable     = [
        'faktur_rawatjalan', 'norm', 'kodekamar', 'tglmasuk', 'tglkeluar', 'kodemasuk', 'macamrawat', 'idprsh', 'iddokter', 'diagnosaawal', 'diagnosaakhir', 'prosedur1', 'penyebab_luar', 'kunjunganke', 'iduserpendaftaran', 'iduserkasir', 'imunitas', 'penanggungjawab', 'hubungan_pj', 'alamat_pj', 'telp_pj', 'status_pulang', 'beratbadan', 'tinggibadan', 'administrasi', 'subtotal', 'diskonpersen', 'diskonnominal', 'diskonnilai', 'pembulatan', 'statustransaksi', 'nosep', 'idklaimdokter', 'idklaimadministrasi', 'kondisikeluar', 'edukasiawal', 'edukasiawalket', 'edukasikepada', 'tglrujuk', 'rsrujuk', 'norujuk', 'adm_posting_ak', 'adm_nojurnal'
    ]; //field tabel

    public function Pasien() { //Jabatan dimiliki oleh karyawan
        return $this->belongsTo(Pasien::class,'norm');
        //nama_modelTabelrelasinya,foreignkey di tabel Karyawan
    }
    public function Dokter() { //Jabatan dimiliki oleh karyawan
        return $this->belongsTo(Dokter::class,'iddokter');
        //nama_modelTabelrelasinya,foreignkey di tabel Karyawan
    }
    public function Kamar() { //Jabatan dimiliki oleh karyawan
        return $this->belongsTo(Kamar::class,'kodekamar');
        //nama_modelTabelrelasinya,foreignkey di tabel Karyawan
    }
    public function Perusahaan() { //Jabatan dimiliki oleh karyawan
        return $this->belongsTo(Perusahaan::class,'idprsh');
        //nama_modelTabelrelasinya,foreignkey di tabel Karyawan
    }
}