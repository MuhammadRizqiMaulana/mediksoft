<?php

namespace App\Http\Controllers\Billing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bayar_rjalan;
use App\Models\Transdeposit;
use App\Models\Transdeposit_jenis;
use App\Models\Pasien;
use App\Models\Bank;


class Data_DepositController extends Controller
{
   public function index(){
      $datas = Transdeposit::all(); 
      $datasaldodepositpasien = Transdeposit::select('norm')->distinct()->get(); 

      $datasaldodepositpasien = Transdeposit::select("norm", \DB::raw("SUM(masuk) as masuk"), \DB::raw("SUM(keluar) as keluar"))
                    ->groupBy("norm")
                    ->get();
       
    	return view('Billing.Content.Data_Deposit',compact('datas','datasaldodepositpasien'));
	}

   public function lihatdetail(){
      $datas = Bayar_rjalan::all();       
      return view('Billing.Content.PembayaranRJ',compact('datas'));
  }

  public function lihatsaldo(){
}
}
