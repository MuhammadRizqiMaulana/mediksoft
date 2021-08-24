<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $keyType = 'string';
    protected $table        = 'kamar'; // nama tabel 
    protected $primaryKey   = 'kodekamar'; // primary key tabel 
    protected $fillable     = ['kodekelas', 
    							'koderuang',
                                'keterangan',
                                'tarif',
                                'jasaperawat',
                                'tglaktif',
                                'jumlahbed',
                                'dikirimkebpjs',
                                'idklaim',
                                'pemakaitarif']; //field tabel
    
    public function Eklaimbpjs() { //Jabatan dimiliki oleh karyawan
        return $this->belongsTo(Eklaimbpjs::class,'idklaim');
        //nama_modelTabelrelasinya,foreignkey di tabel Karyawan
    }
    public function Ruang() { //Jabatan dimiliki oleh karyawan
        return $this->belongsTo(Ruang::class,'koderuang');
        //nama_modelTabelrelasinya,foreignkey di tabel Karyawan
    }
    public function Kelas() { //Jabatan dimiliki oleh karyawan
        return $this->belongsTo(Kelas::class,'kodekelas');
        //nama_modelTabelrelasinya,foreignkey di tabel Karyawan
    }
}
