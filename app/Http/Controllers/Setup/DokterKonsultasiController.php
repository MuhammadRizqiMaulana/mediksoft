<?php

namespace App\Http\Controllers\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Kelas;
use App\Models\Dokter;
use App\Models\Eklaimbpjs;
use App\Models\Tarif_dokter_konsultasi;

class DokterKonsultasiController extends Controller
{
    public function index(){
    	
        $dokter = Dokter::all();
        $kelas = Kelas::all();
        $eklaimbpjs = Eklaimbpjs::all();
        $datas = Tarif_dokter_konsultasi::all();
    	return view('Setup.Content.DokterKonsultasi',compact('dokter','kelas','eklaimbpjs','datas'));
    }
    public function tambah() {

        $datas = Dokter::all();         

        return view('Setup.Content.DokterKonsultasi',compact('datas'));
        
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
            'iddokter' => 'required|max:30',
            'kodekelas' => 'required|',
            'tarif' => 'required|numeric|between:0.0000,99999999.9999|min:0',
            'untukrs' => 'required|numeric|between:0.0000,99999999.9999|min:0',
            'untukdokter' => 'required|numeric|between:0.0000,99999999.9999|min:0',
            'idklaim' => 'required|max:30',
            
    	], $messages);

        $now = Carbon::now();

        $data = new Tarif_dokter_konsultasi();
        $data->iddokter = $request->iddokter;
        $data->kodekelas = $request->kodekelas;
        $data->tarif = $request->tarif;
        $data->untukrs = $request->untukrs;
        $data->untukdokter = $request->tarif;
        $data->idklaim = $request->idklaim;

        
        
    	$data->save();

    	return redirect('/DokterKonsultasi')->with('alert-success','Data berhasil ditambahkan!');
    }
    public function ubah($iddokter) {
        $dokter = Dokter::all();
        $ubah = Tarif_dokter_konsultasi::find($iddokter);
        $kelas = Kelas::all();
        $eklaimbpjs = Eklaimbpjs::all();
        $datas = Tarif_dokter_poli::all();

        return view('Setup.Content.DokterPoli',compact('dokter','ubah','kelas','eklaimbpjs','datas'));

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
    		'iddokter' => 'required|max:30',
            'kodekelas' => 'required|',
            'tarif' => 'required|numeric|between:0.0000,99999999.9999|min:0',
            'untukrs' => 'required|numeric|between:0.0000,99999999.9999|min:0',
            'untukdokter' => 'required|numeric|between:0.0000,99999999.9999|min:0',
            'idklaim' => 'required|max:30',
    	], $messages);

        $now = Carbon::now();
		$data = new Tarif_dokter_konsultasi();
        $data->iddokter = $request->iddokter;
        $data->kodekelas = $request->kodekelas;
        $data->tarif = $request->tarif;
        $data->untukrs = $request->untukrs;
        $data->untukdokter = $request->tarif;
        $data->idklaim = $request->idklaim;

    	$data->save();

        return redirect('/DokterKonsultasi')->with('alert-success','Data berhasil diubah!');
    }
     public function hapus($iddokter) {
    	$datas = Tarif_dokter_konsultasi::find($iddokter);
    	$datas->delete();
        return redirect('/DokterKonsultasi')->with('alert-success','Data berhasil dihapus!');
    }

}
