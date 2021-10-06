<?php

namespace App\Http\Controllers\RawatInap;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models;

class CariPasienController extends Controller
{
    public function index()
    {
        return view('RawatInap.Content.CariPasien');
    }
}