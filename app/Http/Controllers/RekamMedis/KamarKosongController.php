<?php

namespace App\Http\Controllers\RekamMedis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\kamarkosong_temp;

class KamarKosongController extends Controller
{
    public function index(){
    	
       $datas = kamarkosong_temp::all();       
    	return view('RekamMedis.Content.KamarKosong',compact('datas'));
	}
}
