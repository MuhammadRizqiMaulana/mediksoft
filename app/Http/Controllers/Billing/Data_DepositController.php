<?php

namespace App\Http\Controllers\Billing;
use carbon\Carbon;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bayar_rjalan;
use App\Models\Transdeposit;
use App\Models\Transdeposit_jenis;
use App\Models\Pasien;
use App\Models\Bank;
use App\Models\Karyawan;


class Data_DepositController extends Controller
{
   public function index(){
      $datas = Transdeposit::all(); 

      $datasaldodepositpasien = Transdeposit::select("norm", \DB::raw("SUM(masuk) as masuk"), \DB::raw("SUM(keluar) as keluar"))
                    ->groupBy("norm")
                    ->get();
       
    	return view('Billing.Content.Data_Deposit',compact('datas','datasaldodepositpasien'));
	}

   public function lihatdetail($notrans){
      $lihatdetail = Transdeposit::find($notrans);  
      $now = Carbon::now();
      $transdeposit_jenis = Transdeposit_jenis::all();
      $karyawan = Karyawan::all();
      $bank = Bank::all();
      $pasien = Pasien::all();
      $selectpasien = Pasien::find($lihatdetail->norm);

      $saldomasuk = Transdeposit::where('norm',$lihatdetail->norm)->sum('masuk');
      $saldokeluar = Transdeposit::where('norm',$lihatdetail->norm)->sum('keluar');

      $saldoterakhir = $saldomasuk - $saldokeluar;

      return view('Billing.Content.Deposit',compact('now','transdeposit_jenis','karyawan','bank','pasien','selectpasien','saldoterakhir','lihatdetail'));
   }

   public function tambah(){ 
      $now = Carbon::now();
      $transdeposit_jenis = Transdeposit_jenis::all();
      $karyawan = Karyawan::all();
      $bank = Bank::all();
      $pasien = Pasien::all();
      return view('Billing.Content.Deposit',compact('now','transdeposit_jenis','karyawan','bank','pasien'));
   }

   public function selecttambah($norm){ 
      $now = Carbon::now();
      $transdeposit_jenis = Transdeposit_jenis::all();
      $karyawan = Karyawan::all();
      $bank = Bank::all();
      $pasien = Pasien::all();
      $selectpasien = Pasien::find($norm);

      $saldomasuk = Transdeposit::where('norm',$norm)->sum('masuk');
      $saldokeluar = Transdeposit::where('norm',$norm)->sum('keluar');

      $saldoterakhir = $saldomasuk - $saldokeluar;
       
      return view('Billing.Content.Deposit',compact('now','transdeposit_jenis','karyawan','bank','pasien','selectpasien','saldoterakhir'));
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
          'norm' => 'required|max:10',
          'idjenistransaksi' => 'required|max:11',
          'noref' => 'nullable|max:20',
          'keterangan' => 'nullable|max:50',
          'metodebayar' => 'required',
          'idbank' => 'nullable|max:11',
          'iduserkasir' => 'nullable|max:11',
          'nominal' => 'required|numeric|between:0.0000,99999999.9999',

     ], $messages);

      try{

         $now = Carbon::now();
         $jenistransaksi = Transdeposit_jenis::find($request->idjenistransaksi);

         

         if ($jenistransaksi->masuk == 0) {
            $saldomasuk = Transdeposit::where('norm',$request->norm)->sum('masuk');
            $saldokeluar = Transdeposit::where('norm',$request->norm)->sum('keluar');

            $saldoterakhir = $saldomasuk - $saldokeluar;

            if ($request->nominal <= $saldoterakhir) {

               $data = new Transdeposit();
               $data->norm = $request->norm;
               $data->tanggal = $now;
               $data->idjenistransaksi = $request->idjenistransaksi;

               $data->keluar = $request->nominal;
               $data->masuk = 0;

               $data->noref = $request->noref;
               $data->keterangan = $request->keterangan;
               $data->metodebayar = $request->metodebayar;
               $data->idbank = $request->idbank;
               $data->iduserkasir = $request->iduserkasir;
               $data->save();
               return redirect('/Data_Deposit')->with('alert-success','Data berhasil ditambahkan!');
            }else{
               return redirect('/Deposit/selecttambah'.$request->norm)->with('alert-danger','Data gagal diproses! Saldo kurang');
            }

         }elseif ($jenistransaksi->masuk == 1) {
            $data = new Transdeposit();
            $data->norm = $request->norm;
            $data->tanggal = $now;
            $data->idjenistransaksi = $request->idjenistransaksi;

            $data->masuk = $request->nominal;
            $data->keluar = 0;

            $data->noref = $request->noref;
            $data->keterangan = $request->keterangan;
            $data->metodebayar = $request->metodebayar;

            $data->idbank = $request->idbank;
            $data->iduserkasir = $request->iduserkasir;
            $data->save();

            return redirect('/Data_Deposit')->with('alert-success','Data berhasil ditambahkan!');
         }
  
      }
       catch(\Exception $e){
          
          echo $e->getMessage();   // insert query
           // do task when error
          return redirect('/Deposit/selecttambah'.$request->norm)->with('alert-danger', $e);
          
      }
  }
}
