<?php

namespace App\Http\Controllers\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Pengirim_FaskesController extends Controller
{
    public function index(){
    	

    	return view('Setup.Content.Pengirim_Faskes'); 
    }
}
