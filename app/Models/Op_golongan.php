<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Op_golongan extends Model
{
    use HasFactory;

    protected $table='op_golongan'; 
    protected $primaryKey = 'idgoloperasi';
    protected $fillable = [
        'goloperasi', 
    ];
}
