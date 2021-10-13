<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Macamrawat extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $keyType = 'string';
    protected $table='macamrawat';
    protected $primaryKey = 'kode';
    protected $fillable = [
        'macamrawat'
    ];
}
