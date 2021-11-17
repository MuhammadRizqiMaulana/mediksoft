<?php

namespace App\Http\Controllers\Operasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tarif_dokter_bedah;
use App\Models\Dokter;
use Illuminate\Support\Facades\DB;

class DokterBedahController extends Controller
{
    public function index()
    {

        $dokter = Dokter::all();
        $datas = Tarif_dokter_bedah::all();
        return view('Operasi.Content.DokterBedah', compact('dokter', 'datas'));
    }

    public function tambah()
    {

        $datas = Dokter::all();

        return view('Operasi.Content.DokterBedah', compact('datas'));
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
            'iddokter' => 'required|max:30',
            'jenisrawat' => 'required|max:30',

        ], $messages);


        $data = new Tarif_dokter_bedah();
        $data->iddokter = $request->iddokter;
        $data->jenisrawat = $request->jenisrawat;
        $data->save();

        return redirect('/DokterBedah')->with('alert-success', 'Data berhasil ditambahkan!');
    }

    public function ubah($iddokter, $jenisrawat)
    {
        $dokter = Dokter::all();
        $ubah = Tarif_dokter_bedah::where('iddokter', $iddokter)->where('jenisrawat', $jenisrawat)->first();
        $datas = Tarif_dokter_bedah::all();
        return view('Operasi.Content.DokterBedah', compact('dokter', 'ubah', 'datas'));
    }

    public function update($iddokter, $jenisrawat, Request $request)
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

            'iddokter' => 'required|max:30',
            'jenisrawat' => 'required|max:30',
        ], $messages);

        DB::table('tarif_dokter_bedah')->where('iddokter', $iddokter)->where('jenisrawat', $jenisrawat)->update([
            'iddokter' => $request->iddokter,
            'jenisrawat' => $request->jenisrawat,
        ]);

        return redirect('/DokterBedah')->with('alert-success', 'Data berhasil diubah!');
    }

    public function hapus($iddokter, $jenisrawat)
    {

        DB::table('tarif_dokter_bedah')->where('iddokter', $iddokter)->where('jenisrawat', $jenisrawat)->delete();

        return redirect('/DokterBedah')->with('alert-success', 'Data berhasil dihapus!');
    }
}