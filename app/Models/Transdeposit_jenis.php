<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transdeposit_jenis extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table        = 'transdeposit_jenis'; // nama tabel 
    protected $primaryKey   = 'idjenistransaksi'; // primary key tabel 
    protected $fillable     = ['namatransaksi', 
    							'masuk']; //field tabel
}
