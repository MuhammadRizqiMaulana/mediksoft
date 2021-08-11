<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rawatjalan_icd10 extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table        = 'rawatjalan_icd10'; // nama tabel 
    protected $primaryKey   = ''; // primary key tabel 
    protected $fillable     = ['faktur_rawatjalan', 'norm', 'kode', 'cek']; //field tabel
}