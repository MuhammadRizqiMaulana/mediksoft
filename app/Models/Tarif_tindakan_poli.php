<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarif_tindakan_poli extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table        = 'tarif_tindakan_poli'; // nama tabel 
    protected $primaryKey   = 'idtindakan'; // primary key tabel 
    protected $fillable     = ['kodepoli',
                                'namatindakan', 
    							'tarif',
                                'untukrs',
                                'untukdokter',
                                'untukparamedis',
                                'idklaim',
                                'pemakaitarif']; //field tabel
}
