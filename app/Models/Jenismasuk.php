<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenismasuk extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $keyType = 'string';
    protected $table        = 'jenismasuk'; // nama tabel 
    protected $primaryKey   = 'kodemasuk'; // primary key tabel 
    protected $fillable     = ['jenismasuk']; //field tabel
}
