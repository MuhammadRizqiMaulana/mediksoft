<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    use HasFactory;

    protected $table='lokasi'; 
    protected $primaryKey = 'idlokasi';
    protected $fillable = [
        'lokasikode', 'lokasi_nama','lokasi_propinsi','lokasi_kabupaten' 
    ];
}
