<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rawatinap_rute extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table        = 'rawatinap_rute'; // nama tabel 
    protected $primaryKey   = 'rute'; // primary key tabel 
    protected $fillable     = []; //field tabel
}