<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_hakases extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table        = 'user_hakakses'; // nama tabel 
    protected $primaryKey   = 'idlevel'; // primary key tabel 
    protected $fillable     = ['idmenu', 
    							'status',
                                'tambah',
                                'ubah',
                                'hapus',
                                'cetak']; //field tabel
}
