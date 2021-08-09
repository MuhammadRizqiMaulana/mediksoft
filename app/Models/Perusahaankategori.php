<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perusahaankategori extends Model
{
    use HasFactory;
    protected $table='perusahaankategori'; 
    protected $primaryKey = 'idkategori';
    protected $fillable = [
        'namakategori'
    ];
}
