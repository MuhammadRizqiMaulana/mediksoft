<?php

namespace App\Http\Controllers\Billing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bayar_rjalan;

class Data_PembayaranRJController extends Controller
{
    public function index(){
    	
       $datas = Bayar_rjalan::all();       
    	return view('Billing.Content.Data_PembayaranRJ',compact('datas'));
	}
}
