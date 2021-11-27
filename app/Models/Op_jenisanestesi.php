<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Op_jenisanestesi extends Model
{
    use HasFactory;

    protected $table = 'op_jenisanestesi';
    protected $primaryKey = 'idjenisanestesi';
    protected $fillable = [
        'jenisanestesi'
    ];
}