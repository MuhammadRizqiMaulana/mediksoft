<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Icd10_stp extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table        = 'icd10_stp'; // nama tabel 
    protected $primaryKey   = 'idstp'; // primary key tabel 
    protected $fillable     = ['kodestp', 
    							'namastp']; //field tabel
}
