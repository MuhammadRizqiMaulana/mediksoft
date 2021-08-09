<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategoritransaksi extends Model
{
    use HasFactory;

    protected $table='kategoritransaksi'; 
    protected $primaryKey = 'kode';
    protected $fillable = [
        'kategori', 'ruangperawatan' 
    ];
}
