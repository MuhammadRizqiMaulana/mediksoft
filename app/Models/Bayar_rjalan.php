<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bayar_rjalan extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table        = 'bayar_rjalan'; // nama tabel 
    protected $primaryKey   = 'nobayar_rjalan'; // primary key tabel 
    protected $fillable     = ['tanggal', 
    							'norm',
                                'namapembayar',
                                'memo',
                                'tagihan',
                                'tanggalbayar',
                                'diskonpersen',
                                'diskonnominal',
                                'diskonnilai',
                                'pembulatan',
                                'ambildeposit',
                                'bayar',
                                'metodebayar',
                                'noreferensi',
                                'idbank',
                                'iduserkasir',
                                'statuspulang',
                                'tgledit',
                                'idgantishift',
                                'tg_posting_ak',
                                'tg_nojurnal',
                                'by_posting_ak',
    							'by_nojurnal']; //field tabel
}
