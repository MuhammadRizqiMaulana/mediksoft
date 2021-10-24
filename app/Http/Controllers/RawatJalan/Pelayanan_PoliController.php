<?php

namespace App\Http\Controllers\RawatJalan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Pasien;
use App\Models\Poliklinik;
use App\Models\Dokter;
use App\Models\Perusahaan;
use App\Models\Faskes;
use App\Models\Lokasi;
use App\Models\Rawatjalan;
use App\Models\Tarif_tindakan_poli;
use App\Models\Rawatjalan_transaksi;

use Carbon\Carbon;

class Pelayanan_PoliController extends Controller
{
    public function index(){
        $rawatjalan = Rawatjalan::where('statustransaksi', 'proses')->get();
        $now = Carbon::now();
           
        return view('RawatJalan.Content.Pelayanan_Rawat_Jalan',compact('rawatjalan','now'));
    }

    public function selectrawatjalan($faktur_rawatjalan) {
        $rawatjalan = Rawatjalan::where('statustransaksi', 'proses')->get();
        $tariftindakanpoli = Tarif_tindakan_poli::all();
        $datas = Rawatjalan::find($faktur_rawatjalan);
        $rawatjalantransaksi = Rawatjalan_transaksi::where('faktur_rawatjalan',$faktur_rawatjalan)->get();
        $now = Carbon::now();
        $totalharga = Rawatjalan_transaksi::where('faktur_rawatjalan',$faktur_rawatjalan)->sum('tarif');
           
        return view('RawatJalan.Content.Pelayanan_Rawat_Jalan',compact('rawatjalan','datas','now','tariftindakanpoli','rawatjalantransaksi','totalharga'));
    }

    public function store(Request $request) {

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
            'idtindakan' => 'required|max:20',
            'namatransaksi' => 'required|max:50',
            'jumlah' => 'required|max:11',
            'tarif' => 'required|numeric|between:0.0000,99999999.9999|min:0',

    	], $messages);

        try{

            $invoice = Rawatjalan_transaksi::selectRaw('LPAD(CONVERT((COUNT("notransaksi") + 1) , char(5)) , 5,"0") as invoice')->first();
            $now = Carbon::now();

            $datatariftindakanpoli = Tarif_tindakan_poli::find($request->idtindakan);
            $cektindakansama = Rawatjalan_transaksi::where('faktur_rawatjalan', $request->faktur_rawatjalan)->where('idtindakan', $request->idtindakan)->where('kodekategori', 1)->count();

            if ($cektindakansama == 0) {
                $data = new Rawatjalan_transaksi();
                $data->faktur_rawatjalan  = $request->faktur_rawatjalan;
                $data->notransaksi = "TJ".$invoice->invoice;
                $data->kodekategori = '1';
                $data->idtindakan = $request->idtindakan;
                $data->namatransaksi = $request->namatransaksi;
                $data->jumlah = $request->jumlah;
                $data->tarif = $datatariftindakanpoli->tarif * $request->jumlah;
                $data->diskon = 0;
                $data->idklaim = $datatariftindakanpoli->idklaim;
                $data->tarif_rs = $datatariftindakanpoli->untukrs * $request->jumlah;
                $data->tarif_dokter = $datatariftindakanpoli->untukdokter * $request->jumlah;
                $data->tarif_paramedis = $datatariftindakanpoli->untukparamedis * $request->jumlah;
                $data->tglpelayanan = $now;
                $data->save();

                return redirect('/Pelayanan_Rawat_Jalan/select'.$request->faktur_rawatjalan)->with('alert-success','Data berhasil ditambahkan!');
            }else{
                $data = Rawatjalan_transaksi::where('faktur_rawatjalan', $request->faktur_rawatjalan)->where('idtindakan', $request->idtindakan)->where('kodekategori', 1)->first();
                $data->jumlah = $data->jumlah + $request->jumlah;
                $data->tarif = $data->tarif + ($datatariftindakanpoli->tarif * $request->jumlah);
                $data->tarif_rs = $data->tarif_rs + ($datatariftindakanpoli->untukrs * $request->jumlah);
                $data->tarif_dokter = $data->tarif_dokter + ($datatariftindakanpoli->untukdokter * $request->jumlah);
                $data->tarif_paramedis = $data->tarif_paramedis + ($datatariftindakanpoli->untukparamedis * $request->jumlah);
                $data->tglpelayanan = $now;
                $data->save();

                return redirect('/Pelayanan_Rawat_Jalan/select'.$request->faktur_rawatjalan)->with('alert-success','Data berhasil ditambahkan!');
            }
            
        }
         catch(\Exception $e){
            
            echo $e->getMessage();   // insert query
             // do task when error
            return redirect('/Pelayanan_Rawat_Jalan/select'.$request->faktur_rawatjalan)->with('alert-danger', $e);
            
        }
    }
}