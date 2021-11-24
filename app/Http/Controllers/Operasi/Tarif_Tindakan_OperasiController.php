<?php

namespace App\Http\Controllers\Operasi;

use App\Http\Controllers\Controller;
use App\Models\Tarif_tindakan_operasi;
use App\Models\Op_golongan;
use App\Models\Eklaimbpjs;
use Illuminate\Http\Request;

class Tarif_Tindakan_OperasiController extends Controller
{
    public function index()
    {

        $datas = Tarif_tindakan_operasi::all();
        $op_golongan = Op_golongan::all();
        $eklaimbpjs = Eklaimbpjs::all();
        return view('Operasi.Content.Tarif_Tindakan_Operasi', compact('op_golongan', 'eklaimbpjs', 'datas'));
    }
}