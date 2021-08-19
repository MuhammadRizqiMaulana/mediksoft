<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarif_dokter_poli extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table        = 'tarif_dokter_poli'; // nama tabel 
    protected $primaryKey   = 'iddokter'; // primary key tabel 
    protected $fillable     = ['tarif', 
    							'untukrs',
                                'untukdokter',
                                'idklaim',
                                'pemakaitarif']; //field tabel
}
