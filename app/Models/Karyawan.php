<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table        = 'karyawan'; // nama tabel 
    protected $primaryKey   = 'idkaryawan'; // primary key tabel 
    protected $fillable     = ['nik', 
    							'noktp',
                                'nama',
                                'jnskelamin',
                                'alamat',
                                'notelp',
                                'idjabatan',
                                'tgledit',
                                'tptlahir',
                                'tgllahir',
                                'goldarah',
                                'pengurus']; //field tabel
}
