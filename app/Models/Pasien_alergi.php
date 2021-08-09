<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien_alergi extends Model
{
    use HasFactory;
    protected $table='pasien_alergi';
    protected $fillable = [
        'norm','jenisalergi','keterangan'
    ]
}
