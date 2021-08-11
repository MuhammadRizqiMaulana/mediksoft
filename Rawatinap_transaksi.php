<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rawatinap_transaksi extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table        = 'rawatinap_transaksi'; // nama tabel 
    protected $primaryKey   = 'faktur_rawatinap'; // primary key tabel 
    protected $fillable     = [
        'notransaksi', 'kodekategori', 'idtindakan', 'tgltransaksi', 'tglkeluar', 'namatransaksi', 'jumlah', 'tarif', 'diskon', 'kodekamar', 'iddokter', 'idklaim', 'tarif_rs', 'tarif_dokter', 'tarif_paramedis'
    ]; //field tabel
}