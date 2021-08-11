<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rawatjalan_infus extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table        = 'rawatjalan_infus'; // nama tabel 
    protected $primaryKey   = 'faktur_rawatjalan'; // primary key tabel 
    protected $fillable     = ['norm', 'kodebarang', 'cek']; //field tabel
}