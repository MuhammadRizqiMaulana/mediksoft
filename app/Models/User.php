<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table        = 'user'; // nama tabel 
    protected $primaryKey   = 'iduser'; // primary key tabel 
    protected $fillable     = ['uname', 
    							'nama',
                                'idkaryawan',
                                'pwd',
                                'idlevel',
                                'aktif',
                                'tgledit']; //field tabel
}
