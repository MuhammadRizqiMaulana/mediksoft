<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rawatjalan_transaksi extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table        = 'rawatjalan_transaksi'; // nama tabel 
    protected $primaryKey   = 'faktur_rawatjalan'; // primary key tabel 
    protected $fillable     = ['notransaksi', 
    							'kode_kategori ',
                                'id_tindakan',
                                'nama_transaksi',
                                'jumlah',
                                'tarif',
                                'diskon',
                                'idklaim',
                                'tarif_rs',
                                'tarif_dokter',
                                'tarif_rs',
                                'tarif_paramedis',
                                'tglpelayanan' ]; //field tabel
}
