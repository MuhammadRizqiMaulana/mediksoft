<?php

namespace App\Http\Controllers\RawatJalan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RawatJalan_RM_Rawat_JalanController extends Controller
{
    public function index()
    {
        return view('RawatJalan.Content.RawatJalan_RM_Rawat_Jalan');
    }
}