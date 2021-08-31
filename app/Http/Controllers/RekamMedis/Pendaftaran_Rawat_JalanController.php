<?php

namespace App\Http\Controllers\RekamMedis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Pasien;
use App\Models\Poliklinik;
use App\Models\Dokter;
use App\Models\Perusahaan;
use App\Models\Faskes;
use App\Models\Lokasi;
use App\Models\Rawatjalan;

use Carbon\Carbon;

class Pendaftaran_Rawat_JalanController extends Controller
{
    public function index(){
    	
        $pasien = Pasien::all();
        $poliklinik = Poliklinik::all();
        $dokter = Dokter::all();
        $perusahaan = Perusahaan::all();
        $faskes = Faskes::all();   
        $now = Carbon::now();      

        return view('RekamMedis.Content.Pendaftaran_Rawat_Jalan',compact('pasien','poliklinik','dokter','perusahaan','faskes','now'));
    }

    public function tambah() {

        $pasien = Pasien::all();
        $poliklinik = Poliklinik::all();
        $dokter = Dokter::all();
        $perusahaan = Perusahaan::all();
        $faskes = Faskes::all();   
        $now = Carbon::now();      

        return view('RekamMedis.Content.Pendaftaran_Rawat_Jalan',compact('pasien','poliklinik','dokter','perusahaan','faskes','now'));
        
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
        ];

    	$this->validate($request, [
    		'norm' => 'required|max:10',
            'tglmasuk' => 'nullable',
            'kodepoli' => 'required|max:5',
            'iddokter' => 'required|max:5',
            'idprsh' => 'required|max:11',
            'kodefaskespengirim' => 'required|max:11',
            'administrasi' => 'nullable|numeric|between:0.0000,99999999.9999|min:0',

    	], $messages);

        $invoice = Rawatjalan::selectRaw('LPAD(CONVERT(COUNT("faktur_rawatjalan") , char(15)) , 15,"0") as invoice')->first();
        $kunjungan = Rawatjalan::where('norm',$request->norm)->count();

        $data = new Rawatjalan();
        $data->faktur_rawatjalan  = $invoice->invoice;
        $data->norm = $request->norm;
        $data->tglmasuk = $request->tglmasuk;
        $data->kodepoli = $request->kodepoli;
        $data->iddokter = $request->iddokter;
        $data->idprsh = $request->idprsh;
        $data->kodefaskespengirim = $request->kodefaskespengirim;
        $data->administrasi = $request->administrasi;

        $data->diagnosaawal = "";
        $data->diagnosaakhir = "";
        $data->prosedur1 = "";
        $data->tarifdokter = 0;
		$data->subtotal = 0; 
		$data->diskon = 0;
		$data->inap = 0;  
		$data->iduserpendaftaran = NULL;  
		$data->iduserkasir = NULL;
		$data->statustransaksi = "proses"; 
		$data->kunjunganke = $kunjungan + 1;
		$data->nosep = "";
		$data->idklaimdokter = 0;
		$data->idklaimadministrasi = 0;
		$data->edukasiawal = "Tidak Disampaikan";
		$data->edukasiawalket = "";
		$data->edukasikepada = "Kalangan Pasien";
		$data->hubdenganpasien = "";
		$data->diagnosadengan = "";

    	$data->save();

    	return redirect('/Data_Pendaftaran')->with('alert-success','Data berhasil ditambahkan!');
    }
}
