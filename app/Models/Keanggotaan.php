<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keanggotaan extends Model
{

    public $timestamps = false;
    
    protected $table='keanggotaan'; 
    protected $primaryKey = 'idkeanggotaan';
    protected $fillable = [
        'keanggotaan','zona1', 'zona1mulai','zona1akhir','zona2','zona2mulai','zona2akhir','zona3','zona3mulai','zona3akhir'
    ];
}
