<?php

namespace App\Http\Controllers\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bank;

class BankController extends Controller
{
    public function index(){
    	
        $datas = Bank::all();
    	return view('Setup.Content.Bank',compact('datas'));
    }
    public function tambah() {

        $datas = Bank::all();         

        return view('Setup.Content.Bank',compact('datas'));
        
    }
    public function store( Request $request) {

        $messages = [
            'required' => ':attribute masih kosong',
            'min' => ':attribute diisi minimal :min karakter',
            'max' => ':attribute diisi maksimal :max karakter',
            'numeric' => ':attribute harus berupa angka',
            'unique' => ':attribute sudah ada',
            
        ];

    	$this->validate($request, [
    		'idbank' => 'required|max:50',
            'namabank' => 'required|max:200',
            'alamat' => 'required|max:200',
            'telp' => 'required|max:200',
            'keterangan' => 'required|max:200',
            'tgledit' => 'required|max:200',
            'kodeakun' => 'required|max:200'
    	], $messages);

        $data = new Bank();
        $data->idbank = $request->idbank;
        $data->namabank = $request->namabank;
        $data->alamat = $request->alamat;
        $data->telp = $request->telp;
        $data->keterangan = $request->keterangan;
        $data->tgledit = $request->tgledit;
        $data->kodeakun = $request->kodeakun;
    	$data->save();

    	return redirect('/Bank')->with('alert-success','Data berhasil ditambahkan!');
    }
    public function ubah($kode) {
        $datas = Bank::all();
        $ubah = Bank::find($kode);
        return view('Setup.Content.Bank',compact('datas','ubah'));

    }
    public function update($kode, Request $request) {

        $messages = [
            'required' => ':attribute masih kosong',
            'min' => ':attribute diisi minimal :min karakter',
            'max' => ':attribute diisi maksimal :max karakter',
            'unique' => ':attribute sudah ada',
            
        ];

    	$this->validate($request, [
    		
            'idbank' => 'required|max:50',
            'namabank' => 'required|max:200',
            'alamat' => 'required|max:200',
            'telp' => 'required|max:200',
            'keterangan' => 'required|max:200',
            'tgledit' => 'required|max:200',
            'kodeakun' => 'required|max:200'
    	], $messages);

        $data = Bank::find($kode);
   
        $data->idbank = $request->idbank;
        $data->namabank = $request->namabank;
        $data->alamat = $request->alamat;
        $data->telp = $request->telp;
        $data->keterangan = $request->keterangan;
        $data->tgledit = $request->tgledit;
        $data->kodeakun = $request->kodeakun;
    	$data->save();
    	return redirect('/Bank')->with('alert-success','Data berhasil diubah!');
    }
     public function hapus($kode) {
    	$datas = Bank::find($kode);
    	$datas->delete();
        return redirect('/Bank')->with('alert-success','Data berhasil dihapus!');
    }
}
