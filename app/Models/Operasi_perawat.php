<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operasi_perawat extends Model
{
    use HasFactory;
    protected $table='operasi_perawat'; 
    protected $primaryKey = 'nooperasi';
    protected $primaryKey = 'idkaryawan';
    protected $fillable = [
        'tugas','tarif' 
    ];
}
