<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rawatjalan_masalahkeperawatan extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table        = 'rawatjalan_masalahkeperawatan'; // nama tabel 
    protected $primaryKey   = 'faktur_rawatjalan'; // primary key tabel 
    protected $fillable     = ['norm', 'masalah', 'cek', 'nomor', 'pilih']; //field tabel
}