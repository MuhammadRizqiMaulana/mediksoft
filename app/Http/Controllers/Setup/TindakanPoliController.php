<?php

namespace App\Http\Controllers\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use carbon\Carbon;
use App\Models\Eklaimbpjs;
use App\Models\Icd9;
use App\Models\Poliklinik;
use App\Models\Tarif_tindakan_poli;

class TindakanPoliController extends Controller
{
    public function index()
    {
        $poliklinik = Poliklinik::all();
        $icd9 = Icd9::all();
        $eklaimbpjs = Eklaimbpjs::all();
        $datas = Tarif_tindakan_poli::all();
        return view('Setup.Content.TindakanPoli', compact('poliklinik', 'icd9', 'eklaimbpjs', 'datas'));
    }
    public function tambah()
    {

        $datas = Tarif_tindakan_poli::all();

        return view('Setup.Content.TindakanPoli', compact('datas'));
    }
    public function store(Request $request)
    {

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
            'namatindakan' => 'required|',
            'idklaim' => 'required|max:30',

        ], $messages);

        $now = Carbon::now();
        $invoice = Tarif_tindakan_poli::selectRaw('LPAD(CONVERT((COUNT("idtindakan") + 1) , char(5)) , 5,"0") as invoice')->first();

        $count = Tarif_tindakan_poli::all()->count();
        $data = new Tarif_tindakan_poli();
        $data->idtindakan = "TRJ".$invoice->invoice;
        $data->kodepoli = $request->kodepoli;
        $data->namatindakan = $request->namatindakan;
        $data->tarif = $request->tarif;
        $data->untukrs = $request->untukrs;
        $data->untukdokter = $request->untukdokter;
        $data->untukparamedis = $request->untukparamedis;
        $data->idklaim = $request->idklaim;
        $data->pemakaitarif = 0;

        $data->save();

        return redirect('/TindakanPoli')->with('alert-success', 'Data berhasil ditambahkan!');
    }
    public function ubah($idtindakan)
    {
        $kategori = Kategoritransaksi::all();
        $ubah = Tarif_tindakan_poli::find($idtindakan);
        $poliklinik = Poliklinik::all();
        $icd9 = Icd9::all();
        $eklaimbpjs = Eklaimbpjs::all();
        $datas = Tarif_tindakan_poli::all();

        return view('Setup.Content.TindakanPoli', compact('kategori', 'ubah', 'icd9', 'poliklinik', 'eklaimbpjs', 'datas'));
    }
    public function update($idtindakan, Request $request)
    {
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
            'idtindakan' => 'required|max:30',
            'kodekategori' => 'required|',
            'namatindakan' => 'required|',
            'idklaim' => 'required|max:30',
        ], $messages);

        $now = Carbon::now();
        $data = Tarif_tindakan_poli::find($idtindakan);
        $data->kodepoli = $request->kodepoli;
        $data->namatindakan = $request->namatindakan;
        $data->tarif = $request->tarif;
        $data->untukrs = $request->untukrs;
        $data->untukdokter = $request->untukdokter;
        $data->untukparamedis = $request->untukparamedis;
        $data->idklaim = $request->idklaim;
        $data->pemakaitarif = 0;
        $data->save();

        return redirect('/TindakanPoli')->with('alert-success', 'Data berhasil diubah!');
    }
    public function hapus($idtindakan)
    {
        $datas = Tarif_tindakan_poli::find($idtindakan);
        $datas->delete();
        return redirect('/TindakanPoli')->with('alert-success', 'Data berhasil dihapus!');
    }
}