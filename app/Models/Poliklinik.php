<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poliklinik extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $keyType = 'string';
    protected $table        = 'poliklinik'; // nama tabel 
    protected $primaryKey   = 'kode'; // primary key tabel 
    protected $fillable     = [
        'nama',
        'jenispoli'
    ]; //field tabel
}