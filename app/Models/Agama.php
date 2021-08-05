<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agama extends Model
{
    use HasFactory;

    protected $table        = 'agama'; // nama tabel 
    protected $primaryKey   = 'idagama'; // primary key tabel 
    protected $fillable     = ['agama']; //field tabel
}
