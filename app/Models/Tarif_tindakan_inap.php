<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarif_tindakan_inap extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table        = 'tarif_tindakan_inap'; // nama tabel 
    protected $primaryKey   = 'idtindakan'; // primary key tabel 
    protected $fillable     = ['kodekategori', 
    							'namatindakan',
                                'idklaim']; //field tabel
}
