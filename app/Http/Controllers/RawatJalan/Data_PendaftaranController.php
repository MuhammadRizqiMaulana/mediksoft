<?php

namespace App\Http\Controllers\RawatJalan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Karyawan;


class Data_PendaftaranController extends Controller
{
    public function index(){

        $datas = Karyawan::all();
   	
    	return view('RawatJalan.Content.Data_Pendaftaran',compact('datas'));
    }
}
