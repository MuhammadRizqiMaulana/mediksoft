<?php

namespace App\Http\Controllers\Operasi;

use App\Http\Controllers\Controller;
use App\Models\Op_spesialisbedah;
use Illuminate\Http\Request;

class SpesialisBedahController extends Controller
{
    public function index()
    {
        $datas = Op_spesialisbedah::all();
        return view('Operasi.Content.SpesialisBedah', compact('datas'));
    }
}