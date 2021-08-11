<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rawatjalan_instruksi extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table        = 'rawatjalan_instruksi'; // nama tabel 
    protected $primaryKey   = ''; // primary key tabel 
    protected $fillable     = ['faktur_rawatjalan', 'norm', 'instruksi', 'cek']; //field tabel
}