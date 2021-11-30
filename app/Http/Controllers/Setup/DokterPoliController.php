<?php

namespace App\Http\Controllers\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Poliklinik;
use App\Models\Dokter;
use App\Models\Eklaimbpjs;
use App\Models\Tarif_dokter_poli;

use Carbon\Carbon;


class DokterPoliController extends Controller
{
    public function index()
    {

        $dokter = Dokter::all();
        $poliklinik = Poliklinik::all();
        $eklaimbpjs = Eklaimbpjs::all();
        $datas = Tarif_dokter_poli::all();
        return view('Setup.Content.DokterPoli', compact('dokter', 'poliklinik', 'eklaimbpjs', 'datas'));
    }
    public function cetakdatadokterpoli()
    {

        $datas = Dokter::all();
        $poliklinik = Poliklinik::all();

        return view('Setup.Cetak.Cetak_DokterPoli', compact('datas', 'poliklinik'));
    }
    public function tambah()
    {

        $datas = Dokter::all();

        return view('Setup.Content.DokterPoli', compact('datas'));
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
            'kodepoli' => 'required|max:6',
            'iddokter' => 'required|max:30',
            'tarif' => 'required|numeric|between:0.0000,99999999.9999|min:0',
            'untukrs' => 'required|numeric|between:0.0000,99999999.9999|min:0',
            'untukdokter' => 'required|numeric|between:0.0000,99999999.9999|min:0',
            'idklaim' => 'required|max:30',

        ], $messages);

        $now = Carbon::now();
        $caridatayangsama = Tarif_dokter_poli::where('kodepoli', $request->kodepoli)->where('iddokter', $request->iddokter)->count();

        if ($caridatayangsama == 0) {

            $data = new Tarif_dokter_poli();
            $data->kodepoli = $request->kodepoli;
            $data->iddokter = $request->iddokter;
            $data->tarif = $request->tarif;
            $data->untukrs = $request->untukrs;
            $data->untukdokter = $request->tarif;
            $data->idklaim = $request->idklaim;
            $data->pemakaitarif = 0;

            $data->save();

            return redirect('/DokterPoli')->with('alert-success', 'Data berhasil ditambahkan!');
        } else {
            return redirect('/DokterPoli')->with('alert-danger', 'Data sudah tersedia!');
        }
    }

    public function ubah($kodepoli, $iddokter)
    {
        $dokter = Dokter::all();
        $ubah = Tarif_dokter_poli::where('kodepoli', $kodepoli)->where('iddokter', $iddokter)->first();
        $poliklinik = Poliklinik::all();
        $eklaimbpjs = Eklaimbpjs::all();
        $datas = Tarif_dokter_poli::all();

        return view('Setup.Content.DokterPoli', compact('dokter', 'ubah', 'poliklinik', 'eklaimbpjs', 'datas'));
    }

    public function update($kodepoli, $iddokter, Request $request)
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
            'kodepoli' => 'required|max:20|unique:tarif_dokter_poli',
            'iddokter' => 'required|max:30',
            'tarif' => 'required|numeric|between:0.0000,99999999.9999|min:0',
            'untukrs' => 'required|numeric|between:0.0000,99999999.9999|min:0',
            'untukdokter' => 'required|numeric|between:0.0000,99999999.9999|min:0',
            'idklaim' => 'required|max:30',
        ], $messages);

        $now = Carbon::now();
        DB::table('tarif_dokter_poli')->where('kodepoli', $kodepoli)->where('iddokter', $iddokter)->update([
            'kodepoli' => $request->kodepoli,
            'iddokter' => $request->iddokter,
            'tarif' => $request->tarif,
            'untukrs' => $request->untukrs,
            'untukdokter' => $request->tarif,
            'idklaim' => $request->idklaim,
            'pemakaitarif' => 0,
        ]);

        return redirect('/DokterPoli')->with('alert-success', 'Data berhasil diubah!');
    }

    public function hapus($kodepoli, $iddokter)
    {

        DB::table('tarif_dokter_poli')->where('kodepoli', $kodepoli)->where('iddokter', $iddokter)->delete();

        return redirect('/DokterPoli')->with('alert-success', 'Data berhasil dihapus!');
    }
}