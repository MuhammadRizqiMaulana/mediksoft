<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table        = 'setting'; // nama tabel 
    protected $primaryKey   = 'nama'; // primary key tabel 
    protected $fillable     = ['nilai']; //field tabel
}
