<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fasilitaskesehatan extends Model
{
    use HasFactory;

    protected $table        = 'fasilitaskesehatan'; // nama tabel 
    protected $primaryKey   = 'idfaskes'; // primary key tabel 
    protected $fillable     = ['kodefaskes', 
    							'namafaskes',
                                'alamatfaskes']; //field tabel
}
