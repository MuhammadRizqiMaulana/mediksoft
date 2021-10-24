<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rawatjalan_transaksi extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $keyType = 'string';
    protected $table        = 'rawatjalan_transaksi'; // nama tabel 
    protected $primaryKey   = 'notransaksi'; // primary key tabel 
    protected $fillable     = ['faktur_rawatjalan', 
    							'kode_kategori ',
                                'idtindakan',
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
    
    public function Tariftindakanpoli() { //Jabatan dimiliki oleh karyawan
        return $this->belongsTo(Tarif_tindakan_poli::class,'idtindakan');
        //nama_modelTabelrelasinya,foreignkey di tabel Karyawan
    }
}
