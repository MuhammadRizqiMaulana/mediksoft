<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamar_terisi extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table        = 'kamar_terisi'; // nama tabel 
    protected $primaryKey   = '	kodekamar'; // primary key tabel 
    protected $fillable     = ['faktur_rawatinap', 
    							'tglmasukkamar']; //field tabel
}
