<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use HasFactory;

    protected $table        = 'dokter'; // nama tabel 
    protected $primaryKey   = 'iddokter'; // primary key tabel 
    protected $fillable     = ['nama', 
    							'alamat',
                                'jeniskelamin',
                                'telepon',
                                'jenisdokter',
                                'tgl_aktif ',
                                'img',
                                'nikd']; //field tabel
}
