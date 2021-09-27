<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
   use HasFactory;
    public $timestamps = false;
    protected $keyType = 'string';
    protected $table='pasien'; 
    protected $primaryKey = 'norm';
    protected $fillable = [
        'namapasien','jeniskelamin','alamat','idkota','tptlahir','tgllahir','notelp','agama','goldarah','statuskawin','pekerjaan' 
    ];

    public function Diagnosa1() { //Jabatan dimiliki oleh karyawan
        return $this->belongsTo(Icd10::class,'diagnosa1');
        //nama_modelTabelrelasinya,foreignkey di tabel Karyawan
    }
    public function Diagnosa2() { //Jabatan dimiliki oleh karyawan
        return $this->belongsTo(Icd10::class,'diagnosa2');
        //nama_modelTabelrelasinya,foreignkey di tabel Karyawan
    }
    public function Diagnosa3() { //Jabatan dimiliki oleh karyawan
        return $this->belongsTo(Icd10::class,'diagnosa3');
        //nama_modelTabelrelasinya,foreignkey di tabel Karyawan
    }
    public function Lokasi() { //Jabatan dimiliki oleh karyawan
        return $this->belongsTo(Lokasi::class,'idkota');
        //nama_modelTabelrelasinya,foreignkey di tabel Karyawan
    }
    public function Pasien_alergi() { //Jabatan dimiliki oleh karyawan
        return $this->belongsTo(Pasien_alergi::class,'norm');
        //nama_modelTabelrelasinya,foreignkey di tabel Karyawan
    }
    
}
