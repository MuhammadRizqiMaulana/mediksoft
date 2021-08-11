<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rawatinap_indikasi extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table        = 'rawatinap_indikasi'; // nama tabel 
    protected $primaryKey   = 'faktur_rawatjalan'; // primary key tabel 
    protected $fillable     = [
        'indikasi'
    ]; //field tabel
}