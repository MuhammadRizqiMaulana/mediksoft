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

class Transfer_RiController extends Controller
{
    public function index(){
        $datas = Rawatjalan::all();
           
        return view('RawatJalan.Content.Pendaftaran_Rawat_Inap',compact('datas'));
    }
}