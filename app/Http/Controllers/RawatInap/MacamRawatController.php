<?php

namespace App\Http\Controllers\RawatInap;

use App\Http\Controllers\Controller;
use App\Models\Macamrawat;
use Illuminate\Http\Request;

class MacamRawatController extends Controller
{
    public function index()
    {

        $datas = MacamRawat::all();
        return view('RawatInap.Content.MacamRawat', compact('datas'));
    }
    public function tambah()
    {

        $datas = MacamRawat::all();

        return view('RawatInap.Content.MacamRawat', compact('datas'));
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
            'kode' => 'required|max:2',
            'macamrawat' => 'required|max:20',
        ], $messages);

        $data = new MacamRawat();
        $data->kode = $request->kode;
        $data->macamrawat = $request->macamrawat;
        $data->save();

        return redirect('/MacamRawat')->with('alert-success', 'Data berhasil ditambahkan!');
    }
    public function ubah($kode)
    {
        $datas = MacamRawat::all();
        $ubah = MacamRawat::find($kode);
        return view('RawatInap.Content.MacamRawat', compact('datas', 'ubah'));
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
            'macamrawat' => 'required|max:20',
        ], $messages);

        $data = MacamRawat::find($kode);

        $data->macamrawat = $request->macamrawat;
        $data->save();
        return redirect('/MacamRawat')->with('alert-success', 'Data berhasil diubah!');
    }
    public function hapus($kode)
    {
        $datas = MacamRawat::find($kode);
        $datas->delete();
        return redirect('/MacamRawat')->with('alert-success', 'Data berhasil dihapus!');
    }
}