<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rawatjalan_tindakanasesmen extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table        = 'rawatjalan_tindakanasesmen'; // nama tabel 
    protected $primaryKey   = 'faktur_rawatjalan'; // primary key tabel 
    protected $fillable     = ['norm', 
    							'tindakan',
                                'cek']; //field tabel
}
