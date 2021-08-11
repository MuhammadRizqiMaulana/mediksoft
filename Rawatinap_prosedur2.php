<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rawatinap_prosedur2 extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table        = 'rawatinap_prosedur2'; // nama tabel 
    protected $primaryKey   = 'faktur_rawatinap'; // primary key tabel 
    protected $fillable     = [
        'kodeicd9'
    ]; //field tabel
}