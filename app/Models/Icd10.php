<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Icd10 extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table        = 'icd10'; // nama tabel 
    protected $primaryKey   = 'kode'; // primary key tabel 
    protected $fillable     = ['nama', 
    							'idmordibitas',
                                'severity',
                                'idstp']; //field tabel
}
