<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarif_dokter_konsultasi extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table        = 'tarif_dokter_konsultasi'; // nama tabel 
    protected $primaryKey   = 'iddokter'; // primary key tabel 
    protected $fillable     = ['kodekelas', 
    							'tarif',
                                'untukrs',
                                'untukdokter',
                                'idklaim']; //field tabel
        public function Kelas() { //Kelas dimiliki oleh Tarif_dokter_poli
            return $this->belongsTo(Kelas::class,'kodekelas');
 		    //nama_modelTabelrelasinya,foreignkey di tabel Tarif_dokter_poli
		}
        public function Dokter() { 
            return $this->belongsTo(Dokter::class,'iddokter');
  		}      
        public function Eklaimbpjs() {
            return $this->belongsTo(Eklaimbpjs::class,'idklaim');
   		}
}
