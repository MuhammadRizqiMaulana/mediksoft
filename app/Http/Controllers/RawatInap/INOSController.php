<?php

namespace App\Http\Controllers\RawatInap;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class INOSController extends Controller
{
     public function index(){
    	
       
       
    	return view('RawatInap.Content.INOS',);
	}
}