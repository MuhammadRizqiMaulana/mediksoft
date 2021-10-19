<?php

namespace App\Http\Controllers\RawatJalan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Rawatinap;
use App\Models\Pasien;
use App\Models\Poliklinik;
use App\Models\Dokter;
use App\Models\Perusahaan;
use App\Models\Faskes;
use App\Models\Kamar;
use App\Models\Rawatjalan;
use App\Models\Icd10;
use App\Models\Macamrawat;
use App\Models\Jenismasuk;
use App\Models\Kamar_terisi;
use App\Models\Kamarkosong_temp;

use Carbon\Carbon;

class Transfer_RiController extends Controller
{
    public function index(){
        $rawatjalan = Rawatjalan::all();
        $kamar = Kamar::all();
        $dokter = Dokter::all();
        $perusahaan = Perusahaan::all();
        $pasien = Pasien::all();
        //$icd10 = Icd10::all();
        $macamrawat = Macamrawat::all();
        $jenismasuk = Jenismasuk::all();
           
        return view('RawatJalan.Content.Pendaftaran_Rawat_Inap', compact('rawatjalan','kamar','dokter','perusahaan','pasien','macamrawat','jenismasuk'));
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
            'faktur_rawatjalan' => 'required|max:15',
            'norm' => 'required|max:10',
            'kodekamar' => 'required|max:10',
            'tglmasuk' => 'required',
            'kodemasuk' => 'required|max:2',
            'macamrawat' => 'required|max:2',
            'idprsh' => 'required|max:11',
            'iddokter' => 'required|max:5',
            'diagnosaawal' => 'required|max:20',
            'penanggungjawab' => 'required|max:30',
            'hubungan_pj' => 'required|max:30',
            'alamat_pj' => 'required|max:200',
            'telp_pj' => 'required|max:12',
            'administrasi' => 'required|numeric|between:0.0000,99999999.9999|min:0',

    	], $messages);

        try{

            $invoice = Rawatinap::selectRaw('LPAD(CONVERT((COUNT("faktur_rawatinap") + 1) , char(13)) , 13,"0") as invoice')->first();
            $kunjungan = Rawatinap::where('norm',$request->norm)->count();

            $data = new Rawatinap();
            $data->faktur_rawatinap  = "RI".$invoice->invoice;
            $data->faktur_rawatjalan = $request->faktur_rawatjalan;
            $data->norm = $request->norm;
            $data->kodekamar = $request->kodekamar;
            $data->tglmasuk = $request->tglmasuk;
            $data->iddokter = $request->iddokter;
            $data->idprsh = $request->idprsh;
            $data->kodemasuk = $request->kodemasuk;
            $data->macamrawat = $request->macamrawat;
            $data->diagnosaawal = $request->diagnosaawal;
            $data->penanggungjawab = $request->penanggungjawab;
            $data->hubungan_pj = $request->hubungan_pj;
            $data->alamat_pj = $request->alamat_pj;
            $data->telp_pj = $request->telp_pj;
            $data->administrasi = $request->administrasi;
            $data->statustransaksi = "proses";
            $data->kunjunganke = $kunjungan + 1;

            $data->tglkeluar = NULL;
            $data->diagnosaakhir = "";
            $data->prosedur1 = "";
            $data->penyebab_luar = "";
            $data->iduserpendaftaran = NULL;  
            $data->iduserkasir = NULL;
            $data->imunitas = "";
            $data->statuspulang = NULL;
            $data->beratbadan = 0;
            $data->tinggibadan = 0;
            $data->subtotal = 0;
            $data->imunitas = "";
            $data->diskonpersen = 0;
            $data->diskonnominal = 0;
            $data->diskonnilai = 0;
            $data->pembulatan = 0;
            $data->nosep = "";
            $data->idklaimdokter = 0;
            $data->idklaimadministrasi = 0;
            $data->kondisikeluar = "";
            $data->edukasiawal = "Tidak Disampaikan";
            $data->edukasiawalket = "";
            $data->edukasikepada = "Kalangan Pasien";
            $data->tglrujuk = NULL;
            $data->rsrujuk = NULL;
            $data->norujuk = NULL;
            $data->adm_posting_ak = 0;
            $data->adm_nojurnal = "";

            $data->save();

            //kamar_terisi
            $kamarterisi = new Kamar_terisi();
            $kamarterisi->kodekamar = $request->kodekamar;
            $kamarterisi->faktur_rawatinap = "RI".$invoice->invoice;
            $kamarterisi->tglmasukkamar = $request->tglmasuk;
            $kamarterisi->save();

            //kamar_kosong
            $kamarkosong = Kamarkosong_temp::find($request->kodekamar);
            $kamarkosong->sisakamar = $kamarkosong->sisakamar - 1;
            $kamarkosong->save();
            return redirect('/Data_Pendaftaran_Rawat_Inap')->with('alert-success','Data berhasil ditambahkan!');
        }
         catch(\Exception $e){
            
            echo $e->getMessage();   // insert query
             // do task when error
            return redirect('/Pendaftaran_Rawat_Inap')->with('alert-danger','Data gagal ditambahkan!');
            

         }
    }
}