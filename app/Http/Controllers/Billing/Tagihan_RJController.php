<?php

namespace App\Http\Controllers\Billing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use carbon\Carbon;

use App\Models\Pasien;
use App\Models\Statuspulang;
use App\Models\Karyawan;
use App\Models\Bank;
use App\Models\Faskes;
use App\Models\Lokasi;
use App\Models\Rawatjalan;
use App\Models\Rawatjalan_transaksi;
use App\Models\Bayar_rjalan;
use App\Models\Bayar_rjalan_faktur;

class Tagihan_RJController extends Controller
{
    public function index()
    {
        $pasien = DB::table('pasien')
                    ->join('rawatjalan', 'pasien.norm', '=', 'rawatjalan.norm')
                    ->where('rawatjalan.statustransaksi', '=', 'proses')
                    ->select('pasien.*')
                    ->distinct()
                    ->get();

        $now = Carbon::now();
        $statuspulang = Statuspulang::all();
        $karyawan = Karyawan::all();

        return view('Billing.Content.Tagihan_RJ',compact('now','statuspulang','karyawan','pasien'));
    }

    public function selectnorm($norm) { //select berdasarkan norm
        $pasien = DB::table('pasien')
                    ->join('rawatjalan', 'rawatjalan.norm', '=', 'pasien.norm')
                    ->where('rawatjalan.statustransaksi', '=', 'proses')
                    ->select('pasien.*')
                    ->distinct()
                    ->get();

        $now = Carbon::now();
        $statuspulang = Statuspulang::all();
        $karyawan = Karyawan::all();
        
        $rawatjalansatu = Rawatjalan::where('norm', $norm)->first();
        $rawatjalanbanyak = Rawatjalan::where('norm', $norm)->get();

        /*$rawatjalantransaksi = DB::table('rawatjalan_transaksi')
                    ->join('rawatjalan', 'rawatjalan.faktur_rawatjalan', '=', 'rawatjalan_transaksi.faktur_rawatjalan')
                    ->where('rawatjalan.norm', '=', $norm)
                    ->select('rawatjalan_transaksi.*')
                    ->get();*/

        //$bayar_rjalan = Bayar_rjalan::where('norm', $norm)->first();
        //$datas = Rawatjalan::find($faktur_rawatjalan);
        //$totalharga = Rawatjalan_transaksi::where('faktur_rawatjalan',$faktur_rawatjalan)->sum('tarif');
           
        return view('Billing.Content.Tagihan_RJ',compact('now','statuspulang','karyawan','pasien','rawatjalansatu','rawatjalanbanyak'));
    }

    public function selectfakturrj($faktur_rawatjalan) { //select berdasarkan faktur
        $pasien = DB::table('pasien')
                    ->join('rawatjalan', 'rawatjalan.norm', '=', 'pasien.norm')
                    ->where('rawatjalan.statustransaksi', '=', 'proses')
                    ->select('pasien.*')
                    ->distinct()
                    ->get();

        $now = Carbon::now();
        $statuspulang = Statuspulang::all();
        $karyawan = Karyawan::all();
        
        $rawatjalansatu = Rawatjalan::find($faktur_rawatjalan);
        $rawatjalanbanyak = Rawatjalan::where('norm', $rawatjalansatu->norm)->get();

        /*$rawatjalantransaksi = DB::table('rawatjalan_transaksi')
                    ->join('rawatjalan', 'rawatjalan.faktur_rawatjalan', '=', 'rawatjalan_transaksi.faktur_rawatjalan')
                    ->where('rawatjalan.norm', '=', $rawatjalansatu->norm)
                    ->select('rawatjalan_transaksi.*')
                    ->get();*/

        //$bayar_rjalan = Bayar_rjalan::where('norm', $norm)->first();
        //$datas = Rawatjalan::find($faktur_rawatjalan);
        //$totalharga = Rawatjalan_transaksi::where('faktur_rawatjalan',$faktur_rawatjalan)->sum('tarif');
           
        return view('Billing.Content.Tagihan_RJ',compact('now','statuspulang','karyawan','pasien','rawatjalansatu','rawatjalanbanyak'));
    }
}