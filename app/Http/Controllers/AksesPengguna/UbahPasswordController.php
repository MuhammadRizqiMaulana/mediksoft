<?php

namespace App\Http\Controllers\AksesPengguna;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UbahPasswordController extends Controller
{
    public function index()
    {
        return view('AksesPengguna/Content/UbahPassword');
    }

    public function ubah($iduser)
    {
        $datas = User::all();
        $ubah = User::find($iduser);
        return view('AksesPengguna.Content.UbahPassword', compact('datas', 'ubah'));
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

            'pwd' => 'required|max:50',

        ], $messages);

        $data = User::find($iduser);
        $data->pwd = bcrypt($request->pwd);

        $data->save();
        return redirect('/Logout')->with('alert-danger', 'Password berhasil diubah. Silahkan Login Kembali!');
    }
}