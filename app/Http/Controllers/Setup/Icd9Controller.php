<?php

namespace App\Http\Controllers\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Icd9;

class Icd9Controller extends Controller
{
    public function index()
    {

        $datas = Icd9::all();
        return view('Setup.Content.Icd9', compact('datas'));
    }
    public function cetakdataicd9()
    {

        $datas = Icd9::all();

        return view('Setup.Cetak.Cetak_Icd9', compact('datas'));
    }
    public function tambah()
    {

        $datas = Icd9::all();

        return view('Setup.Content.Icd9', compact('datas'));
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
            'kode' => 'required|max:50',
            'nama' => 'nullable',

        ], $messages);
        $data = new Icd9();
        $data->kode = $request->kode;
        $data->nama = $request->nama;

        $data->save();

        return redirect('/Icd9')->with('alert-success', 'Data berhasil ditambahkan!');
    }
    public function ubah($kode)
    {
        $datas = Icd9::all();
        $ubah = Icd9::find($kode);
        return view('Setup.Content.Icd9', compact('datas', 'ubah'));
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

            'nama' => 'nullable',

        ], $messages);

        $data = Icd9::find($kode);
        $data->nama = $request->nama;
        $data->save();
        return redirect('/Icd9')->with('alert-success', 'Data berhasil diubah!');
    }
    public function hapus($kode)
    {
        $datas = Icd9::find($kode);
        $datas->delete();
        return redirect('/Icd9')->with('alert-success', 'Data berhasil dihapus!');
    }
}