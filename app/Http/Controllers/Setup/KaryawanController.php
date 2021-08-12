<?php

namespace App\Http\Controllers\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Karyawan;


class KaryawanController extends Controller
{
    public function index(){
    	
        $datas = Karyawan::all();
    	return view('Setup.Content.Karyawan',compact('datas'));
    }

    public function tambah() {

        $datas = Karyawan::all();         

        return view('Setup.Content.Karyawan',compact('datas'));
        
    }

    public function store( Request $request) {

        $messages = [
            'required' => ':attribute masih kosong',
            'min' => ':attribute diisi minimal :min karakter',
            'max' => ':attribute diisi maksimal :max karakter',
            'numeric' => ':attribute harus berupa angka',
            'unique' => ':attribute sudah ada',
            'email' => ':attribute harus berupa email',
            'image' => ':attribute harus berupa gambar',
            'fee.digits_between' => ':attribute diisi antara 0 sampai 15 digit',
            'fee.min' => ':attribute tidak boleh kurang dari 0',
        ];

    	$this->validate($request, [
    		'nik' => 'required|max:20',
            'noktp' => 'nullable|max:30',
            'nama' => 'required|max:40',
            'jnskelamin' => 'required|max:30',
            'alamat' => 'required|max:100',
            'notelp' => 'required|max:20',
            'idjabatan' => 'nullable|max:11',
            'tgledit' => 'required',
            'tptlahir' => 'required|max:30',
            'tgllahir' => 'nullable|date',
            'goldarah' => 'required|max:2',
            'pengurus' => 'required|max:4',
    	], $messages);

        $data = new Karyawan();
        $data->nik = $request->nik;
        $data->noktp = $request->noktp;
        $data->nama = $request->nama;
        $data->jnskelamin = $request->jnskelamin;
        $data->alamat = $request->alamat;
        $data->notelp = $request->notelp;
        $data->idjabatan = $request->idjabatan;
        $data->tgledit = $request->tgledit;
        $data->tptlahir = $request->tptlahir;
        $data->tgllahir = $request->tgllahir;
        $data->goldarah = $request->goldarah;
        $data->pengurus = $request->pengurus;
    	$data->save();

    	return redirect('/Karyawan')->with('alert-success','Data berhasil ditambahkan!');
    }

   	public function ubah($idkaryawan ) {
        $datas = Karyawan::all();
        $ubah = Karyawan::find($idkaryawan);
        return view('Setup.Content.Karyawan',compact('datas','ubah'));

    }

    public function update($idkaryawan, Request $request) {
        $messages = [
            'required' => ':attribute masih kosong',
            'min' => ':attribute diisi minimal :min karakter',
            'max' => ':attribute diisi maksimal :max karakter',
            'numeric' => ':attribute harus berupa angka',
            'unique' => ':attribute sudah ada',
            'email' => ':attribute harus berupa email',
            'image' => ':attribute harus berupa gambar',
            'fee.between' => ':attribute diisi antara 0 sampai 99999999.9999 digit',
            'fee.min' => ':attribute tidak boleh kurang dari 0',
        ];

    	$this->validate($request, [
    		'namafaskes' => 'required|max:50',
            'alamat' => 'required|max:200',
            'fee' => 'required|numeric|between:0.0000,99999999.9999|min:0',
    	], $messages);

        $data = Karyawan::find($idkaryawan);
        $data->namafaskes = $request->namafaskes;
        $data->alamat = $request->alamat;
        $data->fee = $request->fee;
    	$data->save();

        return redirect('/Karyawan')->with('alert-success','Data berhasil diubah!');
    }

    public function hapus($idkaryawan) {
    	$datas = Karyawan::find($idkaryawan);
    	$datas->delete();
        return redirect('/Karyawan')->with('alert-success','Data berhasil dihapus!');
    }
}
