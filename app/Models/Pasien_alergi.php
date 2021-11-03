<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien_alergi extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table='pasien_alergi';
    protected $primaryKey = 'norm';
    protected $fillable = [
        'jenisalergi','keterangan'
    ];
}
