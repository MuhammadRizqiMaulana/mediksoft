<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kasharian_detail extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table        = 'kasharian_detail'; // nama tabel 
    protected $primaryKey   = 'idtransaksibebas '; // primary key tabel 
    protected $fillable     = ['nourut', 
    							'namadetail',
                                'qty',
                                'harga']; //field tabel
}
