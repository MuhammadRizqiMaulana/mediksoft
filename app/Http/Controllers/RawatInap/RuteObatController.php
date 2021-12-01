<?php

namespace App\Http\Controllers\RawatInap;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RuteObatController extends Controller
{
    public function index()
    {
        return view('RawatInap.Content.RuteObat',);
    }
}