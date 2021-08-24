<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serverbpjs extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table        = 'serverbpjs'; // nama tabel 
    protected $primaryKey   = 'id'; // primary key tabel 
    protected $fillable     = ['kode', 
    							'alamat',
                                'jenisserver']; //field tabel
}
