<?php

namespace App\Http\Controllers\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ruang;


class RuangController extends Controller
{ 
    public function index(){
    	
        $datas = Ruang::all();
    	return view('Setup.Content.Ruang',compact('datas'));
    }
    public function tambah() {

        $datas = Ruang::all();         

        return view('Setup.Content.Ruang',compact('datas'));
        
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
    		'koderuang' => 'required|max:50',
            'namaruang' => 'required|max:50',

    	], $messages);
        $data = new Ruang();
        $data->koderuang = $request->koderuang;
        $data->namaruang = $request->namaruang;
        
    	$data->save();

    	return redirect('/Ruang')->with('alert-success','Data berhasil ditambahkan!');
    }
    public function ubah($koderuang) {
        $datas = Ruang::all();
        $ubah = Ruang::find($koderuang);
        return view('Setup.Content.Ruang',compact('datas','ubah'));

    }
    public function update($koderuang, Request $request) {

        $messages = [
            'required' => ':attribute masih kosong',
            'min' => ':attribute diisi minimal :min karakter',
            'max' => ':attribute diisi maksimal :max karakter',
            'unique' => ':attribute sudah ada',
            
        ];

    	$this->validate($request, [
    		
            'namaruang' => 'required|max:200',
            
    	], $messages);

        $data = Ruang::find($koderuang);
   
        $data->namaruang = $request->namaruang;
    	$data->save();
    	return redirect('/Ruang')->with('alert-success','Data berhasil diubah!');
    }
     public function hapus($koderuang) {
    	$datas = Ruang::find($koderuang);
    	$datas->delete();
        return redirect('/Ruang')->with('alert-success','Data berhasil dihapus!');
    }

}
