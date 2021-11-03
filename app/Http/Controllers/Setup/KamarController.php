<?php

namespace App\Http\Controllers\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Kamar;
use App\Models\Eklaimbpjs;
use App\Models\Kelas;
use App\Models\Ruang;
use App\Models\Kamarkosong_temp;


class KamarController extends Controller
{
    public function index(){
    	
        $datas = Kamar::all();
        $eklaimbpjs = Eklaimbpjs::all();
        $kelas = Kelas::all();
        $ruang = Ruang::all();

    	return view('Setup.Content.Kamar',compact('datas','kelas','ruang','eklaimbpjs'));
    }

    public function tambah() {

        $datas = Kamar::all();
        $eklaimbpjs = Eklaimbpjs::all();
        $eklaimbpjs = Kelas::all();
        $ruang = Ruang::all();         

        return view('Setup.Content.Kamar',compact('datas','kelas','ruang','eklaimbpjs'));
        
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
            'between' => ':attribute diisi antara 0 sampai XXXXXXXX.XXXX digit',
            'min' => ':attribute tidak boleh kurang dari 0',
        ];

    	$this->validate($request, [
    		'kodekamar' => 'required|max:10|unique:kamar',
            'kodekelas' => 'nullable|max:2',
            'koderuang' => 'nullable|max:5',
            'keterangan' => 'nullable|max:50',
            'tarif' => 'required|numeric|between:0.0000,99999999.9999|min:0',
            'jasaperawat' => 'required|numeric|between:0.0000,99999999.9999|min:0',
            'tglaktif' => 'required|date',
            'jumlahbed' => 'required|max:4',
            'idklaim' => 'required|max:11',
    	], $messages);

        $data = new Kamar();
        $data->kodekamar = $request->kodekamar;
        $data->kodekelas = $request->kodekelas;
        $data->koderuang = $request->koderuang;
        $data->keterangan = $request->keterangan;
        $data->tarif = $request->tarif;
        $data->jasaperawat = $request->jasaperawat;
        $data->tglaktif = $request->tglaktif;
        $data->jumlahbed = $request->jumlahbed;
        $data->dikirimkebpjs = "1";
        $data->idklaim = $request->idklaim;
        $data->pemakaitarif = "belum";
    	$data->save();

        $selectkamar = Kamar::find($request->kodekamar);

        //Insert Kamar Kosong
        $kamarkosong = new Kamarkosong_temp();
        $kamarkosong->keterangan = $selectkamar->kodekamar;
        $kamarkosong->keterangan2 = "";
        $kamarkosong->namakelas = $selectkamar->Kelas->nama;
        $kamarkosong->namaruang = $selectkamar->Ruang->namaruang;
        $kamarkosong->sisakamar = $selectkamar->jumlahbed;
        $kamarkosong->kodekelas = $selectkamar->kodekelas;
        $kamarkosong->namakamar = $selectkamar->keterangan;
        $kamarkosong->save();

    	return redirect('/Kamar')->with('alert-success','Data berhasil ditambahkan!');
    }

   	public function ubah($kodekamar) {
        $datas = Kamar::all();
        $eklaimbpjs = Eklaimbpjs::all();
        $kelas = Kelas::all();
        $ruang = Ruang::all();   
        $ubah = Kamar::find($kodekamar);

        return view('Setup.Content.Kamar',compact('datas','ubah','kelas','ruang','eklaimbpjs'));

    }

    public function update($kodekamar, Request $request) {
        $messages = [
            'required' => ':attribute masih kosong',
            'min' => ':attribute diisi minimal :min karakter',
            'max' => ':attribute diisi maksimal :max karakter',
            'numeric' => ':attribute harus berupa angka',
            'unique' => ':attribute sudah ada',
            'email' => ':attribute harus berupa email',
            'image' => ':attribute harus berupa gambar',
            'between' => ':attribute diisi antara 0 sampai XXXXXXXX.XXXX digit',
            'min' => ':attribute tidak boleh kurang dari 0',
        ];

    	$this->validate($request, [
    		'kodekamar' => 'nullable|max:10',
            'kodekelas' => 'nullable|max:2',
            'koderuang' => 'nullable|max:5',
            'keterangan' => 'nullable|max:50',
            'tarif' => 'required|numeric|between:0.0000,99999999.9999|min:0',
            'jasaperawat' => 'required|numeric|between:0.0000,99999999.9999|min:0',
            'tglaktif' => 'required|date',
            'jumlahbed' => 'required|max:4',
            'idklaim' => 'required|max:11'
    	], $messages);

        try{
            $data = Kamar::find($kodekamar);
            $data->kodekelas = $request->kodekelas;
            $data->koderuang = $request->koderuang;
            $data->keterangan = $request->keterangan;
            $data->tarif = $request->tarif;
            $data->jasaperawat = $request->jasaperawat;
            $data->tglaktif = $request->tglaktif;
            $data->jumlahbed = $request->jumlahbed;
            $data->dikirimkebpjs = "1";
            $data->idklaim = $request->idklaim;
            $data->pemakaitarif = "belum";
            $data->save();

            return redirect('/Kamar')->with('alert-success','Data berhasil diubah!');
         }
         catch(\Exception $e){
            // do task when error
            return redirect('/Kamar')->with('alert-danger','Data gagal diubah diubah!');
            echo $e->getMessage();   // insert query
            
         }

        
    }

    public function hapus($kodekamar) {
        try{
            
            $datas = Kamar::find($kodekamar);
            $datas->delete();
            
            $kamarkosong = Kamarkosong_temp::find($kodekamar);
            $kamarkosong->delete();

            return redirect('/Kamar')->with('alert-success','Data berhasil dihapus!');

        }catch(\Exception $e){

            return redirect('/Kamar')->with('alert-danger','Data gagal dihapus!');
        }
    	
    }

    public function kamar_kosong(){
        
    }
}
