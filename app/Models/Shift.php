<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table        = 'shift'; // nama tabel 
    protected $primaryKey   = 'idshift'; // primary key tabel 
    protected $fillable     = ['namashift', 
    							'jammasuk',
                                'jampulang',
                                'gantihari']; //field tabel
}
