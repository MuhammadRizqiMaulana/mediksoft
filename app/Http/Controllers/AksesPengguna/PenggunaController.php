<?php

namespace App\Http\Controllers\AksesPengguna;

use App\Http\Controllers\Controller;
use App\Models\Karyawan;
use App\Models\User;
use App\Models\User_level;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    public function index()
    {

        $datas = User::all();
        $karyawan = Karyawan::all();
        $user_level = User_level::all();

        return view('AksesPengguna.Content.Pengguna', compact('datas', 'karyawan', 'user_level'));
    }
    public function tambah()
    {

        $datas = User::all();
        $karyawan = Karyawan::all();
        $user_level = User_level::all();

        return view('AksesPengguna.Content.Pengguna', compact('datas', 'karyawan', 'user_level'));
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

            'uname' => 'required|max:50|unique:user',
            'nama' => 'required|max:50',
            'idkaryawan' => 'required|max:50',
            'pwd' => 'required|max:60',
            'idlevel' => 'required|max:50',
            'aktif' => 'nullable',

        ], $messages);

        $data = new User();

        $data->uname = $request->uname;
        $data->nama = $request->nama;
        $data->idkaryawan = $request->idkaryawan;
        $data->pwd = Hash::make($request->newPwd);
        $data->idlevel = $request->idlevel;
        $data->aktif = $request->aktif;
        $data->save();

        return redirect('/Pengguna')->with('alert-success', 'Data berhasil ditambahkan!');
    }
    public function ubah($iduser)
    {
        $datas = User::all();
        $ubah = User::find($iduser);
        $karyawan = Karyawan::all();
        $user_level = User_level::all();
        return view('AksesPengguna.Content.Pengguna', compact('datas', 'ubah', 'karyawan', 'user_level'));
    }
    public function update($iduser, Request $request)
    {

        $messages = [
            'required' => ':attribute masih kosong',
            'min' => ':attribute diisi minimal :min karakter',
            'max' => ':attribute diisi maksimal :max karakter',
            'unique' => ':attribute sudah ada',

        ];

        $this->validate($request, [

            'uname' => 'required|max:50',
            'nama' => 'required|max:50',
            'idkaryawan' => 'required|max:50',
            'pwd' => 'nullable|max:60',
            'idlevel' => 'required|max:50',
            'aktif' => 'nullable',
        ], $messages);

        $data = User::find($iduser);
        $data->uname = $request->uname;
        $data->nama = $request->nama;
        $data->idkaryawan = $request->idkaryawan;
        $data->pwd = Hash::make($request->pwd);
        $data->idlevel = $request->idlevel;
        $data->aktif = $request->aktif;
        if ($request->pwd == null) {
            $data->pwd = $data->pwd;
        } else {
            $data->pwd = $request->pwd;
        }
        $data->save();
        return redirect('/Pengguna')->with('alert-success', 'Data berhasil diubah!');
    }
    public function hapus($iduser)
    {
        $datas = User::find($iduser);
        $datas->delete();
        return redirect('/Pengguna')->with('alert-success', 'Data berhasil dihapus!');
    }
}