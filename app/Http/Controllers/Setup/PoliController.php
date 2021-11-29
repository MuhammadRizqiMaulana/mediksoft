<?php

namespace App\Http\Controllers\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Poliklinik;


class PoliController extends Controller
{
    public function index()
    {

        $datas = Poliklinik::all();
        return view('Setup.Content.Poli', compact('datas'));
    }
    public function cetakdatapoli()
    {

        $datas = Poliklinik::all();

        return view('Setup.Cetak.Cetak_Poli', compact('datas'));
    }
    public function tambah()
    {

        $datas = Poliklinik::all();

        return view('Setup.Content.Poli', compact('datas'));
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
            'nama' => 'required|max:200',
            'jenispoli' => 'required',
        ], $messages);

        $data = new Poliklinik();
        $data->kode = $request->kode;
        $data->nama = $request->nama;
        $data->jenispoli = $request->jenispoli;
        $data->save();

        return redirect('/Poli')->with('alert-success', 'Data berhasil ditambahkan!');
    }
    public function ubah($kode)
    {
        $datas = Poliklinik::all();
        $ubah = Poliklinik::find($kode);
        return view('Setup.Content.Poli', compact('datas', 'ubah'));
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
            'jenispoli' => 'required',
        ], $messages);

        $data = Poliklinik::find($kode);

        $data->nama = $request->nama;
        $data->jenispoli = $request->jenispoli;
        $data->save();
        return redirect('/Poli')->with('alert-success', 'Data berhasil diubah!');
    }
    public function hapus($kode)
    {
        $datas = Poliklinik::find($kode);
        $datas->delete();
        return redirect('/Poli')->with('alert-success', 'Data berhasil dihapus!');
    }
}