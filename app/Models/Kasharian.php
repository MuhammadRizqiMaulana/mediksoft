<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kasharian extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table        = 'kasharian'; // nama tabel 
    protected $primaryKey   = 'idtransaksibebas '; // primary key tabel 
    protected $fillable     = ['tanggal', 
    							'masuk',
                                'keluar',
                                'idjenistransaksi',
                                'darikepada',
                                'keterangan',
                                'idkasir',
                                'idgantishift',
                                'saldoakhir',
                                'posting_ak',
                                'nojurnal']; //field tabel
}
