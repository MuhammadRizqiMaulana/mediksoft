<?php

namespace App\Http\Controllers\RawatJalan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Pasien;
use App\Models\Poliklinik;
use App\Models\Dokter;
use App\Models\Perusahaan;
use App\Models\Faskes;
use App\Models\Lokasi;
use App\Models\Rawatjalan;

use Carbon\Carbon;

class Pelayanan_PoliController extends Controller
{
    public function index(){
        $datas = Rawatjalan::all();
           
        return view('RawatJalan.Content.Pelayanan_Rawat_Jalan',compact('datas'));
    }
}