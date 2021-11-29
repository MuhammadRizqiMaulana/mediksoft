<?php

namespace App\Http\Controllers\RekamMedis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RM_RawatJalanController extends Controller
{
    public function index()
    {
        return view('RekamMedis.Content.RM_RawatJalan');
    }
}