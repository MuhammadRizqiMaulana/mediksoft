<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Op_jenisanestasi extends Model
{
    use HasFactory;

    protected $table='op_jenisanestasi'; 
    protected $primaryKey = 'idjenisanestasi';
    protected $fillable = [
        'jenisanestasi'
    ];
}
