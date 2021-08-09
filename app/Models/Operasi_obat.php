<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operasi_obat extends Model
{
    use HasFactory;
    protected $table='operasi_obat'; 
    protected $fillable = [
        'nooperasi','nofakturrirj','norm','kodebarang','ke'
    ];
}
