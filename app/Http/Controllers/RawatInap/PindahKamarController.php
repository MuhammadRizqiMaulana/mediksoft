<?php

namespace App\Http\Controllers\RawatInap;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pasien;
use App\Models\Kamar;
use App\Models\Rawatinap;
use App\Models\Kamarkosong_temp;
use App\Models\Kamar_terisi;

class PindahKamarController extends Controller
{
    public function index()
    {
        $kamar = Kamar::all();
        $pasien = Pasien::all();
        $rawatinap = Rawatinap::all();
        return view('RawatInap.Content.PindahKamar', compact('pasien', 'kamar', 'rawatinap'));
    }

    public function selectfakturri($faktur_rawatinap)
    {
        $kamar = Kamar::all();
        $pasien = Pasien::all();
        $rawatinap = Rawatinap::all();
        $selectrawatinap = Rawatinap::find($faktur_rawatinap);
        $selectkamar = Kamar::find($selectrawatinap->kodekamar);
        return view('RawatInap.Content.PindahKamar', compact('pasien', 'kamar', 'rawatinap', 'selectrawatinap', 'selectkamar'));
    }
    public function update($faktur_rawatinap, Request $request)
    {
        $messages = [
            'required' => ':attribute masih kosong',
            'min' => ':attribute diisi minimal :min karakter',
            'max' => ':attribute diisi maksimal :max karakter',
            'numeric' => ':attribute harus berupa angka',
            'unique' => ':attribute sudah ada',
            'email' => ':attribute harus berupa email',
            'image' => ':attribute harus berupa gambar',
            'between' => ':attribute diisi antara 0 sampai XXXXXXXX.XXXX digit',
            'min' => ':attribute tidak boleh kurang dari 0',
        ];

        $this->validate($request, [
            'kodekamar' => 'required|max:10',
        ], $messages);

        try {
            $rawatinap = Rawatinap::find($faktur_rawatinap); //mencari data rawatinap

            $kamarlama = $rawatinap->kodekamar; //mengambil kodekamar kamar lama

            //menambahkan kembali sisa kamar pada kamar lama di kamar_kosong 
            $kamarkosong = Kamarkosong_temp::find($kamarlama);
            $kamarkosong->sisakamar = $kamarkosong->sisakamar + 1; //menambahkan kembali kamar kosong
            $kamarkosong->save();

            //mengurangi sisa kamar pada kamar baru di kamar_kosong
            $kamarkosong = Kamarkosong_temp::find($request->kodekamar);
            $kamarkosong->sisakamar = $kamarkosong->sisakamar - 1; //mengurangi kamar kosong
            $kamarkosong->save();

            //mengubah kamar_terisi
            $kamarterisi = Kamar_terisi::find($faktur_rawatinap);
            $kamarterisi->kodekamar = $request->kodekamar;
            $kamarterisi->save();

            //ubah data kamar pada rawatinap
            $rawatinap->kodekamar = $request->kodekamar;
            $rawatinap->save(); //ubah rawatinap

            return redirect('/PindahKamar')->with('alert-success', 'Pindah Kamar berhasil diubah!');
        } catch (\Exception $e) {
            // do task when error
            return redirect('/PindahKamar')->with('alert-danger', 'Pindah Kamar gagal diubah!');
        }
    }
}