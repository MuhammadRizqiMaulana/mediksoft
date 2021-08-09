<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan_lock extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table        = 'jabatan_lock'; // nama tabel 
    protected $primaryKey   = 'lock'; // primary key tabel 
    protected $fillable     = ['idjabatan']; //field tabel
}
