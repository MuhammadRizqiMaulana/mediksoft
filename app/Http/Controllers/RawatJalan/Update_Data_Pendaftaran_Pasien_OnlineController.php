<?php

namespace App\Http\Controllers\RawatJalan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Pasien;
use App\Models\Rawatjalan;

use Carbon\Carbon;

class Update_Data_Pendaftaran_Pasien_OnlineController extends Controller
{
    public function index(){
        $datas = Rawatjalan::select('norm')->distinct()->get();
           
        return view('RawatJalan.Content.Update_Data_Pendaftaran_Pasien_Online', compact('datas'));
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

            return redirect('/Pendaftaran_Rawat_Inap')->with('alert-success','Data berhasil ditambahkan!');
        }
         catch(\Exception $e){
            
            echo $e->getMessage();   // insert query
             // do task when error
            return redirect('/Pendaftaran_Rawat_Inap')->with('alert-danger','Data gagal ditambahkan!');
            

         }
    }
}