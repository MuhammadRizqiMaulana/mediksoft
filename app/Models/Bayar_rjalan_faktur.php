<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bayar_rjalan_faktur extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $keyType = 'string';
    protected $table        = 'bayar_rjalan_faktur'; // nama tabel 
    protected $primaryKey   = 'nobayar_rjalan'; // primary key tabel 
    protected $fillable     = ['nourut', 
    							'faktur_rawatjalan',
                                'biaya']; //field tabel
}
