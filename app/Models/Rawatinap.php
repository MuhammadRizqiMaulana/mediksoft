<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rawatinap extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table        = 'rawatinap'; // nama tabel 
    protected $primaryKey   = 'faktur_rawatinap'; // primary key tabel 
    protected $fillable     = [
        'faktur_rawatjalan', 'norm', 'kodekamar', 'tglmasuk', 'tglkeluar', 'kodemasuk', 'macamrawat', 'idprsh', 'iddokter', 'diagnosaawal', 'diagnosaakhir', 'prosedur1', 'penyebab_luar', 'kunjunganke', 'iduserpendaftaran', 'iduserkasir', 'imunitas', 'penanggungjawab', 'hubungan_pj', 'alamat_pj', 'telp_pj', 'status_pulang', 'beratbadan', 'tinggibadan', 'administrasi', 'subtotal', 'diskonpersen', 'diskonnominal', 'diskonnilai', 'pembulatan', 'statustransaksi', 'nosep', 'idklaimdokter', 'idklaimadministrasi', 'kondisikeluar', 'edukasiawal', 'edukasiawalket', 'edukasikepada', 'tglrujuk', 'rsrujuk', 'norujuk', 'adm_posting_ak', 'adm_nojurnal'
    ]; //field tabel
}