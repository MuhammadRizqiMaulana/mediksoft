<?php

namespace App\Http\Controllers\RekamMedis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Keanggotaan;

class KeanggotaanController extends Controller
{
    public function index(){
    	
        $datas = Keanggotaan::all();
    	return view('RekamMedis.Content.Keanggotaan',compact('datas'));
    }
    public function tambah() {

        $datas = Keanggotaan::all();         

        return view('RekamMedis.Content.Keanggotaan',compact('datas'));
        
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
    		
            'keanggotaan' => 'nullable',
            'zona1' => 'nullable',
            'zona1mulai' => 'nullable',
            'zona1akhir' => 'nullable',
            'zona2' => 'nullable',
            'zona2mulai' => 'nullable',
            'zona2akhir' => 'nullable',
            'zona3' => 'nullable',
            'zona3mulai' => 'nullable',
            'zona3akhir' => 'nullable',
    	], $messages);

        $data = new Keanggotaan();
        $data->keanggotaan = $request->keanggotaan;
        $data->zona1 = $request->zona1;
        $data->zona1mulai = $request->zona1mulai;
        $data->zona1akhir = $request->zona1akhir;
        $data->zona2 = $request->zona1;
        $data->zona2mulai = $request->zona2mulai;
        $data->zona2akhir = $request->zona2akhir;
        $data->zona3 = $request->zona1;
        $data->zona3mulai = $request->zona3mulai;
        $data->zona3akhir = $request->zona3akhir;
    	$data->save();

    	return redirect('/Keanggotaan')->with('alert-success','Data berhasil ditambahkan!');
    }
    public function ubah($idkeanggotaan) {
        $datas = Keanggotaan::all();
        $ubah = Keanggotaan::find($idkeanggotaan);
        return view('RekamMedis.Content.Keanggotaan',compact('datas','ubah'));

    }
    public function update($idkeanggotaan, Request $request) {

        $messages = [
            'required' => ':attribute masih kosong',
            'min' => ':attribute diisi minimal :min karakter',
            'max' => ':attribute diisi maksimal :max karakter',
            'unique' => ':attribute sudah ada',
            
        ];

    	$this->validate($request, [
    		
          
            'keanggotaan' => 'nullable',
            'zona1' => 'nullable',
            'zona1mulai' => 'nullable',
            'zona1akhir' => 'nullable',
            'zona2' => 'nullable',
            'zona2mulai' => 'nullable',
            'zona2akhir' => 'nullable',
            'zona3' => 'nullable',
            'zona3mulai' => 'nullable',
            'zona3akhir' => 'nullable',
    	], $messages);

        $data = Keanggotaan::find($idkeanggotaan);
   
        
        $data->keanggotaan = $request->keanggotaan;
        $data->zona1 = $request->zona1;
        $data->zona1mulai = $request->zona1mulai;
        $data->zona1akhir = $request->zona1akhir;
        $data->zona2 = $request->zona1;
        $data->zona2mulai = $request->zona2mulai;
        $data->zona2akhir = $request->zona2akhir;
        $data->zona3 = $request->zona1;
        $data->zona3mulai = $request->zona3mulai;
        $data->zona3akhir = $request->zona3akhir;
    	$data->save();
    	return redirect('/Keanggotaan')->with('alert-success','Data berhasil diubah!');
    }
     public function hapus($idkeanggotaan) {
    	
       
        try {
            $datas = Keanggotaan::find($idkeanggotaan);
            $datas->delete();
            return redirect('/Keanggotaan')->with('alert-success', 'Data berhasil dihapus!');
        } catch (\Throwable $th) {
            return redirect('/Keanggotaan')->withErrors('Data gagal Dihapus');
        } 
    }
}
