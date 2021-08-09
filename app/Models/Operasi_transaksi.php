<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operasi_transaksi extends Model
{
    use HasFactory;
    protected $table='operasi_transaksi'; 
    protected $primaryKey = 'nooperasi';
    protected $fillable = [
        'tgl','jenis','noRIRJ','norm','kodekamar','idpoli','idgoloperasi','idprsh','idspesialisbedah','diagnosa','prosedur1','subtotal' 
    ];
}
