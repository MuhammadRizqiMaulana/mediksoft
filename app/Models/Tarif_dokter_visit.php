<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarif_dokter_visit extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table        = 'tarif_dokter_visit'; // nama tabel 
    protected $primaryKey   = 'iddokter'; // primary key tabel 
    protected $fillable     = ['kodekelas', 
    							'tarif',
                                'untukrs',
                                'untukdokter',
                                'idklaim',
                                'pemakaitarif']; //field tabel
}
