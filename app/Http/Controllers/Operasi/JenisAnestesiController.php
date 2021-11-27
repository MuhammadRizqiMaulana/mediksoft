<?php

namespace App\Http\Controllers\Operasi;

use App\Http\Controllers\Controller;
use App\Models\Op_jenisanestesi;
use Illuminate\Http\Request;

class JenisAnestesiController extends Controller
{
    public function index()
    {
        $datas = Op_jenisanestesi::all();
        return view('Operasi.Content.JenisAnestesi', compact('datas'));
    }
}