<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operasi_preoperasi extends Model
{
    use HasFactory;
    protected $table='operasi_preoperasi'; 
    protected $fillable = [
        'nooperasi','nofakturrirj','norm','resiko','t','jantung','hb','n','resp','paru','i','bb','asa','lain','h1','ekg','catatanlain','premdikasi' 
    ];
}
