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

class Rekam_Medis_Rawat_JalanController extends Controller
{
    public function index($faktur_rawatjalan){
    	
        $pasien = Pasien::all();
        $poliklinik = Poliklinik::all();
        $dokter = Dokter::all();
        $perusahaan = Perusahaan::all();
        $faskes = Faskes::all();   
        $now = Carbon::now();
        $rawatjalan = Rawatjalan::find($faktur_rawatjalan);   

        return view('RawatJalan.Content.Rekam_Medis_Rawat_Jalan',compact('pasien','poliklinik','dokter','perusahaan','faskes','now','rawatjalan'));
    }
}
