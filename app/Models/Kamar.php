<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table        = 'kamar'; // nama tabel 
    protected $primaryKey   = '	kodekamar'; // primary key tabel 
    protected $fillable     = ['kodekelas', 
    							'koderuang',
                                'keterangan',
                                'tarif',
                                'jasaperawat',
                                'tglaktif',
                                'jumlahbed',
                                'dikirimkebpjs',
                                'idklaim',
                                'pemakaitarif']; //field tabel
}
