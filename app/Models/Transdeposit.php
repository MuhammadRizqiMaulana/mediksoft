<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transdeposit extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table        = 'transdeposit'; // nama tabel 
    protected $primaryKey   = 'notrans'; // primary key tabel 
    protected $fillable     = ['norm', 
    							'tanggal',
                                'idjenistransaksi',
                                'masuk',
                                'keluar',
                                'noref',
                                'keterangan',
                                'metodebayar',
                                'idbank',
                                'iduserkasir',
                                'idgantishift',
                                'posting_ak',
                                'nojurnal']; //field tabel
                                
    public function Pasien() { //Jabatan dimiliki oleh karyawan
        return $this->belongsTo(Pasien::class,'norm');
        //nama_modelTabelrelasinya,foreignkey di tabel Karyawan
    }

    public function Transdeposit_jenis() { //Jabatan dimiliki oleh karyawan
        return $this->belongsTo(Transdeposit_jenis::class,'idjenistransaksi');
        //nama_modelTabelrelasinya,foreignkey di tabel Karyawan
    }

    public function Bank() { //Jabatan dimiliki oleh karyawan
        return $this->belongsTo(Bank::class,'idbank');
        //nama_modelTabelrelasinya,foreignkey di tabel Karyawan
    }
}
