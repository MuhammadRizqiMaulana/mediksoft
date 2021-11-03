<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarif_tindakan_inap_kelas extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table        = 'tarif_tindakan_inap_kelas'; // nama tabel 
    protected $fillable     = ['idtindakan',
                                'kodekelas', 
    							'tarif',
                                'untukrs',
                                'untukdokter',
                                'untukparamedis']; //field tabel


    public function Kelas() { //Kelas dimiliki oleh Tarif_dokter_poli
        return $this->belongsTo(Kelas::class,'kodekelas');
 	   //nama_modelTabelrelasinya,foreignkey di tabel Tarif_dokter_poli
	}
}
