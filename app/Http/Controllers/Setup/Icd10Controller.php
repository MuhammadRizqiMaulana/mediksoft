<?php

namespace App\Http\Controllers\Setup;

use App\Http\Controllers\Controller;
use App\Models\Icd10_stp;
use Illuminate\Http\Request;
use App\Models\Icd10;
use App\Models\Icd10_mordibitas;

class Icd10Controller extends Controller
{
    public function index()
    {

        $datas = Icd10::all();
        $icd10_mordibitas = Icd10_mordibitas::all();
        $icd10_stp = Icd10_stp::all();
        return view('Setup.Content.Icd10', compact('datas', 'icd10_mordibitas', 'icd10_stp'));
    }
    public function cetakdataicd10()
    {

        $datas = Icd10::all();

        return view('Setup.Cetak.Cetak_Icd10', compact('datas'));
    }

    public function store(Request $request)
    {

        $messages = [
            'required' => ':attribute masih kosong',
            'min' => ':attribute diisi minimal :min karakter',
            'max' => ':attribute diisi maksimal :max karakter',
            'numeric' => ':attribute harus berupa angka',
            'unique' => ':attribute sudah ada',

        ];

        $this->validate($request, [
            'nama' => 'required|max:200',
            'alamat' => 'nullable',
            'idmordibitas' => 'nullable',
            'severity' => 'nullable',
            'idstp' => 'nullable',

        ], $messages);
    }
    public function ubah($kode)
    {
        $datas = Icd10::all();
        $ubah = Icd10::find($kode);
        $icd10_mordibitas = Icd10_mordibitas::all();
        $icd10_stp = Icd10_stp::all();
        return view('Setup.Content.Icd10', compact('datas', 'ubah', 'icd10_mordibitas', 'icd10_stp'));
    }
    public function update($kode, Request $request)
    {

        $messages = [
            'required' => ':attribute masih kosong',
            'min' => ':attribute diisi minimal :min karakter',
            'max' => ':attribute diisi maksimal :max karakter',
            'unique' => ':attribute sudah ada',

        ];

        $this->validate($request, [

            'nama' => 'required|max:200',
            'alamat' => 'nullable',
            'idmordibitas' => 'nullable',
            'severity' => 'nullable',
            'idstp' => 'nullable',
        ], $messages);

        $data = Icd10::find($kode);
        $data->nama = $request->nama;
        $data->alamat = $request->alamat;
        $data->idmordibitas = $request->idmordibitas;
        $data->severity = $request->severity;
        $data->idstp = $request->idstp;
        $data->save();
        return redirect('/Icd10')->with('alert-success', 'Data berhasil diubah!');
    }
    public function hapus($kode)
    {
        $datas = Icd10::find($kode);
        $datas->delete();
        return redirect('/Icd10')->with('alert-success', 'Data berhasil dihapus!');
    }
}