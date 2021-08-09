<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Op_spesialisbedah extends Model
{
    use HasFactory;

    protected $table='op_spesialisbedah'; 
    protected $primaryKey = 'idspesialisbedah';
    protected $fillable = [
        'spesialisbedah' 
    ];
}
