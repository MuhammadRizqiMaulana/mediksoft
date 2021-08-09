<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eklaimpendaftaran extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table        = 'eklaimpendaftaran'; // nama tabel 
    protected $primaryKey   = 'instalasi'; // primary key tabel 
    protected $fillable     = ['idklaim']; //field tabel
}
