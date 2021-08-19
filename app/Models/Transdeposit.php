<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transdeposit extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table        = 'transdeposit'; // nama tabel 
    protected $primaryKey   = 'notrans'; // primary key tabel 
    protected $fillable     = ['norm', 
    							'tanggal',
                                'idjenistransaksi',
                                'masuk',
                                'keluar',
                                'noref',
                                'keterangan',
                                'metodebayar',
                                'idbank',
                                'iduserkasir',
                                'idgantishift',
                                'posting_ak',
                                'nojurnal']; //field tabel
}
