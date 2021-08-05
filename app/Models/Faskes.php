<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faskes extends Model
{
    use HasFactory;

    protected $table        = 'faskes'; // nama tabel 
    protected $primaryKey   = 'kodefaskes'; // primary key tabel 
    protected $fillable     = ['kodedari_bpjs', 
    							'namafaskes',
                                'alamat',
                                'fee']; //field tabel
}
