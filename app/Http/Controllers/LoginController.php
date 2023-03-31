<?php

namespace App\Http\Controllers;

use App\Models\ModelLogin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Kyslik\ColumnSortable\Sortable;

class LoginController extends Controller
{
    public function index()
    {
        if ($user = Auth::user()) {
            if ($user->level == '1') {
                return redirect()->intended('mobil/index');
            } elseif ($user->level == '2') {
                return redirect()->intended('/frontend/homepage');
            }
        }

        // if (Auth::user()) {
        //     return redirect()->intended('home');
        // }

        return View('login.view_login');
    }

    public function proses(Request $request)
    {
        $request->validate(
            [
                'username' => 'required',
                'password' => 'required'
            ],
            [
                'username.required' => 'Username tidak boleh Kosong',
                'password.required' => 'Password tidak boleh Kosong',
            ]

        );

        $kredensial = $request->only('username', 'password');
        if (Auth::attempt($kredensial)) {
            $request->session()->regenerate();
            $user = Auth::user();
            if ($user->level == '1') {
                return redirect()->intended('/mobil/index');
            } elseif ($user->level == '2') {
                return redirect()->intended('/frontend/homepage');
            }

            // if ($user) {
            //     return redirect()->intended('/home');
            // }
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'username' => 'Maaf username dan password anda salah',
        ])->onlyInput('username');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }


    public function add()
    {
        return View('login.formdaftar');
    }

    public function save(Request $user)
    {
        $name = $user->name;
        $email = $user->email;
        $username = $user->username;
        $password = $user->password;
        $no_hp = $user->no_hp;
        $alamat = $user->alamat;

        $validateData = $user->validate(
            [
                'name' => 'required',
                'email' => 'required|unique:users,email',
                'username' => 'required|unique:users,username',
                'password' => 'required',
                'no_hp' => 'required|unique:users,no_hp',
                'alamat' => 'required',
            ],
            [
                'name.required' => 'Nama tidak boleh kosong',
                'email.required' => 'Email tidak boleh kosong',
                'username.required' => 'Username tidak boleh kosong',
                'password.required' => 'Password tidak boleh kosong',
                'no_hp.required' => 'No Hp tidak boleh kosong',
                'alamat.required' => 'Alamat tidak boleh kosong',
            ]
        );

        $daftar = new ModelLogin();
        $daftar->name = $name;
        $daftar->email = $email;
        $daftar->username = $username;
        $daftar->password = Hash::make($password);
        $daftar->no_hp = $no_hp;
        $daftar->alamat = $alamat;
        $daftar->save();

        //echo 'Data berhasil tersimpan';
        $user->session()->flash('msg', "Pendafataran Akun berhasil !! Silahkan Login kembali");
        return redirect('/login/tambah');
    }



    public function hapus($id)
    {
        ModelLogin::find($id)->delete();
        return redirect()->back();
    }
}
