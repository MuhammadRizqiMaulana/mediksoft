<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rawatjalan_diagnosa2 extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table        = 'rawatjalan_diagnosa2'; // nama tabel 
    protected $primaryKey   = 'faktur_rawatjalan'; // primary key tabel 
    protected $fillable     = ['kodeicd10']; //field tabel
}