<?php

namespace App\Http\Controllers\Operasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Op_golongan;

class GolonganOperasiController extends Controller
{
    public function index()
    {

        $datas = Op_golongan::all();
        return view('Operasi.Content.GolonganOperasi', compact('datas'));
    }
}