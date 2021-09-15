<?php

namespace App\Http\Controllers\Setup;

use App\Http\Controllers\Controller;
use App\Models\Dokter;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    public function index()
    {

        $datas = Dokter::all();
        return view('Setup.Content.Dokter', compact('datas'));
    }
    public function tambah()
    {

        $datas = Dokter::all();

        return view('Setup.Content.Dokter', compact('datas'));
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
            'nama' => 'required|max:200',
            'alamat' => 'required|max:200',
            'jeniskelamin' => 'required|max:10',
            'telepon' => 'required|max:13',
            'jenisdokter' => 'required|max:200',
            'tgl_aktif' => 'required|max:13',
            'img' => 'nullable|image',
            'nikd' => 'required|max:13',
        ], $messages);
        
        if (isset($request->img)) {
            $file = $request->file('img'); // menyimpan data gambar yang diupload ke variabel $file
            $nama_file = time()."_".$file->getClientOriginalName();
            $file->move('images/Ttd_Dokter',$nama_file); // isi dengan nama folder tempat kemana file diupload
        }
        
        $invoice = Dokter::selectRaw('LPAD(CONVERT(COUNT("iddokter") , char(5)) , 5,"0") as invoice')->first();

        $data = new Dokter();
        $data->iddokter = $invoice->invoice;
        $data->nama = $request->nama;
        $data->alamat = $request->alamat;
        $data->jeniskelamin = $request->jeniskelamin;
        $data->telepon = $request->telepon;
        $data->jenisdokter = $request->jenisdokter;
        $data->tgl_aktif = $request->tgl_aktif;
        $data->nikd = $request->nikd;
        if ($request->img == null) {
            $data->img = $data->img;
        }else{
            $data->img = $nama_file;
        }
        
        $data->save();

        return redirect('/Dokter')->with('alert-success', 'Data berhasil ditambahkan!');
    }
    public function ubah($iddokter)
    {
        $datas = Dokter::all();
        $ubah = Dokter::find($iddokter);
        return view('Setup.Content.Dokter', compact('datas', 'ubah'));
    }
    public function update($iddokter, Request $request)
    {

        $messages = [
            'required' => ':attribute masih kosong',
            'min' => ':attribute diisi minimal :min karakter',
            'max' => ':attribute diisi maksimal :max karakter',
            'unique' => ':attribute sudah ada',

        ];

        $this->validate($request, [

            'nama' => 'required|max:200',
            'alamat' => 'required|max:200',
            'jeniskelamin' => 'required|max:10',
            'telepon' => 'required|max:13',
            'jenisdokter' => 'required|max:200',
            'tgl_aktif' => 'required|max:13',
            'img' => 'nullable|image',
            'nikd' => 'required|max:13',
        ], $messages);

        $data = Dokter::find($iddokter);
        $data->nama = $request->nama;
        $data->alamat = $request->alamat;
        $data->jeniskelamin = $request->jeniskelamin;
        $data->telepon = $request->telepon;
        $data->jenisdokter = $request->jenisdokter;
        $data->tgl_aktif = $request->tgl_aktif;
        $data->img = $request->img;
        $data->nikd = $request->nikd;
        $data->save();
        return redirect('/Dokter')->with('alert-success', 'Data berhasil diubah!');
    }
    public function hapus($iddokter)
    {
        $datas = Dokter::find($iddokter);
        $datas->delete();
        return redirect('/Dokter')->with('alert-success', 'Data berhasil dihapus!');
    }
}