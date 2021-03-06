<?php

namespace App\Http\Controllers\RekamMedis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pasien;
use App\Models\Icd10;
use App\Models\Rawatinap;

class RawatInapController extends Controller
{
    public function index()
    {
        $datas = Rawatinap::all();
        $pasien = Pasien::all();
        $icd10 = Icd10::all();
        return view('RekamMedis.Content.RM_RawatInap', compact('pasien', 'datas', 'icd10'));
    }
    public function cetakdatarmrawatinap()
    {

        $datas = Rawatinap::all();
        $pasien = Pasien::all();
        return view('RekamMedis.Cetak.Cetak_RMRawatInap', compact('datas', 'pasien'));
    }
}