<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bayar_rinap extends Model
{
    use HasFactory;

    protected $table        = 'bayar_rinap'; // nama tabel 
    protected $primaryKey   = 'nobayar_rinap'; // primary key tabel 
    protected $fillable     = ['faktur_rawatinap', 
    							'tanggal',
                                'tanggalbayar',
                                'norm',
                                'namapembayar',
                                'memo',
                                'tagihan',
                                'ambildeposit',
                                'bayar',
                                'bayarsharing',
                                'metodebayar',
                                'noreferensi',
                                'idbank',
                                'iduserkasir',
                                'tgledit',
                                'idgantishift',
                                'tg_posting_ak',
                                'tg_nojurnal',
                                'by_posting_ak',
    							'by_nojurnal']; //field tabel
}
