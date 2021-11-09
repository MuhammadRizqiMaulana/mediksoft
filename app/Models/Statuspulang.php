<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statuspulang extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $keyType = 'string';
    protected $table        = 'statuspulang'; // nama tabel 
    protected $primaryKey   = 'kodepulang'; // primary key tabel 
    protected $fillable     = ['statuspulang']; //field tabel
}
