<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applog extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table        = 'applog'; // nama tabel 
    protected $primaryKey   = 'aid'; // primary key tabel 
    protected $fillable     = ['aname', 
    							'aver', 
                                'adate',
                                'alog',
                                'aupdate',
    							'h']; //field tabel
}
