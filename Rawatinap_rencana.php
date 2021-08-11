<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rawatinap_rencana extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table        = 'rawatinap_rencana'; // nama tabel 
    protected $primaryKey   = ''; // primary key tabel 
    protected $fillable     = [
        'norm', 'faktur_rawatjalan', 'faktur_rawatinap', 'tindakan'
    ]; //field tabel
}