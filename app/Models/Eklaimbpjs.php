<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eklaimbpjs extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table        = 'eklaimbpjs'; // nama tabel 
    protected $primaryKey   = 'idklaim'; // primary key tabel 
    protected $fillable     = ['nama', 
    							'tgledit']; //field tabel
}
