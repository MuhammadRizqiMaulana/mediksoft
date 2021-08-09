<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstruksiKeluar extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table        = 'instruksikeluar'; // nama tabel 
    protected $primaryKey   = 'faktur_rawatinap'; // primary key tabel 
    protected $fillable     = ['jenisinstruksi', 
    							'instruksi',
                                'tanggal',
                                'kodepoli']; //field tabel

}
