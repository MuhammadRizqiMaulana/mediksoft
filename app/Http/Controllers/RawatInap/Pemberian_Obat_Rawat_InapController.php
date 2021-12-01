<?php

namespace App\Http\Controllers\RawatInap;

use App\Http\Controllers\Controller;
use App\Models\Rawatinap;
use Illuminate\Http\Request;

class Pemberian_Obat_Rawat_InapController extends Controller
{
    public function index()
    {
        $datas = RawatInap::all();
        return view('RawatInap.Content.Pemberian_Obat_Rawat_Inap', compact('datas'));
    }
}