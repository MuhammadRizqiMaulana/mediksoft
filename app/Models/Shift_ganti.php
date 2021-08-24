<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shift_ganti extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table        = 'shift_ganti'; // nama tabel 
    protected $primaryKey   = 'idgantishift'; // primary key tabel 
    protected $fillable     = ['idkomputer', 
    							'idkasir',
                                'idshift',
                                'tglawal',
                                'tglakhir',
                                'saldoawal',
                                'saldoakhir',
                                'jumlahkas',
                                'catatan',
                                'id_karyawanterimauang',
                                'idkasir_next',
                                'aktif',
                                'saldoawal_shift',
                                'saldoakhir_shift' ]; //field tabel
}
