<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settingakun extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table        = 'settingakun'; // nama tabel 
    protected $primaryKey   = 'fidsetting'; // primary key tabel 
    protected $fillable     = ['nama', 
    							'kodeakun']; //field tabel
}
