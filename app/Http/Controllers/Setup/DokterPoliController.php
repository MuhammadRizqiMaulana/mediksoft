<?php

namespace App\Http\Controllers\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Poliklinik;
use App\Models\Dokter;
use App\Models\Eklaimbpjs;


use Carbon\Carbon;


class DokterPoliController extends Controller
{
    public function index(){
    	
        $datas = Dokter::all();
        $kode = Poliklinik::all();
    	return view('Setup.Content.DokterPoli',compact('datas','kode'));
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
    		'kode' => 'required|max:20',
            'iddokter' => 'required|max:30',
            'tarif' => '',
            'untukrs' => 'numeric|max:40',
            'untukdok' => 'numeric|max:40',
            'idklaim' => 'required|max:30',


            
    	], $messages);

        $now = Carbon::now();

        $data = new DokterPoli();
        $data->kode = $request->kode;
        $data->iddokter = $request->iddokter;
        $data->tarif = $request->tarif;
        $data->untukrs = $request->untukrs;
        $data->untukdok = $request->tarif;
        $data->idklaim = $request->idklaim;
        
        
    	$data->save();

    	return redirect('/DokterPoli')->with('alert-success','Data berhasil ditambahkan!');
    }

   	public function ubah($iddokter ) {
        $datas = Dokter::all();
        $ubah = Dokter::find($idkaryawan);
        $kode = Poliklinik::all();

        return view('Setup.Content.DokterPoli',compact('datas','ubah','kode'));

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
    		'kode' => 'required|max:20',
            'iddokter' => 'required|max:30',
            'tarif' => '',
            'untukrs' => 'numeric|max:40',
            'untukdok' => 'numeric|max:40',
            'idklaim' => 'required|max:30',

    	], $messages);

        $now = Carbon::now();

        $data = Poliklinik::find($kode);
         $data->kode = $request->kode;
        $data->iddokter = $request->iddokter;
        $data->tarif = $request->tarif;
        $data->untukrs = $request->untukrs;
        $data->untukdok = $request->tarif;
        $data->idklaim = $request->idklaim;
    	$data->save();

        return redirect('/DokterPoli')->with('alert-success','Data berhasil diubah!');
    }

    public function hapus($iddokter) {
    	$datas = Poliklinik::find($kode);
    	$datas->delete();
        return redirect('/DokterPoli')->with('alert-success','Data berhasil dihapus!');
    }
}
