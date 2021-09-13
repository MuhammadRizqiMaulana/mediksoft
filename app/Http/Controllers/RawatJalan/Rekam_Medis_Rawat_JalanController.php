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
use App\Models\Rawatjalan_skrening;


use Carbon\Carbon;

class Rekam_Medis_Rawat_JalanController extends Controller
{
    public function index($faktur_rawatjalan){
    	
        $pasien = Pasien::all();
        $poliklinik = Poliklinik::all();
        $dokter = Dokter::all();
        $perusahaan = Perusahaan::all();
        $faskes = Faskes::all();   
        $now = Carbon::now();
        $rawatjalan = Rawatjalan::find($faktur_rawatjalan);   

        return view('RawatJalan.Content.Rekam_Medis_Rawat_Jalan',compact('pasien','poliklinik','dokter','perusahaan','faskes','now','rawatjalan'));
    }

    public function store( Request $request) {

        $messages = [
            'required' => ':attribute masih kosong',
            'min' => ':attribute diisi minimal :min karakter',
            'max' => ':attribute diisi maksimal :max karakter',
            'numeric' => ':attribute harus berupa angka',
            'unique' => ':attribute sudah ada',
            
        ];

    	$this->validate($request, [
    		
            'namabank' => 'required|max:200',
            'alamat' => 'required|max:200',
            'telp' => 'required|max:200',
            'keterangan' => 'required|max:200',
          
    	], $messages);

        $data = new Rawatjalan_skrening();
       
        $data->norm = $request->norm;
        $data->idperawat = $request->idperawat;
        $data->nyeri = $request->nyeri;
        $data->trauma_ya = $request->trauma_ya;
        $data->trauma_tidak = $request->trauma_tidak;
        $data->kualitas_tekanan = $request->kualitas_tekanan;
        $data->kualitas_terbakar = $request->kualitas_terbakar;
        $data->kualitas_tusukan = $request->kualitas_tusukan;
        $data->kualitas_diiris = $request->kualitas_diiris;
        $data->kualitas_mencengkram = $request->kualitas_mencengkram;
        $data->kualitas_melilit = $request->kualitas_melilit;
        $data->lokasi = $request->lokasi;
        $data->skala = $request->skala;
        $data->metode_nrs = $request->metode_nrs;
        $data->metode_wong_faces = $request->metode_wong_faces;
        $data->metode_nips = $request->metode_nips;
        $data->metode_cpot = $request->metode_cpot;
        $data->waktu_intermiten = $request->waktu_intermiten;
        $data->waktu_terusmenerus = $request->waktu_terusmenerus;
        $data->waktu_saattertentu = $request->waktu_saattertentu;
        $data->alatbantu_kruk = $request->alatbantu_kruk;
        $data->alatbantu_tongkat = $request->alatbantu_tongkat;
        $data->alatbantu_kursiroda = $request->alatbantu_kursiroda;
        $data->gaya_lemah = $request->gaya_lemah;
        $data->gaya_sempoyongan = $request->gaya_sempoyongan;
        $data->gaya_limbung = $request->gaya_limbung;
        $data->gangguanlihat = $request->gangguanlihat;
        $data->kesimpulan = $request->kesimpulan;
        $data->bb = $request->bb;
        $data->tb = $request->tb;
        $data->gi_tidakada = $request->gi_tidakada;
        $data->gi_mual = $request->gi_mual;
        $data->gi_muntah = $request->gi_muntah;
        $data->gi_anoreksia = $request->gi_anoreksia;
        $data->gi_disfagia = $request->gi_disfagia;
        $data->gi_lain = $request->gi_lain;
        $data->namaalatbantu = $request->namaalatbantu;
        $data->cacattubuh = $request->cacattubuh;
        $data->adl_mandiri = $request->adl_mandiri;
        $data->adl_dibantu = $request->adl_dibantu;
        $data->keadaan_baik = $request->keadaan_baik;
        $data->keadaan_sedang = $request->keadaan_sedang;
        $data->keadaan_lemah = $request->keadaan_lemah;
        $data->keadaan_gelisah = $request->keadaan_gelisah;
        $data->td = $request->td;
        $data->rr = $request->rr;
        $data->nadi = $request->nadi;
        $data->suhu = $request->suhu;
        $data->gcs_e = $request->gcs_e;
        $data->gcs_m = $request->gcs_m;
        $data->gcs_v = $request->gcs_v;
        $data->airway_bebas = $request->airway_bebas;
        $data->airway_bendaasing = $request->airway_bendaasing;
        $data->airway_sputum = $request->airway_sputum;
        $data->airway_darah = $request->airway_darah;
        $data->airway_lidah = $request->airway_lidah;
        $data->nafas_vesikuler = $request->adl_dinafas_vesikulerbantu;
        $data->nafas_vesikuler_minplus = $request->nafas_vesikuler_minplus;
        $data->nafas_wheezing = $request->nafas_wheezing;
        $data->nafas_wheezing_minplus = $request->nafas_wheezing_minplus;
        $data->nafas_rhonchi = $request->nafas_rhonchi;
        $data->nafas_rhonchi_minplus = $request->nafas_rhonchi_minplus;
        $data->nafas_keterangan = $request->nafas_keterangan;
        $data->pupil_ukuran = $request->pupil_ukuran;
        $data->pupil_ukuran_minplus = $request->pupil_ukuran_minplus;
        $data->pupil_reflexcahaya = $request->pupil_reflexcahaya;
        $data->pupil_reflexcahaya_minplus = $request->pupil_reflexcahaya_minplus;
        $data->pupil_isocore = $request->pupil_isocore;
        $data->pupil_isocore_minplus = $request->pupil_isocore_minplus;
        $data->extremitas_akralhangat = $request->extremitas_akralhangat;
        $data->extremitas_akraldingin = $request->extremitas_akraldingin;
        $data->extremitas_pucat = $request->extremitas_pucat;
        $data->extremitas_sianosis = $request->extremitas_sianosis;
        $data->extremitas_endema = $request->extremitas_endema;
        $data->extremitas_keterangan = $request->extremitas_keterangan;
        $data->crt_kurang2 = $request->crt_kurang2;
        $data->crt_lebih2 = $request->crt_lebih2;
        $data->muskuloskeletal_normal = $request->muskuloskeletal_normal;
        $data->muskuloskeletal_kerusakan = $request->muskuloskeletal_kerusakan;
        $data->muskuloskeletal_luas = $request->muskuloskeletal_luas;
        $data->muskuloskeletal_lokasi = $request->muskuloskeletal_lokasi;
        $data->muskuloskeletal_pus = $request->muskuloskeletal_pus;
        $data->muskuloskeletal_keterangan = $request->muskuloskeletal_keterangan;
        $data->oksigenasi = $request->oksigenasi;
        $data->lanjut_pulang = $request->lanjut_pulang;
        $data->lanjut_aps = $request->lanjut_aps;
        $data->lanjut_ri = $request->lanjut_ri;
        $data->lanjut_rujuk = $request->lanjut_rujuk;
        $data->lanjut_meninggal = $request->lanjut_meninggal;
        $data->aps_keterangan = $request->aps_keterangan;
        $data->anamnesa = $request->anamnesa;  

    	$data->save();

    	return redirect('/RawatJalan')->with('alert-success','Data berhasil ditambahkan!');
    }
}
