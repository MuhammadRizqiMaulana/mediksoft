<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rawatinap_udd extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table        = 'rawatinap_udd'; // nama tabel 
    protected $primaryKey   = 'faktur_rawatinap'; // primary key tabel 
    protected $fillable     = [
        'nojualresep', 'kodebarang', 'tanggal', 'jumlah', 'keterangan', 'perawat', 'rute'
    ]; //field tabel
}