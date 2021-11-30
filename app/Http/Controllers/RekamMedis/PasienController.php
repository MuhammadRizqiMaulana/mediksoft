<?php

namespace App\Http\Controllers\RekamMedis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Pasien;
use App\Models\Pasien_alergi;
use App\Models\Agama;
use App\Models\Icd10;
use App\Models\Keanggotaan;
use App\Models\Lokasi;



class PasienController extends Controller
{
    public function index()
    {

        $datas = Pasien::all();
        $agama = Agama::all();
        $icd10 = Icd10::all();
        $diagnosa = Icd10::all();
        $keanggotaan = Keanggotaan::all();
        //$lokasi_propinsis = Lokasi::orderBy('lokasi_kode')->distinct('lokasi_propinsi')->get();
        $lokasi = Lokasi::orderBy('lokasi_kode')->get();

        return view('RekamMedis.Content.Pasien', compact('datas', 'agama', 'icd10', 'keanggotaan', 'diagnosa', 'lokasi'));
    }
    public function cetakdatapasien()
    {

        $datas = Pasien::all();

        return view('RekamMedis.Cetak.Cetak_Pasien', compact('datas'));
    }
    public function tambah()
    {

        $datas = Pasien::all();

        return view('RekamMedis.Content.Pasien', compact('datas'));
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
            'norm' => 'required|max:10|unique:pasien',
            'namapasien' => 'nullable|max:50',
            'alamat' => 'nullable|max:40',
            'jeniskelamin' => 'nullable|max:30',
            'idkota' => 'nullable|max:100',
            'tptlahir' => 'nullable|max:50',
            'tgllahir' => 'nullable|max:50',
            'notelp' => 'nullable|max:30',
            'agama' => 'nullable|max:50',
            'goldarah' => 'nullable|max:50',
            'statuskawin' => 'nullable|max:50',
            'pekerjaan' => 'nullable|max:50',
            'namaayah' => 'nullable|max:50',
            'tglawal' => 'nullable|max:50',
            'tglakhir' => 'nullable|max:50',
            'penanggungjawab' => 'nullable|max:50',
            'statuskeluarga' => 'nullable|max:50',
            'alergi' => 'nullable|max:50',
            'riwayatpenyakit' => 'nullable|max:50',
            'nonaktif' => 'nullable|',
            'iduser' => 'nullable|max:50',
            'namaibu' => 'nullable|max:50',
            'namapasangan' => 'nullable|max:50',
            'saldodeposit' => 'nullable',
            'kartu_bpjs' => 'required|max:50',
            'telepon' => 'nullable',
            'statusalergi' => 'required|max:50',
            'updateonline' => 'nullable|max:50',
            'keanggotaan1' => 'nullable|max:50',
            'keanggotaan2' => 'nullable|max:50',
            'keanggotaan3' => 'nullable|max:50',
            'tkeanggotaan1' => 'nullable',
            'tkeanggotaan2' => 'nullable',
            'tkeanggotaan3' => 'nullable',
            'diagnosa1' => 'nullable',
            'diagnosa2' => 'nullable',
            'diagnosa3' => 'nullable',
            'jenisalergi' => 'nullable',
            'keterangan' => 'nullable',
        ], $messages);

        $data = new pasien();
        $data->norm = $request->norm;
        $data->namapasien = $request->namapasien;
        $data->jeniskelamin = $request->jeniskelamin;
        $data->alamat = $request->alamat;
        $data->idkota = $request->idkota;
        $data->tptlahir = $request->tptlahir;
        $data->tgllahir = $request->tgllahir;
        $data->notelp = $request->notelp;
        $data->agama = $request->agama;
        $data->goldarah = $request->goldarah;
        $data->statuskawin = $request->statuskawin;
        $data->pekerjaan = $request->pekerjaan;
        $data->namaayah = $request->namaayah;
        $data->tglawal = null;
        $data->tglakhir = null;
        $data->penanggungjawab = $request->penanggungjawab;
        $data->statuskeluarga = $request->statuskeluarga;
        $data->alergi = $request->jenisalergi . ", " . $request->keterangan;
        $data->riwayatpenyakit = $request->riwayatpenyakit;

        if ($request->nonaktif == null) {
            $data->nonaktif = 0;
        } else {
            $data->nonaktif = $request->nonaktif;
        }

        $data->iduser = null;
        $data->namaibu = $request->namaibu;
        $data->namapasangan = $request->namapasangan;
        $data->saldodeposit = null;
        $data->kartu_bpjs = $request->kartu_bpjs;
        $data->telepon = null;
        $data->statusalergi = $request->statusalergi;
        $data->updateonline = 1;

        if ($request->keanggotaan1 == null) {
            $data->keanggotaan1 = 0;
        } else {
            $data->keanggotaan1 = $request->keanggotaan1;
        }

        if ($request->keanggotaan2 == null) {
            $data->keanggotaan2 = 0;
        } else {
            $data->keanggotaan2 = $request->keanggotaan2;
        }

        if ($request->keanggotaan3 == null) {
            $data->keanggotaan3 = 0;
        } else {
            $data->keanggotaan3 = $request->keanggotaan3;
        }
        $data->tkeanggotaan1 = $request->tkeanggotaan1;
        $data->tkeanggotaan2 = $request->tkeanggotaan2;
        $data->tkeanggotaan3 = $request->tkeanggotaan3;
        $data->diagnosa1 = $request->diagnosa1;
        $data->diagnosa2 = $request->diagnosa2;
        $data->diagnosa3 = $request->diagnosa3;
        $data->save();

        $alergi = new Pasien_alergi();
        $alergi->norm = $request->norm;
        $alergi->jenisalergi = $request->jenisalergi;
        $alergi->keterangan = $request->keterangan;
        $alergi->save();

        return redirect('/Pasien')->with('alert-success', 'Data berhasil ditambahkan!');
    }

    public function ubah($norm)
    {
        $ubah = Pasien::find($norm);
        $alergi = Pasien_alergi::find($norm);
        $datas = Pasien::all();
        $agama = Agama::all();
        $icd10 = Icd10::all();
        $diagnosa = Icd10::all();
        $keanggotaan = Keanggotaan::all();
        $lokasi = Lokasi::orderBy('lokasi_propinsi', 'ASC')->get();
        return view('RekamMedis.Content.Pasien', compact('datas', 'ubah', 'agama', 'icd10', 'keanggotaan', 'diagnosa', 'alergi', 'lokasi'));
    }

    public function update($norm, Request $request)
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
            'norm' => 'required|max:10',
            'namapasien' => 'nullable|max:50',
            'alamat' => 'nullable|max:40',
            'jeniskelamin' => 'nullable|max:30',
            'idkota' => 'nullable|max:100',
            'tptlahir' => 'nullable|max:50',
            'tgllahir' => 'nullable|max:50',
            'notelp' => 'nullable|max:30',
            'agama' => 'nullable|max:50',
            'goldarah' => 'nullable|max:50',
            'statuskawin' => 'nullable|max:50',
            'pekerjaan' => 'nullable|max:50',
            'namaayah' => 'nullable|max:50',
            'tglawal' => 'nullable|max:50',
            'tglakhir' => 'nullable|max:50',
            'penanggungjawab' => 'nullable|max:50',
            'statuskeluarga' => 'nullable|max:50',
            'alergi' => 'nullable|max:50',
            'riwayatpenyakit' => 'nullable|max:50',
            'nonaktif' => 'nullable|',
            'iduser' => 'nullable|max:50',
            'namaibu' => 'nullable|max:50',
            'namapasangan' => 'nullable|max:50',
            'saldodeposit' => 'nullable',
            'kartu_bpjs' => 'required|max:50',
            'telepon' => 'nullable',
            'statusalergi' => 'required|max:50',
            'updateonline' => 'nullable|max:50',
            'keanggotaan1' => 'nullable|max:50',
            'keanggotaan2' => 'nullable|max:50',
            'keanggotaan3' => 'nullable|max:50',
            'tkeanggotaan1' => 'nullable',
            'tkeanggotaan2' => 'nullable',
            'tkeanggotaan3' => 'nullable',
            'diagnosa1' => 'nullable',
            'diagnosa2' => 'nullable',
            'diagnosa3' => 'nullable',
            'jenisalergi' => 'nullable',
            'keterangan' => 'nullable',
        ], $messages);

        $data = Pasien::find($norm);
        $data->namapasien = $request->namapasien;
        $data->jeniskelamin = $request->jeniskelamin;
        $data->alamat = $request->alamat;
        $data->idkota = $request->idkota;
        $data->tptlahir = $request->tptlahir;
        $data->tgllahir = $request->tgllahir;
        $data->notelp = $request->notelp;
        $data->agama = $request->agama;
        $data->goldarah = $request->goldarah;
        $data->statuskawin = $request->statuskawin;
        $data->pekerjaan = $request->pekerjaan;
        $data->namaayah = $request->namaayah;
        $data->tglawal = null;
        $data->tglakhir = null;
        $data->penanggungjawab = $request->penanggungjawab;
        $data->statuskeluarga = $request->statuskeluarga;
        $data->alergi = $request->jenisalergi . ", " . $request->keterangan;
        $data->riwayatpenyakit = $request->riwayatpenyakit;

        if ($request->nonaktif == null) {
            $data->nonaktif = 0;
        } else {
            $data->nonaktif = $request->nonaktif;
        }

        $data->iduser = null;
        $data->namaibu = $request->namaibu;
        $data->namapasangan = $request->namapasangan;
        $data->saldodeposit = null;
        $data->kartu_bpjs = $request->kartu_bpjs;
        $data->telepon = null;
        $data->statusalergi = $request->statusalergi;
        $data->updateonline = 1;

        if ($request->keanggotaan1 == null) {
            $data->keanggotaan1 = 0;
        } else {
            $data->keanggotaan1 = $request->keanggotaan1;
        }

        if ($request->keanggotaan2 == null) {
            $data->keanggotaan2 = 0;
        } else {
            $data->keanggotaan2 = $request->keanggotaan2;
        }

        if ($request->keanggotaan3 == null) {
            $data->keanggotaan3 = 0;
        } else {
            $data->keanggotaan3 = $request->keanggotaan3;
        }
        $data->tkeanggotaan1 = $request->tkeanggotaan1;
        $data->tkeanggotaan2 = $request->tkeanggotaan2;
        $data->tkeanggotaan3 = $request->tkeanggotaan3;
        $data->diagnosa1 = $request->diagnosa1;
        $data->diagnosa2 = $request->diagnosa2;
        $data->diagnosa3 = $request->diagnosa3;
        $data->save();

        $alergi = Pasien_alergi::find($norm);
        $alergi->jenisalergi = $request->jenisalergi;
        $alergi->keterangan = $request->keterangan;
        $alergi->save();

        return redirect('/Pasien')->with('alert-success', 'Data berhasil diubah!');
    }

    public function hapus($norm)
    {
        $datas = Pasien::find($norm);
        $datas->delete();

        $alergi = Pasien_alergi::find($norm);
        $alergi->delete();

        return redirect('/Pasien')->with('alert-success', 'Data berhasil dihapus!');
    }
}