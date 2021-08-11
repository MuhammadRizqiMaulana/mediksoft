<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rawatjalan extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table        = 'rawatjalan'; // nama tabel 
    protected $primaryKey   = 'faktur_rawatjalan'; // primary key tabel 
    protected $fillable     = [
        'norm', 'tglmasuk', 'kodepoli', 'iddokter', 'idprsh', 'kodefaskespengirim', 'diagnosaawal', 'diagnosaakhir', 'prosedur1', 'administrasi', 'tarifdokter', 'subtotal', 'diskon', 'inap', 'iduserpendaftaran', 'iduserkasir', 'statustransaksi', 'kunjunganke', 'nosep', 'idklaimdokter', 'idklaimadministrasi', 'edukasiawal', 'edukasiawalket', 'edukasikepada', 'hubdenganpasien', 'diagnosadengan'
    ]; //field tabel
}