<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Op_cito extends Model
{
    use HasFactory;

    protected $table='op_cito'; 
    protected $fillable = [
        'peresentase'
    ];
}
