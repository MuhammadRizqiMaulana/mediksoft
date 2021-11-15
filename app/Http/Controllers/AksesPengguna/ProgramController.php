<?php

namespace App\Http\Controllers\AksesPengguna;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index()
    {
        return view('AksesPengguna.Content.Program');
    }
}