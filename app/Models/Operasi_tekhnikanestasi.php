<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operasi_tekhnikanestasi extends Model
{
	use HasFactory;
    protected $table='operasi_tekhnikanestasi'; 
    protected $fillable = [
        'nooperasi','nofakturrirj','norm','jam1','jam2','regional','lv','inhalasi1','inhalasi2','inhalasino','induksi','maintenance','obat','obat2' 
    ];}
