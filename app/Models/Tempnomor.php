<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tempnomor extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table        = 'tempnomor'; // nama tabel 
    protected $primaryKey   = 'idnomor'; // primary key tabel 
    protected $fillable     = ['tabel', 
    							'noakhir',
                                'prefix']; //field tabel
}
