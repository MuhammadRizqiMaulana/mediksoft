<?php

namespace App\Http\Controllers\Setup;

use App\Http\Controllers\Controller;
use App\Models\Adm;
use Illuminate\Http\Request;

class AdministrasiController extends Controller
{
    public function index()
    {

        $adm = Adm::all();
        return view('Setup.Content.Administrasi', compact('adm'));
    }

    public function ubah($idadm)
    {
        $adm = Adm::all();
        $ubah = Adm::find($idadm);
        return view('Setup.Content.Administrasi', compact('adm', 'ubah'));
    }
    public function update($idadm, Request $request)
    {

        $messages = [
            'required' => ':attribute masih kosong',
            'min' => ':attribute diisi minimal :min karakter',
            'max' => ':attribute diisi maksimal :max karakter',
            'unique' => ':attribute sudah ada',

        ];

        $this->validate($request, [
            'ubahtarif' => 'required|numeric|between:0.0000,99999999.9999|min:0',
        ], $messages);

        $data = Adm::find($idadm);
        $data->tarif = $request->ubahtarif;

        $data->save();
        return redirect('/Administrasi')->with('alert-success', 'Data berhasil diubah!');
    }
    public function hapus($idadm)
    {
        $adm = Adm::find($idadm);
        $adm->delete();
        return redirect('/Administrasi')->with('alert-success', 'Data berhasil dihapus!');
    }
}