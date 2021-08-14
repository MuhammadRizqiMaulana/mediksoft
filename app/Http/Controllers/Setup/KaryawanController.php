<?php

namespace App\Http\Controllers\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Karyawan;
use App\Models\Jabatan;

use Carbon\Carbon;


class KaryawanController extends Controller
{
    public function index(){
    	
        $datas = Karyawan::all();
        $jabatans = Jabatan::all();
    	return view('Setup.Content.Karyawan',compact('datas','jabatans'));
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
            'image' => ':attribute harus berupa gambar'
        ];

    	$this->validate($request, [
    		'nik' => 'required|max:20',
            'noktp' => 'nullable|max:30',
            'nama' => 'required|max:40',
            'jnskelamin' => 'required|max:30',
            'alamat' => 'required|max:100',
            'notelp' => 'required|max:20',
            'idjabatan' => 'nullable|max:11',
            'tptlahir' => 'required|max:30',
            'tgllahir' => 'nullable|date',
            'goldarah' => 'required|max:2',
            
    	], $messages);

        $now = Carbon::now();

        $data = new Karyawan();
        $data->nik = $request->nik;
        $data->noktp = $request->noktp;
        $data->nama = $request->nama;
        $data->jnskelamin = $request->jnskelamin;
        $data->alamat = $request->alamat;
        $data->notelp = $request->notelp;
        $data->idjabatan = $request->idjabatan;
        $data->tgledit = $now;
        $data->tptlahir = $request->tptlahir;
        $data->tgllahir = $request->tgllahir;
        $data->goldarah = $request->goldarah;
        
    	$data->save();

    	return redirect('/Karyawan')->with('alert-success','Data berhasil ditambahkan!');
    }

   	public function ubah($idkaryawan ) {
        $datas = Karyawan::all();
        $ubah = Karyawan::find($idkaryawan);
        $jabatans = Jabatan::all();

        return view('Setup.Content.Karyawan',compact('datas','ubah','jabatans'));

    }

    public function update($idkaryawan, Request $request) {
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
    		'nik' => 'required|max:20',
            'noktp' => 'nullable|max:30',
            'nama' => 'required|max:40',
            'jnskelamin' => 'required|max:30',
            'alamat' => 'required|max:100',
            'notelp' => 'required|max:20',
            'idjabatan' => 'nullable|max:11',
            'tptlahir' => 'required|max:30',
            'tgllahir' => 'nullable|date',
            'goldarah' => 'required|max:2',

    	], $messages);

        $now = Carbon::now();

        $data = Karyawan::find($idkaryawan);
        $data->nik = $request->nik;
        $data->noktp = $request->noktp;
        $data->nama = $request->nama;
        $data->jnskelamin = $request->jnskelamin;
        $data->alamat = $request->alamat;
        $data->notelp = $request->notelp;
        $data->idjabatan = $request->idjabatan;
        $data->tgledit = $now;
        $data->tptlahir = $request->tptlahir;
        $data->tgllahir = $request->tgllahir;
        $data->goldarah = $request->goldarah;
    	$data->save();

        return redirect('/Karyawan')->with('alert-success','Data berhasil diubah!');
    }

    public function hapus($idkaryawan) {
    	$datas = Karyawan::find($idkaryawan);
    	$datas->delete();
        return redirect('/Karyawan')->with('alert-success','Data berhasil dihapus!');
    }
}
