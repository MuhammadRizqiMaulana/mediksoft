<?php

namespace App\Http\Controllers\AksesPengguna;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User_level;

class LevelPenggunaController extends Controller
{
    public function index()
    {

        $datas = User_level::all();

        return view('AksesPengguna.Content.LevelPengguna', compact('datas'));
    }
}