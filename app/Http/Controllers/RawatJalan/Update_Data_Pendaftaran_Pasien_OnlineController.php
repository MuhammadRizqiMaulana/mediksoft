<?php

namespace App\Http\Controllers\RawatJalan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Pasien;
use App\Models\Rawatjalan;

use Carbon\Carbon;

class Update_Data_Pendaftaran_Pasien_OnlineController extends Controller
{
    public function index(){
        $datas = Rawatjalan::select('norm')->distinct()->get();
           
        return view('RawatJalan.Content.Update_Data_Pendaftaran_Pasien_Online', compact('datas'));
    }

}