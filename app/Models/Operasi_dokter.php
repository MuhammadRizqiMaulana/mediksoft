<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operasi_dokter extends Model
{
    use HasFactory;
    protected $table='operasi_dokter'; 
    protected $primaryKey = 'nooperasi';
    protected $primaryKey = 'iddokter';
    protected $fillable = [
        'tugas','tarif' 
    ];
}
