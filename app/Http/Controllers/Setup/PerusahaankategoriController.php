<?php

namespace App\Http\Controllers\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Perusahaankategori;

class PerusahaankategoriController extends Controller
{
    public function index()
    {

        $datas = Perusahaankategori::all();

        return view('Setup.Content.Perusahaankategori', compact('datas'));
    }
    public function tambah()
    {

        $datas = Perusahaankategori::all();

        return view('Setup.Content.Perusahaankategori', compact('datas'));
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
            'idkategori' => 'required|max:5',
            'namakategori' => 'required|max:50',
        ], $messages);

        $data = new Perusahaankategori();
        $data->idkategori = $request->idkategori;
        $data->namakategori = $request->namakategori;
        $data->save();

        return redirect('/Perusahaankategori')->with('alert-success', 'Data berhasil ditambahkan!');
    }
    public function ubah($idkategori)
    {
        $datas = Perusahaankategori::all();
        $ubah = Perusahaankategori::find($idkategori);
        return view('Setup.Content.Perusahaankategori', compact('datas', 'ubah'));
    }
    public function update($idkategori, Request $request)
    {

        $messages = [
            'required' => ':attribute masih kosong',
            'min' => ':attribute diisi minimal :min karakter',
            'max' => ':attribute diisi maksimal :max karakter',
            'unique' => ':attribute sudah ada',

        ];

        $this->validate($request, [
            'namakategori' => 'required|max:50',
        ], $messages);

        $data = Perusahaankategori::find($idkategori);
        $data->namakategori = $request->namakategori;
        $data->save();
        return redirect('/Perusahaankategori')->with('alert-success', 'Data berhasil diubah!');
    }
    public function hapus($idkategori)
    {
        $datas = Perusahaankategori::find($idkategori);
        $datas->delete();
        return redirect('/Perusahaankategori')->with('alert-success', 'Data berhasil dihapus!');
    }
}