<?php

namespace App\Http\Controllers\Operasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DokterBedahController extends Controller
{
    public function index()
    {
        return view('Operasi.Content.DokterBedah');
    }
}