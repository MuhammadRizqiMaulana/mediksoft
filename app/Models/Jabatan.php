<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table        = 'jabatan'; // nama tabel 
    protected $primaryKey   = 'id'; // primary key tabel 
    protected $fillable     = ['nama', 
    							'tgledit',
                                'medika',
                                'labrad',
                                'apotek',
                                'admin',
                                'prepay']; //field tabel
}
