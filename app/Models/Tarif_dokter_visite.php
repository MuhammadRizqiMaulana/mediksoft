<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tarif_dokter_visite extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table        = 'tarif_dokter_visite'; // nama tabel 
    protected $fillable     = ['iddokter',
                                'kodekelas', 
    							'tarif',
                                'untukrs',
                                'untukdokter',
                                'idklaim',
                                'pemakaitarif']; //field tabel
                    
    public function Dokter() { //Jabatan dimiliki oleh karyawan
        return $this->belongsTo(Dokter::class,'iddokter');
        //nama_modelTabelrelasinya,foreignkey di tabel Karyawan
    }

    public function Kelas() { //Jabatan dimiliki oleh karyawan
        return $this->belongsTo(Kelas::class,'kodekelas');
        //nama_modelTabelrelasinya,foreignkey di tabel Karyawan
    }

    public function Eklaimbpjs() { //Jabatan dimiliki oleh karyawan
        return $this->belongsTo(Eklaimbpjs::class,'idklaim');
        //nama_modelTabelrelasinya,foreignkey di tabel Karyawan
    }
}
