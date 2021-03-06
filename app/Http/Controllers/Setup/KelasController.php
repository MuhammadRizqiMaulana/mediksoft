<?php

namespace App\Http\Controllers\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kelas;

class KelasController extends Controller
{
    public function index()
    {

        $datas = Kelas::all();
        return view('Setup.Content.Kelas', compact('datas'));
    }
    public function cetakdatakelas()
    {

        $datas = Kelas::all();

        return view('Setup.Cetak.Cetak_Kelas', compact('datas'));
    }
    public function tambah()
    {

        $datas = Kelas::all();

        return view('Setup.Content.Kelas', compact('datas'));
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
            'kodekelas' => 'required|max:50',
            'nama' => 'required|max:200',
        ], $messages);

        $data = new kelas();
        $data->kodekelas = $request->kodekelas;
        $data->nama = $request->nama;
        $data->save();

        return redirect('/Kelas')->with('alert-success', 'Data berhasil ditambahkan!');
    }
    public function ubah($kodekelas)
    {
        $datas = Kelas::all();
        $ubah = Kelas::find($kodekelas);
        return view('Setup.Content.Kelas', compact('datas', 'ubah'));
    }
    public function update($kodekelas, Request $request)
    {

        $messages = [
            'required' => ':attribute masih kosong',
            'min' => ':attribute diisi minimal :min karakter',
            'max' => ':attribute diisi maksimal :max karakter',
            'unique' => ':attribute sudah ada',

        ];

        $this->validate($request, [

            'nama' => 'required',
        ], $messages);

        $data = Kelas::find($kodekelas);

        $data->nama = $request->nama;
        $data->save();
        return redirect('/Kelas')->with('alert-success', 'Data berhasil diubah!');
    }
    public function hapus($kodekelas)
    {
        $datas = Kelas::find($kodekelas);
        $datas->delete();
        return redirect('/Kelas')->with('alert-success', 'Data berhasil dihapus!');
    }
}