<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rawatinap_anamnesa extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table        = 'rawatinap_anamnesa'; // nama tabel 
    protected $primaryKey   = 'faktur_rawatinap'; // primary key tabel 
    protected $fillable     = [
        'anamnesa'
    ]; //field tabel
}