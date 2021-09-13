<?php

namespace App\Http\Controllers\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Kelas;
use App\Models\Kategoritransaksi;
use App\Models\Eklaimbpjs;
use App\Models\Icd9;
use App\Models\Tarif_tindakan_inap;

class TindakanInapController extends Controller
{
    public function index(){
    	
        $kategori = Kategoritransaksi::all();
        $kelas = Kelas::all();
        $icd9 = Icd9::all();
        $eklaimbpjs = Eklaimbpjs::all();
        $datas = Tarif_tindakan_inap::all();
    	return view('Setup.Content.TindakanInap',compact('kategori','kelas','icd9','eklaimbpjs','datas'));
    }
    public function tambah() {

        $datas = Tarif_tindakan_inap::all();         

        return view('Setup.Content.TindakanInap',compact('datas'));
        
    }
     public function store( Request $request) {

        $messages = [
            'required' => ':attribute masih kosong',
            'min' => ':attribute diisi minimal :min karakter',
            'max' => ':attribute diisi maksimal :max karakter',
            'numeric' => ':attribute harus berupa angka',
            'unique' => ':attribute sudah ada',
            'email' => ':attribute harus berupa email',
            'image' => ':attribute harus berupa gambar'
        ];

    	$this->validate($request, [
            'idtindakan' => 'required|max:30',
            'kodekategori' => 'required|',
            'namatindakan' => 'required|',
            'idklaim' => 'required|max:30',
            
    	], $messages);

        $now = Carbon::now();

        $data = new Tarif_tindakan_inap();
        $data->idtindakan = $request->idtindakan;
        $data->kodekategori = $request->kodekategori;
        $data->namatindakan = $request->namatindakan;
        $data->idklaim = $request->idklaim;

        
        
    	$data->save();

    	return redirect('/TindakanInap')->with('alert-success','Data berhasil ditambahkan!');
    }
    public function ubah($idtindakan) {
        $kategori = Kategoritransaksi::all();
        $ubah = Tarif_tindakan_inap::find($iddokter);
        $kelas = Kelas::all();
        $icd9 = Icd9::all();
        $eklaimbpjs = Eklaimbpjs::all();
        $datas = Tarif_tindakan_inap::all();

        return view('Setup.Content.TindakanInap',compact('kategori','ubah','kelas','icd9','eklaimbpjs','datas'));

    }
     public function update($iddokter, Request $request) {
        $messages = [
            'required' => ':attribute masih kosong',
            'min' => ':attribute diisi minimal :min karakter',
            'max' => ':attribute diisi maksimal :max karakter',
            'numeric' => ':attribute harus berupa angka',
            'unique' => ':attribute sudah ada',
            'email' => ':attribute harus berupa email',
            'image' => ':attribute harus berupa gambar'
        ];

    	$this->validate($request, [
    		'idtindakan' => 'required|max:30',
            'kodekategori' => 'required|',
            'namatindakan' => 'required|',
            'idklaim' => 'required|max:30',
    	], $messages);

        $now = Carbon::now();
		 $data = new Tarif_tindakan_inap();
        $data->idtindakan = $request->idtindakan;
        $data->kodekategori = $request->kodekategori;
        $data->namatindakan = $request->namatindakan;
        $data->idklaim = $request->idklaim;


    	$data->save();

        return redirect('/TindakanInap')->with('alert-success','Data berhasil diubah!');
    }
     public function hapus($idtindakan) {
    	$datas = Tarif_tindakan_inap::find($idtindakan);
    	$datas->delete();
        return redirect('/DokterKonsultasi')->with('alert-success','Data berhasil dihapus!');
    }

}
