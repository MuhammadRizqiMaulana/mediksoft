<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adm extends Model
{
    use HasFactory;

    protected $table        = 'adm'; // nama tabel 
    protected $primaryKey   = 'idadm'; // primary key tabel 
    protected $fillable     = ['jenisrawat', 
    							'jenispoli', 
    							'tarif']; //field tabel

}
