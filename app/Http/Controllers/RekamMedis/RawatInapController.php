<?php

namespace App\Http\Controllers\RekamMedis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pasien;
use App\Models\Rawatinap;

class RawatInapController extends Controller
{
    public function index()
    {
        $datas = RawatInap::all();
        $rawatinap = RawatInap::all();
        $pasien = Pasien::all();
        return view('RekamMedis.Content.RM_RawatInap', compact('pasien', 'rawatinap', 'datas'));
    }
}