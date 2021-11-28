<?php

namespace App\Http\Controllers\RawatInap;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Pemberian_Obat_Rawat_InapController extends Controller
{
    public function index()
    {
        return view('RawatInap.Content.Pemberian_Obat_Rawat_Inap');
    }
}