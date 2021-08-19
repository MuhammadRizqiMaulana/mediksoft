<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarif_dokter_bedah extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table        = 'tarif_dokter_bedah'; // nama tabel 
    protected $primaryKey   = 'iddokter'; // primary key tabel 
    protected $fillable     = ['jenisrawat', 
    							'kodekelas',
                                'idgoloperasi',
                                'tarif',
                                'untukrs',
                                'untukdokter']; //field tabel
}
