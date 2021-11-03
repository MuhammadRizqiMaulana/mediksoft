<?php

namespace App\Http\Controllers\RawatInap;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models;
use App\Models\Pasien;
use App\Models\Rawatinap;


class CariPasienController extends Controller
{
    public function index()
    {
        $rawatinap = RawatInap::all();
        $pasien = Pasien::all();
        return view('RawatInap.Content.CariPasien', compact('pasien', 'rawatinap'));
    }
}