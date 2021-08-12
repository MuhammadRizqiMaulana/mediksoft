<?php

namespace App\Http\Controllers\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Faskes;


class Pengirim_FaskesController extends Controller
{
    public function index(){
    	
        $datas = Faskes::all();
    	return view('Setup.Content.Pengirim_Faskes',compact('datas'));
    }

    public function tambah() {

        $datas = Faskes::all();         

        return view('Setup.Content.Pengirim_Faskes',compact('datas'));
        
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
    		'namafaskes' => 'required|max:50',
            'alamat' => 'required|max:200',
            'fee' => 'required|numeric|digits_between:0,15|min:0',
    	], $messages);

        $data = new Faskes();
        $data->namafaskes = $request->namafaskes;
        $data->alamat = $request->alamat;
        $data->fee = $request->fee;
    	$data->save();

    	return redirect('/Pengirim_Faskes')->with('alert-success','Data berhasil ditambahkan!');
    }

   	public function ubah($kodefaskes) {
        $datas = Faskes::all();
        $ubah = Faskes::find($kodefaskes);
        return view('Setup.Content.Pengirim_Faskes',compact('datas','ubah'));

    }

    public function update($kodefaskes, Request $request) {
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

        $data = Faskes::find($kodefaskes);
        $data->namafaskes = $request->namafaskes;
        $data->alamat = $request->alamat;
        $data->fee = $request->fee;
    	$data->save();

        return redirect('/Pengirim_Faskes')->with('alert-success','Data berhasil diubah!');
    }

    public function hapus($kodefaskes) {
    	$datas = Faskes::find($kodefaskes);
    	$datas->delete();
        return redirect('/Pengirim_Faskes')->with('alert-success','Data berhasil dihapus!');
    }
}
