<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Icd9 extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $keyType = 'string';
    protected $table        = 'icd9'; // nama tabel 
    protected $primaryKey   = 'kode'; // primary key tabel 
    protected $fillable     = ['nama']; //field tabel
}