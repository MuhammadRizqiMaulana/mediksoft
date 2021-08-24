<?php

namespace App\Http\Controllers\Setup;

use App\Http\Controllers\Controller;
use App\Models\Jabatan;
use Illuminate\Http\Request;
use Carbon\Carbon;

class JabatanController extends Controller
{
    public function index()
    {

        $datas = Jabatan::all();
        return view('Setup.Content.Jabatan', compact('datas'));
    }
    public function tambah()
    {

        $datas = Jabatan::all();

        return view('Setup.Content.Jabatan', compact('datas'));
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

            'nama' => 'required|max:50',
            'tgledit' => 'nullable',
            'medika' => 'nullable',
            'labrad' => 'nullable',
            'apotek' => 'nullable',
            'admin' => 'nullable',
            'prepay' => 'nullable',
        ], $messages);

        $now = Carbon::now();
        $data = new Jabatan();
        $data->nama = $request->nama;
        $data->tgledit = $now;
        if ($request->medika == null) {
            $data->medika = 0;
        } else {
            $data->medika = $request->medika;
        }
        if ($request->labrad == null) {
            $data->labrad = 0;
        } else {
            $data->labrad = $request->labrad;
        }
        if ($request->apotek == null) {
            $data->apotek = 0;
        } else {
            $data->apotek = $request->apotek;
        }
        if ($request->admin == null) {
            $data->admin = 0;
        } else {
            $data->admin = $request->admin;
        }
        if ($request->prepay == null) {
            $data->prepay = 0;
        } else {
            $data->prepay = $request->prepay;
        }
        $data->save();

        return redirect('/Jabatan')->with('alert-success', 'Data berhasil ditambahkan!');
    }
    public function ubah($id)
    {
        $datas = Jabatan::all();
        $ubah = Jabatan::find($id);
        return view('Setup.Content.Jabatan', compact('datas', 'ubah'));
    }
    public function update($id, Request $request)
    {

        $messages = [
            'required' => ':attribute masih kosong',
            'min' => ':attribute diisi minimal :min karakter',
            'max' => ':attribute diisi maksimal :max karakter',
            'unique' => ':attribute sudah ada',

        ];

        $this->validate($request, [
            'nama' => 'required|max:50',
            'tgledit' => 'nullable',
            'medika' => 'nullable',
            'labrad' => 'nullable',
            'apotek' => 'nullable',
            'admin' => 'nullable',
            'prepay' => 'nullable',
        ], $messages);

        $now = Carbon::now();
        $data = new Jabatan();
        $data->nama = $request->nama;
        $data->tgledit = $now;
        if ($request->medika == null) {
            $data->medika = 0;
        } else {
            $data->medika = $request->medika;
        }
        if ($request->labrad == null) {
            $data->labrad = 0;
        } else {
            $data->labrad = $request->labrad;
        }
        if ($request->apotek == null) {
            $data->apotek = 0;
        } else {
            $data->apotek = $request->apotek;
        }
        if ($request->admin == null) {
            $data->admin = 0;
        } else {
            $data->admin = $request->admin;
        }
        if ($request->prepay == null) {
            $data->prepay = 0;
        } else {
            $data->prepay = $request->prepay;
        }
        $data->save();
        return redirect('/Jabatan')->with('alert-success', 'Data berhasil diubah!');
    }
    public function hapus($id)
    {
        $datas = Jabatan::find($id);
        $datas->delete();
        return redirect('/Jabatan')->with('alert-success', 'Data berhasil dihapus!');
    }
}