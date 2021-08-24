<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $table='kelas'; 
    protected $keyType = 'string';
    protected $primaryKey = 'kodekelas';
    protected $fillable = [
        'nama', 'kodekelasbpjs' 
    ];
}
