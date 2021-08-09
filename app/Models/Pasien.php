<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
   use HasFactory;
    protected $table='pasien'; 
    protected $primaryKey = 'norm';
    protected $fillable = [
        'namapasien','jeniskelamin','alamat','idkota','tptlahir','tgllahir','notelp','agama','goldarah','statuskawin','pekerjaan' 
    ];
}
