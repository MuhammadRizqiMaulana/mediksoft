<?php

namespace App\Http\Controllers\RekamMedis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Pasien;
use App\Models\Lokasi;



class PasienController extends Controller
{
    public function index(){
    	
        $datas = Pasien::all();
       
    	return view('RekamMedis.Content.Pasien',compact('datas',));
    }

    public function tambah() {

        $datas = Pasien::all();         

        return view('RekamMedis.Content.Pasien',compact('datas'));
        
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
    		'norm' => 'required|max:20',
            'namapasien' => 'nullable|max:50',
            'alamat' => 'nullable|max:40',
            'jeniskelamin' => 'nullable|max:30',
            'idkota' => 'nullable|max:100',
            'tptlahir' => 'nullable|max:50',
            'tgllahir' => 'nullable|max:50',
            'notelp' => 'nullable|max:30',
            'agama' => 'nullable|max:50',
            'goldarah' => 'nullable|max:50',
            'statuskawin' => 'nullable|max:50',
            'pekerjaan' => 'nullable|max:50',
            'namaayah' => 'nullable|max:50',
            'tglawal' => 'nullable|max:50',
            'tg;akhir' => 'nullable|max:50',
            'penanggungjawab' => 'nullable|max:50',
            'statuskeluarga' => 'nullable|max:50',
            'alergi' => 'nullable|max:50',
            'riwayatpenyakit' => 'nullable|max:50',
            'nonaktif' => 'nullable|',
            'iduser' => 'nullable|max:50',
            'namaibu' => 'nullable|max:50',
            'namapasangan' => 'nullable|max:50',
            'saldodeposit' => 'nullable',
            'kartu_bpjs' => 'required|max:50',
            'telepon' => 'nullable',
            'statusalergi' => 'required|max:50',
            'updateonline' => 'required|max:50',
            'keanggotaan1' => 'required|max:50',
            'keanggotaan2' => 'required|max:50',
            'keanggotaan3' => 'required|max:50',
            'tkeanggotaan1' => 'required|max:50',
            'tkeanggotaan2' => 'required|max:50',
            'tkeanggotaan3' => 'required|max:50',
            'diagnosa1' => 'required|max:50',
            'diagnosa2' => 'required|max:50',
            'diagnosa3' => 'required|max:50',


    	], $messages);

        $data = new pasien();
        $data->norm = $request->norm;
        $data->namapasien = $request->namapasien;
        $data->jeniskelamin = $request->jeniskelamin;
        $data->alamat = $request->alamat;
        $data->idkota = $request->idkota;
        $data->tptlahir = $request->tptlahir;
        $data->tgllahir = $request->tgllahir;
        $data->notelp = $request->notelp;
        $data->agama = $request->agama;
        $data->goldarah = $request->goldarah;
        $data->statuskawin = $request->statuskawin;
		$data->pekerjaan = $request->pekerjaan; 
		$data->namaayah = $request->namaayah;
		$data->tglawal = $request->tglawal;  
		$data->tglakhir = $request->tglakhir;   
		$data->penanggungjawab = $request->penanggungjawab; 
		$data->statuskeluarga = $request->statuskeluarga; 
		$data->alergi = $request->alergi;
		$data->riwayatpenyakit = $request->riwayatpenyakit;
		$data->nonaktif = $request->nonaktif;
		$data->iduser = $request->iduser;
		$data->namaibu = $request->namaibu;
		$data->namapasangan = $request->namapasangan;
		$data->saldodeposit = $request->saldodeposit;
		$data->kartu_bpjs = $request->kartu_bpjs;
		$data->telepon = $request->telepon;
		$data->statusalergi = $request->statusalergi;
		$data->updateonline = $request->updateonline;
		$data->keanggotaan1 = $request->keanggotaan1;
		$data->keanggotaan2 = $request->keanggotaan2;
		$data->keanggotaan3 = $request->keanggotaan3;
		$data->tkeanggotaan1 = $request->tkeanggotaan1;
		$data->tkeanggotaan2 = $request->tkeanggotaan2;
		$data->tkeanggotaan3 = $request->tkeanggotaan3;
		$data->diagnosa1 = $request->diagnosa1;
		$data->diagnosa2 = $request->diagnosa2;
		$data->diagnosa3 = $request->diagnosa3;
    	$data->save();

    	return redirect('/Pasien')->with('alert-success','Data berhasil ditambahkan!');
    }

   	public function ubah($norm ) {
        $datas = Pasien::all();
        $ubah = Pasien::find($norm);
        return view('RekamMedis.Content.Pasien',compact('datas','ubah'));

    }

    public function update($norm, Request $request) {
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
    		'norm' => 'required|max:20',
            'namapasien' => 'required|max:50',
            'alamat' => 'required|max:40',
            'jeniskelamin' => 'required|max:30',
            'idkota' => 'required|max:100',
            'tptlahir' => 'required|max:50',
            'tgllahir' => 'required|max:50',
            'notelp' => 'required|max:30',
            'agama' => 'required|max:50',
            'goldarah' => 'required|max:50',
            'statuskawin' => 'required|max:50',
            'pekerjaan' => 'required|max:50',
            'namaayah' => 'required|max:50',
            'tglawal' => 'required|max:50',
            'tg;akhir' => 'required|max:50',
            'penanggungjawab' => 'required|max:50',
            'statuskeluarga' => 'required|max:50',
            'alergi' => 'required|max:50',
            'riwayatpenyakit' => 'required|max:50',
            'nonaktif' => 'required|',
            'iduser' => 'required|max:50',
            'namaibu' => 'required|max:50',
            'namapasangan' => 'required|max:50',
            'saldodeposit' => 'nullable',
            'kartu_bpjs' => 'required|max:50',
            'telepon' => 'nullable',
            'statusalergi' => 'nullable',
            'updateonline' => 'nullable',
            'keanggotaan1' => 'nullable',
            'keanggotaan2' => 'nullable',
            'keanggotaan3' => 'nullable',
            'tkeanggotaan1' => 'nullable',
            'tkeanggotaan2' => 'nullable',
            'tkeanggotaan3' => 'nullable',
            'diagnosa1' => 'nullable',
            'diagnosa2' => 'nullable',
            'diagnosa3' => 'nullable',
    	], $messages);

        $data = Pasien::find($norm);
        $data->norm = $request->norm;
        $data->namapasien = $request->namapasien;
        $data->jeniskelamin = $request->jeniskelamin;
        $data->alamat = $request->alamat;
        $data->idkota = $request->idkota;
        $data->tptlahir = $request->tptlahir;
        $data->tgllahir = $request->tgllahir;
        $data->notelp = $request->notelp;
        $data->agama = $request->agama;
        $data->goldarah = $request->goldarah;
        $data->statuskawin = $request->statuskawin;
		$data->pekerjaan = $request->pekerjaan; 
		$data->namaayah = $request->namaayah;
		$data->tglawal = $request->tglawal;  
		$data->tglakhir = $request->tglakhir;   
		$data->penanggungjawab = $request->penanggungjawab; 
		$data->statuskeluarga = $request->statuskeluarga; 
		$data->alergi = $request->alergi;
		$data->riwayatpenyakit = $request->riwayatpenyakit;
		$data->nonaktif = $request->nonaktif;
		$data->iduser = $request->iduser;
		$data->namaibu = $request->namaibu;
		$data->namapasangan = $request->namapasangan;
		$data->saldodeposit = $request->saldodeposit;
		$data->kartu_bpjs = $request->kartu_bpjs;
		$data->telepon = $request->telepon;
		$data->statusalergi = $request->statusalergi;
		$data->updateonline = $request->updateonline;
		$data->keanggotaan1 = $request->keanggotaan1;
		$data->keanggotaan2 = $request->keanggotaan2;
		$data->keanggotaan3 = $request->keanggotaan3;
		$data->tkeanggotaan1 = $request->tkeanggotaan1;
		$data->tkeanggotaan2 = $request->tkeanggotaan2;
		$data->tkeanggotaan3 = $request->tkeanggotaan3;
		$data->diagnosa1 = $request->diagnosa1;
		$data->diagnosa2 = $request->diagnosa2;
		$data->diagnosa3 = $request->diagnosa3;
    	$data->save();

        return redirect('/Pasien')->with('alert-success','Data berhasil diubah!');
    }

    public function hapus($norm) {
    	$datas = Pasien::find($norm);
    	$datas->delete();
        return redirect('/Pasien')->with('alert-success','Data berhasil dihapus!');
    }
}
