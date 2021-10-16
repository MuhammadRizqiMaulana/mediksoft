<?php

namespace App\Http\Controllers\RawatInap;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PenggunaanObatRIController extends Controller
{
    public function index(){
    	
       
       
    	return view('RawatInap.Content.PenggunaanObatRI',);
    }
}
