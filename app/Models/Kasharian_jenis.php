<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kasharian_jenis extends Model
{
    use HasFactory;

    protected $table='kasharian_jenis'; 
    protected $primaryKey = 'idjenistransaksi';
    protected $fillable = [
        'jenistransaksi', 'masuk' 
    ];
}

