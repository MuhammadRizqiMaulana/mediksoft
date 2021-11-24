<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_level extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table        = 'user_level'; // nama tabel 
    protected $primaryKey   = 'idlevel'; // primary key tabel 
    protected $fillable     = ['namalevel']; //field tabel
}