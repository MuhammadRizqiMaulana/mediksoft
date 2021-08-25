<?php

namespace App\Http\Controllers\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Poliklinik;
use App\Models\Dokter;
use App\Models\Eklaimbpjs;
use App\Models\Tarif_dokter_poli;



use Carbon\Carbon;
 

class DokterPoliController extends Controller
{
    public function index(){
    	
        $dokter = Dokter::all();
        $poliklinik = Poliklinik::all();
        $eklaimbpjs = Eklaimbpjs::all();
        $datas = Tarif_dokter_poli::all();
    	return view('Setup.Content.DokterPoli',compact('dokter','poliklinik','eklaimbpjs','datas'));
    }

    public function tambah() {

        $datas = Dokter::all();         

        return view('Setup.Content.DokterPoli',compact('datas'));
        
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
    		'kodepoli' => 'required|max:6|unique:tarif_dokter_poli',
            'iddokter' => 'required|max:30',
            'tarif' => 'required|numeric|between:0.0000,99999999.9999|min:0',
            'untukrs' => 'required|numeric|between:0.0000,99999999.9999|min:0',
            'untukdokter' => 'required|numeric|between:0.0000,99999999.9999|min:0',
            'idklaim' => 'required|max:30',
            
    	], $messages);

        $now = Carbon::now();

        $data = new Tarif_dokter_poli();
        $data->kodepoli = $request->kodepoli;
        $data->iddokter = $request->iddokter;
        $data->tarif = $request->tarif;
        $data->untukrs = $request->untukrs;
        $data->untukdokter = $request->tarif;
        $data->idklaim = $request->idklaim;
        $data->pemakaitarif = 0;
        
        
    	$data->save();

    	return redirect('/DokterPoli')->with('alert-success','Data berhasil ditambahkan!');
    }

   	public function ubah($kodepoli) {
        $dokter = Dokter::all();
        $ubah = Tarif_dokter_poli::find($kodepoli);
        $poliklinik = Poliklinik::all();
        $eklaimbpjs = Eklaimbpjs::all();
        $datas = Tarif_dokter_poli::all();

        return view('Setup.Content.DokterPoli',compact('dokter','ubah','poliklinik','eklaimbpjs','datas'));

    }

    public function update($kodepoli, Request $request) {
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
    		'kodepoli' => 'required|max:20|unique:tarif_dokter_poli',
            'iddokter' => 'required|max:30',
            'tarif' => 'required|numeric|between:0.0000,99999999.9999|min:0',
            'untukrs' => 'required|numeric|between:0.0000,99999999.9999|min:0',
            'untukdokter' => 'required|numeric|between:0.0000,99999999.9999|min:0',
            'idklaim' => 'required|max:30',
    	], $messages);

        $now = Carbon::now();

        $data = Tarif_dokter_poli::find($kodepoli);
        $data->kodepoli = $request->kodepoli;
        $data->iddokter = $request->iddokter;
        $data->tarif = $request->tarif;
        $data->untukrs = $request->untukrs;
        $data->untukdokter = $request->tarif;
        $data->idklaim = $request->idklaim;
        $data->pemakaitarif = 0;
    	$data->save();

        return redirect('/DokterPoli')->with('alert-success','Data berhasil diubah!');
    }

    public function hapus($kodepoli) {
    	$datas = Tarif_dokter_poli::find($kodepoli);
    	$datas->delete();
        return redirect('/DokterPoli')->with('alert-success','Data berhasil dihapus!');
    }
}
