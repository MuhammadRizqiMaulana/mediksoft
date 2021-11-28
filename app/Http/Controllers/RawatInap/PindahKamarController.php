<?php

namespace App\Http\Controllers\RawatInap;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pasien;
use App\Models\Kamar;
use App\Models\Rawatinap;

class PindahKamarController extends Controller
{
    public function index()
    {
        $kamar = Kamar::all();
        $pasien = Pasien::all();
        $rawatinap = Rawatinap::all();
        return view('RawatInap.Content.PindahKamar', compact('pasien', 'kamar', 'rawatinap'));
    }

    public function selectfakturri($faktur_rawatinap)
    {
        $kamar = Kamar::all();
        $pasien = Pasien::all();
        $rawatinap = Rawatinap::all();
        $selectrawatinap = Rawatinap::find($faktur_rawatinap);
        $selectkamar = Kamar::find($selectrawatinap->kodekamar);
        return view('RawatInap.Content.PindahKamar', compact('pasien', 'kamar', 'rawatinap', 'selectrawatinap', 'selectkamar'));
    }
}