<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruang extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table='ruang'; 
    protected $primaryKey = 'koderuang';
    protected $fillable = [
        'namaruang'
    ];
}
