<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inos extends Model
{
    use HasFactory;

    protected $table        = 'inos'; // nama tabel 
    protected $primaryKey   = 'faktur_rawatinap'; // primary key tabel 
    protected $fillable     = ['norm', 
    							'ilo',
                                'isk',
                                'pneumoni',
                                'sepsis',
                                'plebitis',
                                'dicubitus',
                                'keterangan']; //field tabel
}
