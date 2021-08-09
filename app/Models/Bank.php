<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table        = 'bank'; // nama tabel 
    protected $primaryKey   = 'idbank'; // primary key tabel 
    protected $fillable     = ['namabank', 
    							'alamat',
                                'telp',
                                'keterangan',
                                'tgledit',
                                'kodeakun']; //field tabel
}
