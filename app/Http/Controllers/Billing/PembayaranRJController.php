<?php

namespace App\Http\Controllers\Billing;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use carbon\Carbon;
use Illuminate\Http\Request;

use App\Models\Bayar_rjalan;
use App\Models\Bank;
use App\Models\Karyawan;
use App\Models\Transdeposit;
use App\Models\Rawatjalan;
use App\Models\Bayar_rjalan_faktur;

class PembayaranRJController extends Controller
{
    public function index(){
    	
      $bayarrjalan = Bayar_rjalan::all();   
      $bank = Bank::all(); 
      $karyawan = Karyawan::all();       
    	return view('Billing.Content.PembayaranRJ',compact('bayarrjalan','karyawan','bank'));
	  }

    public function selectbayarrjalan($nobayar_rjalan){
        
      $bayarrjalan = Bayar_rjalan::all();   
      $bank = Bank::all(); 
      $karyawan = Karyawan::all();  
      $selectbayarrjalan =  Bayar_rjalan::find($nobayar_rjalan); 

      $saldomasuk = Transdeposit::where('norm',$selectbayarrjalan->norm)->sum('masuk');
      $saldokeluar = Transdeposit::where('norm',$selectbayarrjalan->norm)->sum('keluar');

      $saldoterakhir = $saldomasuk - $saldokeluar;

      return view('Billing.Content.PembayaranRJ',compact('bayarrjalan','karyawan','bank','selectbayarrjalan','saldoterakhir'));
    }

    public function store(Request $request) {

      $messages = [
          'required' => ':attribute masih kosong',
          'min' => ':attribute diisi minimal :min karakter',
          'max' => ':attribute diisi maksimal :max karakter',
          'numeric' => ':attribute harus berupa angka',
          'unique' => ':attribute sudah ada',
          'email' => ':attribute harus berupa email',
          'image' => ':attribute harus berupa gambar',
          'between' => ':attribute diisi antara 0 sampai XXXXXXXX.XXXX digit',
      ];

    $this->validate($request, [
          'nobayar_rjalan' => 'required|max:20',
          'norm' => 'required|max:10',
          //'totaltagihan' => 'required|max:30',
          'pembulatan' => 'required|numeric',
          'jumlahbayar' => 'required|max:30',
          //'tanggal' => 'required',
          'metodebayar' => 'required|',
          'idbank' => 'nullable|max:11',
          'noreferensi' => 'nullable|max:30',
          'namapembayar' => 'required|max:30',
          'ambildarideposit' => 'required|numeric',
          'uangbayar' => 'required|numeric',
          'kembalian' => 'required|numeric',
          'iduserkasir' => 'required|max:11',

    ], $messages);

      try{
        //$nobayar_rjalan = $request->nobayar_rjalan;

        if (($request->uangbayar + $request->ambildarideposit) >= $request->jumlahbayar) {
          $now = Carbon::now();

          $data = Bayar_rjalan::find($request->nobayar_rjalan);
          $data->namapembayar = $request->namapembayar;
          $data->tanggalbayar = $now;
          $data->pembulatan = $request->pembulatan;
          $data->ambildeposit = $request->ambildarideposit;
          $data->bayar = $request->uangbayar;
          $data->metodebayar = $request->metodebayar;

          if ($request->noreferensi == "") {
            $data->noreferensi = $data->noreferensi;
          }else{
            $data->noreferensi = $request->noreferensi;
          }
          if ($request->idbank == "") {
            $data->idbank = $data->idbank;
          }else{
            $data->idbank = $request->idbank;
          }

          $data->iduserkasir = $request->iduserkasir;
          $data->save();

          $faktur_rawatjalan = Bayar_rjalan_faktur::where('nobayar_rjalan',$request->nobayar_rjalan);
          
          foreach($faktur_rawatjalan as $key => $item){
              $rawatjalansatu = Rawatjalan::find($item->faktur_rawatjalan);
              $rawatjalansatu->statustransaksi = 'lunas';
              $rawatjalansatu->save();
          }

          if ($request->ambildarideposit != 0) {
            $deposit = new Transdeposit();
            $deposit->norm = $request->norm;
            $deposit->tanggal = $now;
            $deposit->idjenistransaksi = 2;

            $deposit->keluar = $request->ambildarideposit;
            $deposit->masuk = 0;

            $deposit->keterangan = 'Pembayaran Rawat jalan ('.$request->nobayar_rjalan.')';

            if ($request->noreferensi == '') {
              $deposit->noref = $deposit->noref;
            }else{
              $deposit->noref = $request->noreferensi;
            }
            if ($request->idbank == '') {
              $deposit->idbank = $deposit->idbank;
            }else{
              $deposit->idbank = $request->idbank;
            }

            $deposit->metodebayar = $request->metodebayar;
            $deposit->iduserkasir = $request->iduserkasir;
            $deposit->save();
          }

          return redirect('/Data_PembayaranRJ')->with('alert-success','Data berhasil disimpan!');

        }else{

          return Redirect::back()->with('alert-danger', 'Uang bayar masih kurang!');
        }

      }
       catch(\Exception $e){
          
          echo $e->getMessage();   // insert query
           // do task when error
          return redirect('/PembayaranRJ/selectbayarrjalan'.$request->nobayar_rjalan)->with('alert-danger', $e);
          
      }
  }
}
