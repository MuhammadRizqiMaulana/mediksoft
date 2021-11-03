<?php

namespace App\Http\Controllers\RawatInap;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pasien;
use App\Models\Kamar;

class PindahKamarController extends Controller
{
    public function index()
    {
        $kamar = Kamar::all();
        $pasien = Pasien::all();
        return view('RawatInap.Content.PindahKamar', compact('pasien', 'kamar'));
    }
}