<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekamedis extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table        = 'Rekamedis'; // nama tabel 
    protected $primaryKey   = 'id_rekamedis'; // primary key tabel 
    protected $fillable     = ['norm', 
    							'tgl',
                                'anamnese',
                                'terapi',
                                'keterangan']; //field tabel
}
