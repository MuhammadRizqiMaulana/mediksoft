<?php

namespace App\Http\Controllers\AksesPengguna;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function index(){
        return view('AksesPengguna/Content/Login');
    }

    public function username()
    {
        return 'uname';
    }

    //protected function credentials(Request $request)
    //{
    //    return $request->only($this->username(), 'uname');
    //}

    public function postlogin(Request $request){
        
        $messages = [
            'required' => ':attribute masih kosong',
            'min' => ':attribute diisi minimal :min karakter',
            'max' => ':attribute diisi maksimal :max karakter',
            'numeric' => ':attribute harus berupa angka',
            'unique' => ':attribute sudah ada',

        ];

        $this->validate($request, [

            'uname' => 'required|string',
            'pwd' => 'required|string',
        ], $messages);

        //$request->validate([
          //  $this->username() => 'required|string',
            //'uname' => 'required|string',
        //]);

        $credentials = $request->only('uname', 'pwd');
        if(Auth::attempt($credentials)){
            $user = User::where('uname', $request->uname)->first();
            if ($user->aktif == 1) {
                return redirect('/')->with('alert-success', 'Berhasil Login!');
            }
            return redirect("/Login")->with('alert-danger', 'Akun anda belum aktif!');
        }
        return redirect("/Login")->with('alert-danger', 'Username atau Password salah!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/Login')->with('alert-success', 'Anda Berhasil Logout!');
    }
}
