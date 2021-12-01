<?php

namespace App\Http\Controllers\Billing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Bayar_rjalan;

class Data_PembayaranRJController extends Controller
{
    public function index(){
    	
      $datas = Bayar_rjalan::all();
      /* $datas = DB::table('bayar_rjalan')
                    ->join('pasien', 'pasien.norm', '=', 'bayar_rjalan.norm')
                    ->join('rawatjalan', 'rawatjalan.norm', '=', 'bayar_rjalan.norm')
                    ->where('rawatjalan.statustransaksi', '=', 'bayar')
                    ->select('bayar_rjalan.*','pasien.*','rawatjalan.*')
                    ->distinct()
                    ->get();  */      
    	return view('Billing.Content.Data_PembayaranRJ',compact('datas'));
	}
}
