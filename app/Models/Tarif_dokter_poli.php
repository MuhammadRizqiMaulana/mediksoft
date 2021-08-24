<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarif_dokter_poli extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table        = 'tarif_dokter_poli'; // nama tabel 
    protected $primaryKey   = 'kodepoli'; // primary key tabel 
    protected $fillable     = ['iddokter',
                                'tarif', 
    							'untukrs',
                                'untukdokter',
                                'idklaim',
                                'pemakaitarif']; //field tabel

        public function Poliklinik() { //Poliklinik dimiliki oleh Tarif_dokter_poli
        return $this->belongsTo(Poliklinik::class,'kodepoli');
 		//nama_modelTabelrelasinya,foreignkey di tabel Tarif_dokter_poli
		}
        public function Dokter() { 
        return $this->belongsTo(Dokter::class,'iddokter');
  		}      


        public function Eklaimbpjs() {
        return $this->belongsTo(Eklaimbpjs::class,'idklaim');
   		}
   }
