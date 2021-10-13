<?php

namespace App\Http\Controllers\RawatInap;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Pasien;
use App\Models\Dokter;
use App\Models\Lokasi;
use App\Models\Kamar;
use App\Models\Rawatjalan;
use App\Models\Rawatinap;

use Carbon\Carbon;

class Ubah_KamarController extends Controller
{
    public function index(){
          
        return view('RawatInap.Content.Ubah_Kamar');
    }

}