<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarif_tindakan_operasi extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table        = 'tarif_tindakan_operasi'; // nama tabel 
    protected $primaryKey   = 'idtindakan'; // primary key tabel 
    protected $fillable     = ['namatindakan', 
    							'idgoloperasi',
                                'idklaim']; //field tabel
}
