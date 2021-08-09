<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Icd10_mordibitas extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table        = 'icd10_mordibitas'; // nama tabel 
    protected $primaryKey   = 'idmordibitas'; // primary key tabel 
    protected $fillable     = ['nodtd', 
    							'noterinci',
                                'golsebabsakit',
                                'surveilans',
                                'sebabluar']; //field tabel
}
