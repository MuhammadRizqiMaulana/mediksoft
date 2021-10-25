<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamarkosong_temp extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $keyType = 'string';
    protected $table        = 'kamarkosong_temp'; // nama tabel 
    protected $primaryKey   = 'keterangan'; // primary key tabel 
    protected $fillable     = ['keterangan2', 
    							'namakelas',
                                'namaruang',
                                'sisakamar',
                                'kodekelas',
                                'namakamar']; //field tabel
} 
