<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarif_tindakan_poli extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table        = 'tarif_tindakan_poli'; // nama tabel 
    protected $primaryKey   = 'idtindakan'; // primary key tabel 
    protected $fillable     = [
        'kodepoli',
        'namatindakan',
        'tarif',
        'untukrs',
        'untukdokter',
        'untukparamedis',
        'idklaim',
        'pemakaitarif'
    ]; //field tabel

    public function Poliklinik()
    { //Jabatan dimiliki oleh karyawan
        return $this->belongsTo(Poliklinik::class, 'kodepoli');
        //nama_modelTabelrelasinya,foreignkey di tabel Karyawan
    }

    public function Eklaimbpjs()
    { //Jabatan dimiliki oleh karyawan
        return $this->belongsTo(Eklaimbpjs::class, 'idklaim');
        //nama_modelTabelrelasinya,foreignkey di tabel Karyawan
    }

    public function Icd9()
    { //Jabatan dimiliki oleh karyawan
        return $this->belongsTo(Icd9::class, 'kode');
        //nama_modelTabelrelasinya,foreignkey di tabel Karyawan
    }
}