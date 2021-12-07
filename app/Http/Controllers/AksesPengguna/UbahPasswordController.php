<?php

namespace App\Http\Controllers\AksesPengguna;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Session;
use Illuminate\Support\Facades\Auth;
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
            'pwdlama' => 'required',
            'pwdbaru' => 'required',
            'ulangpwdbaru' => 'required',
        ]);

        $hashedPassword = Auth::user()->pwd;
        if (Hash::check($request->pwdlama, $hashedPassword)) {
            $users = User::find(Auth::user()->iduser);
            $users->pwd = bcrypt($request->pwdbaru);
            $users->save();
            //session()->flash('message', 'password updated successfully');
            return redirect('/Login')->with('alert-success', 'Password berhasil diganti, silahkan Login kembali!');
        } else {
            //session()->flash('message', 'kata sandi lama tidak cocok');
            return redirect()->back()->with('alert-danger', 'kata sandi lama tidak cocok');
        }
    }
}