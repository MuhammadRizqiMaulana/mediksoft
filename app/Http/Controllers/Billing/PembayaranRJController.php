<?php

namespace App\Http\Controllers\Billing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bayar_rjalan;
use App\Models\Bank;
use App\Models\Karyawan;

class PembayaranRJController extends Controller
{
    public function index(){
    	
      $bayarrjalan = Bayar_rjalan::all();   
      $bank = Bank::all(); 
      $karyawan = Karyawan::all();       
    	return view('Billing.Content.PembayaranRJ',compact('bayarrjalan','karyawan','bank'));
	}
}
