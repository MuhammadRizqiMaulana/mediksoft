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
        $selectrawatjalan = Rawatjalan::find($faktur_rawatjalan);   

        return view('RawatJalan.Content.Rekam_Medis_Rawat_Jalan',compact('pasien','poliklinik','dokter','perusahaan','faskes','now','selectrawatjalan'));
    }

    public function store($faktur_rawatjalan, Request $request) {

        $messages = [
            'required' => ':attribute masih kosong',
            'min' => ':attribute diisi minimal :min karakter',
            'max' => ':attribute diisi maksimal :max karakter',
            'numeric' => ':attribute harus berupa angka',
            'unique' => ':attribute sudah ada',
            
        ];

    	$this->validate($request, [
    		
            'faktur_rawatjalan' => 'nullable|max:50',
            'norm' => 'nullable|max:50',
            'idperawat' => 'nullable|max:11',
            'nyeri' => 'nullable|max:1',
            'trauma_ya' => 'nullable|max:1',
            'trauma_tidak' => 'nullable|max:1',
            'kualitas_tekanan' => 'nullable|max:1',
            'kualitas_terbakar' => 'nullable|max:1',
            'kualitas_tusukan' => 'nullable|max:1',
            'kualitas_diiris' => 'nullable|max:1',
            'kualitas_mencengkeram' => 'nullable|max:1',
            'kualitas_melilit' => 'nullable|max:1',
            'lokasi' => 'nullable|max:200',
            'skala' => 'nullable|max:200',
            'metode_nrs' => 'nullable|max:1',
            'metode_wong_faces' => 'nullable|max:1',
            'metode_nips' => 'nullable|max:1',
            'metode_cpot' => 'nullable|max:1',
            'waktu_intermiten' => 'nullable|max:1',
            'waktu_terusmenerus' => 'nullable|max:1',
            'waktu_saattertentu' => 'nullable|max:1',
            'alatbantu_kruk' => 'nullable|max:1',
            'alatbantu_tongkat' => 'nullable|max:1',
            'alatbantu_kursiroda' => 'nullable|max:1',
            'gaya_lemah' => 'nullable|max:1',
            'gaya_sempoyongan' => 'nullable|max:1',
            'gaya_limbung' => 'nullable|max:1',
            'gangguanlihat' => 'nullable|max:1',
            'kesimpulan' => 'nullable|max:1',
            'bb' => 'nullable|max:1',
            'tb' => 'nullable|max:11',
            'gi_tidakada' => 'nullable|max:1',
            'gi_mual' => 'nullable|max:1',
            'gi_muntah' => 'nullable|max:1',
            'gi_anoreksida' => 'nullable|max:1',
            'gi_disfagia' => 'nullable|max:1',
            'gi_lain' => 'nullable|max:200',
            'namaalatbantu' => 'nullable|max:1',
            'cacattubuh' => 'nullable|max:1',
            'adl_mandiri' => 'nullable|max:1',
            'adl_dibantu' => 'nullable|max:1',
            'keadaan_baik' => 'nullable|max:1',
            'keadaan_sedang' => 'nullable|max:1',
            'keadaan_lemah' => 'nullable|max:1',
            'keadaan_gelisah' => 'nullable|max:1',
            'td' => 'nullable|max:100',
            'rr' => 'nullable|max:25',
            'nadi' => 'nullable|max:25',
            'suhu' => 'nullable|max:25',
            'gcs_e' => 'nullable|max:25',
            'gcs_m' => 'nullable|max:25',
            'gcs_v' => 'nullable|max:25',
            'airway_bebas' => 'nullable|max:1',
            'airway_bendaasing' => 'nullable|max:1',
            'airway_sputum' => 'nullable|max:1',
            'airway_darah' => 'nullable|max:1',
            'airway_lidah' => 'nullable|max:1',
            'nafas_vesikuler' => 'nullable|max:1',
            'nafas_vesikuler_minplus' => 'nullable|max:1',
            'nafas_wheezing' => 'nullable|max:1',
            'nafas_wheezing_minplus' => 'nullable|max:1',
            'nafas_rhonchi' => 'nullable|max:1',
            'nafas_rhonchi_minplus' => 'nullable|max:1',
            'nafas_keterangan' => 'nullable|max:200',
            'pupil_ukuran' => 'nullable|max:1',
            'pupil_ukuran_minplus' => 'nullable|max:1',
            'pupil_reflexcahaya' => 'nullable|max:1',
            'pupil_reflexcahaya_minplus' => 'nullable|max:1',
            'pupil_isocore' => 'nullable|max:1',
            'pupil_isocore_minplus' => 'nullable|max:1',
            'pupil_unisocore' => 'nullable|max:1',
            'pupil_unisocore_minplus' => 'nullable|max:1',
            'extremitas_akralhangat' => 'nullable|max:1',
            'extremitas_akraldingin' => 'nullable|max:1',
            'extremitas_pucat' => 'nullable|max:1',
            'extremitas_sianosis' => 'nullable|max:1',
            'extremitas_endema' => 'nullable|max:1',
            'extremitas_keterangan' => 'nullable|max:200',
            'crt_kurang2' => 'nullable|max:1',
            'crt_lebih2' => 'nullable|max:1',
            'muskuloskeletal_normal' => 'nullable|max:1',
            'muskuloskeletal_kerusakan' => 'nullable|max:1',
            'muskuloskeletal_luas' => 'nullable|max:1',
            'muskuloskeletal_lokasi' => 'nullable|max:1',
            'muskuloskeletal_pus' => 'nullable|max:1',
            'muskuloskeletal_keterangan' => 'nullable|max:200',
            'oksigenasi' => 'nullable|max:200',
            'lanjut_pulang' => 'nullable|max:1',
            'lanjut_aps' => 'nullable|max:1',
            'lanjut_ri' => 'nullable|max:1',
            'lanjut_rujuk' => 'nullable|max:1',
            'lanjut_meninggal' => 'nullable|max:1',
            'aps_keterangan' => 'nullable|max:200',
            'anamnesa' => 'nullable|max:200',            
            
    	], $messages);

        $rawatjalan = Rawatjalan::find($faktur_rawatjalan);

        $data = new Rawatjalan_skrening();
       
        $data->faktur_rawatjalan = $faktur_rawatjalan;
        $data->norm = $rawatjalan->norm;
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
        $data->pupil_unisocore = $request->pupil_unisocore;
        $data->pupil_unisocore_minplus = $request->pupil_unisocore_minplus;
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
