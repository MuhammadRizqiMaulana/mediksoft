<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarif_tindakan_inap_kelas extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table        = 'tarif_tindakan_inap_kelas'; // nama tabel 
    protected $primaryKey   = 'idtindakan'; // primary key tabel 
    protected $fillable     = ['kodekelas', 
    							'tarif',
                                'untukrs',
                                'untukdokter',
                                'untukparamedis']; //field tabel
}
