<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rawatjalan_perawat extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table        = 'rawatjalan_perawat'; // nama tabel 
    protected $primaryKey   = 'faktur_rawatjalan'; // primary key tabel 
    protected $fillable     = ['notransaksi', 'idtindakan', 'idkaryawan', 'tglmasukrj', 'tarifparamedis']; //field tabel
}