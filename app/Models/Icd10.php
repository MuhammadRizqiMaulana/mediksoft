<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Icd10 extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $keyType = 'string';
    protected $table        = 'icd10'; // nama tabel 
    protected $primaryKey   = 'kode'; // primary key tabel 
    protected $fillable     = [
        'nama',
        'idmordibitas',
        'severity',
        'idstp'
    ]; //field tabel


    public function Icd10_mordibitas()
    { //Icd10_mordibitas dimiliki oleh Icd10
        return $this->belongsTo(Icd10_mordibitas::class, 'idmordibitas');
        //nama_modelTabelrelasinya,foreignkey di tabel Icd10
    }

    public function Icd10_stp()
    { //Icd10_mordibitas dimiliki oleh Icd10
        return $this->belongsTo(Icd10_stp::class, 'idstp');
        //nama_modelTabelrelasinya,foreignkey di tabel Icd10
    }
}