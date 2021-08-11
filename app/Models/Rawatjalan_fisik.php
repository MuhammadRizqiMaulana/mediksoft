<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rawatjalan_fisik extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table        = 'rawatjalan_fisik'; // nama tabel 
    protected $primaryKey   = ''; // primary key tabel 
    protected $fillable     = ['norm', 'faktur_rawatjalan', 'pemeriksaan']; //field tabel
}