<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bayar_rjalan extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $keyType = 'string';
    protected $table        = 'bayar_rjalan'; // nama tabel 
    protected $primaryKey   = 'nobayar_rjalan'; // primary key tabel 
    protected $fillable     = ['tanggal', 
    							'norm',
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

    public function Pasien() { //Jabatan dimiliki oleh karyawan
        return $this->belongsTo(Pasien::class,'norm');
        //nama_modelTabelrelasinya,foreignkey di tabel Karyawan
    }
    public function Bank() { //Jabatan dimiliki oleh karyawan
        return $this->belongsTo(Bank::class,'idbank');
        //nama_modelTabelrelasinya,foreignkey di tabel Karyawan
    }
    public function Karyawan() { //Jabatan dimiliki oleh karyawan
        return $this->belongsTo(Karyawan::class,'iduserkasir');
        //nama_modelTabelrelasinya,foreignkey di tabel Karyawan
    }
    public function Statuspulang() { //Jabatan dimiliki oleh karyawan
        return $this->belongsTo(Statuspulang::class,'statuspulang');
        //nama_modelTabelrelasinya,foreignkey di tabel Karyawan
    }
}
