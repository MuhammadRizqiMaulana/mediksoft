<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rawatjalan_prosedur2 extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table        = 'rawatjalan_prosedur2'; // nama tabel 
    protected $primaryKey   = 'faktur_rawatjalan'; // primary key tabel 
    protected $fillable     = ['kodeicd9']; //field tabel
}