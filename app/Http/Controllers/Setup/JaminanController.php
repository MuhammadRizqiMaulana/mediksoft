<?php

namespace App\Http\Controllers\Setup;

use App\Http\Controllers\Controller;
use App\Models\Perusahaan;
use App\Models\Perusahaankategori;
use Illuminate\Http\Request;

class JaminanController extends Controller
{
    public function index()
    {

        $datas = Perusahaan::all();
        $idkategori = Perusahaankategori::all();

        return view('Setup.Content.Jaminan', compact('datas', 'idkategori'));
    }
    public function cetakdatajaminan()
    {

        $datas = Perusahaan::all();

        return view('Setup.Cetak.Cetak_Jaminan', compact('datas'));
    }
    public function tambah()
    {

        $datas = Perusahaan::all();

        return view('Setup.Content.Jaminan', compact('datas'));
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

            'namaprsh' => 'required|max:50',
            'alamatprsh' => 'required|max:50',
            'telp' => 'nullable',
            'jenisprsh' => 'nullable',
            'kontak' => 'nullable',
            'expired' => 'required|max:50',
            'idkategori' => 'nullable',
        ], $messages);

        $data = new Perusahaan();

        $data->namaprsh = $request->namaprsh;
        $data->alamatprsh = $request->alamatprsh;
        $data->telp = $request->telp;
        $data->jenisprsh = $request->jenisprsh;
        $data->kontak = $request->kontak;
        $data->expired = $request->expired;
        $data->idkategori = $request->idkategori;
        $data->save();

        return redirect('/Jaminan')->with('alert-success', 'Data berhasil ditambahkan!');
    }
    public function ubah($idprsh)
    {
        $datas = Perusahaan::all();
        $ubah = Perusahaan::find($idprsh);
        $idkategori = Perusahaankategori::all();
        return view('Setup.Content.Jaminan', compact('datas', 'ubah', 'idkategori'));
    }
    public function update($idprsh, Request $request)
    {

        $messages = [
            'required' => ':attribute masih kosong',
            'min' => ':attribute diisi minimal :min karakter',
            'max' => ':attribute diisi maksimal :max karakter',
            'unique' => ':attribute sudah ada',

        ];

        $this->validate($request, [

            'namaprsh' => 'required|max:50',
            'alamatprsh' => 'required|max:50',
            'telp' => 'nullable',
            'jenisprsh' => 'nullable',
            'kontak' => 'nullable',
            'expired' => 'required|max:50',
            'idkategori' => 'nullable',
        ], $messages);

        $data = Perusahaan::find($idprsh);
        $data->namaprsh = $request->namaprsh;
        $data->alamatprsh = $request->alamatprsh;
        $data->telp = $request->telp;
        $data->jenisprsh = $request->jenisprsh;
        $data->kontak = $request->kontak;
        $data->expired = $request->expired;
        $data->idkategori = $request->idkategori;
        $data->save();
        return redirect('/Jaminan')->with('alert-success', 'Data berhasil diubah!');
    }
    public function hapus($idprsh)
    {
        $datas = Perusahaan::find($idprsh);
        $datas->delete();
        return redirect('/Jaminan')->with('alert-success', 'Data berhasil dihapus!');
    }
}