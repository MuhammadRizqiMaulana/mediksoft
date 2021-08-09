<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategoritransaksi_rawatjalan extends Model
{
    use HasFactory;

    protected $table='kategoritransaksi_rawatjalan'; 
    protected $primaryKey = 'kode';
    protected $fillable = [
        'kategori'
    ];
}
