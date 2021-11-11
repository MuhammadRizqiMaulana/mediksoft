<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rawatjalan extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $keyType = 'string';
    protected $table        = 'rawatjalan'; // nama tabel 
    protected $primaryKey   = 'faktur_rawatjalan'; // primary key tabel 
    protected $fillable     = [
        'norm', 'tglmasuk', 'kodepoli', 'iddokter', 'idprsh', 'kodefaskespengirim', 'diagnosaawal', 'diagnosaakhir', 'prosedur1', 'administrasi', 'tarifdokter', 'subtotal', 'diskon', 'inap', 'iduserpendaftaran', 'iduserkasir', 'statustransaksi', 'kunjunganke', 'nosep', 'idklaimdokter', 'idklaimadministrasi', 'edukasiawal', 'edukasiawalket', 'edukasikepada', 'hubdenganpasien', 'diagnosadengan'
    ]; //field tabel

    public function Pasien() { //Jabatan dimiliki oleh karyawan
        return $this->belongsTo(Pasien::class,'norm');
        //nama_modelTabelrelasinya,foreignkey di tabel Karyawan
    }
    public function Poliklinik() { //Jabatan dimiliki oleh karyawan
        return $this->belongsTo(Poliklinik::class,'kodepoli');
        //nama_modelTabelrelasinya,foreignkey di tabel Karyawan
    }
    public function Dokter() { //Jabatan dimiliki oleh karyawan
        return $this->belongsTo(Dokter::class,'iddokter');
        //nama_modelTabelrelasinya,foreignkey di tabel Karyawan
    }
    public function Perusahaan() { //Jabatan dimiliki oleh karyawan
        return $this->belongsTo(Perusahaan::class,'idprsh');
        //nama_modelTabelrelasinya,foreignkey di tabel Karyawan
    }
    public function Faskes() { //Jabatan dimiliki oleh karyawan
        return $this->belongsTo(Faskes::class,'kodefaskespengirim');
        //nama_modelTabelrelasinya,foreignkey di tabel Karyawan
    }
    public function Rawatjalan_transaksi() { //Jabatan dimiliki oleh karyawan
        return $this->HasMany(Rawatjalan_transaksi::class,'faktur_rawatjalan');
        //nama_modelTabelrelasinya,foreignkey di tabel Karyawan
    }
}