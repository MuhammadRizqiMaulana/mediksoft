<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'perusahaan';
    protected $primaryKey = 'idprsh';
    protected $fillable = [
        'namaprsh', 'alamatprsh', 'telp', 'jenisprsh', 'kontak', 'expired', 'idkategori'
    ];
}