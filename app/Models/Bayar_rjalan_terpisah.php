<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bayar_rjalan_terpisah extends Model
{
    use HasFactory;

    protected $table        = 'bayar_rjalan_terpisah'; // nama tabel 
    protected $primaryKey   = 'nobayar'; // primary key tabel 
    protected $fillable     = ['tgltransaksi', 
    							'namapembayar',
                                'keperluan',
                                'jenistransaksi',
                                'nomortransaksi',
                                'nopendaftaran ',
                                'norm',
                                'tagihan',
                                'diskonpersen',
                                'bayar',
                                'metodebayar',
                                'noreferensi',
                                'metodebayar',
                                'noreferensi',
                                'idbank',
                                'iduserkasir',
                                'namapasienluar',
                                'idgantishift',
                                'diskonnominal',
                                'diskonnilai',
                                'pembulatan',
    							'nojurnal']; //field tabel
}
