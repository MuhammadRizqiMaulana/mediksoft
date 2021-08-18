<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rawatjalan_terapi extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table        = 'rawatjalan_terapi'; // nama tabel 
    protected $primaryKey   = 'faktur_rawatjalan'; // primary key tabel 
    protected $fillable     = ['norm', 
    							'terapi',
                                'tglterapi',
                                'cek']; //field tabel
}
