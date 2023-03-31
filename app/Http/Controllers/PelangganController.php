<?php

namespace App\Http\Controllers;

use App\Models\ModelLogin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PelangganController extends Controller
{
    public function datapelanggan(Request $request)
    {

        $cari = $request->query('cari');
        if (!empty($cari)) {
            $dataPelanggan = ModelLogin::sortable()
                ->where('users.name', 'like', '%' . $cari . '%')
                ->orWhere('users.alamat', 'like', '%' . $cari . '%')
                ->paginate(5)->onEachSide(2)->fragment('users');
        } else {
            $dataPelanggan = ModelLogin::sortable()->paginate(2)->onEachSide(2)->fragment('users');
        }

        $dataPelanggan = ModelLogin::latest()->get();

        return View('pelanggan.datapelanggan')->with([
            'cari' => $cari,
            'dataPelanggan' => $dataPelanggan,
            'user' => Auth::user(),
        ]);
    }


    public function add()
    {
        return View('pelanggan.tambahpelanggan')->with([
            'user' => Auth::user(),
        ]);
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
        $user->session()->flash('msg', "Pendafataran Akun berhasil ");
        return redirect('/pelanggan/tambah');
    }

    public function edit($id)
    {
        $user = ModelLogin::find($id);
        $data = [
            'id' => $id,
            'name' => $user->name,
            'email' => $user->email,
            'username' => $user->username,
            'password' => $user->password,
            'no_hp' => $user->no_hp,
            'alamat' => $user->alamat,
            'level' => $user->level,
        ];

        return View('pelanggan.editpelanggan', $data)->with([
            'user' => Auth::user(),
        ]);
    }

    public function update(Request $r)
    {
        $id = $r->id;
        $name = $r->name;
        $email = $r->email;
        $username = $r->username;
        $password = $r->password;
        $no_hp = $r->no_hp;
        $alamat = $r->alamat;
        $level = $r->level;


        $user = ModelLogin::find($id);

        $user->name = $name;
        $user->email = $email;
        $user->username = $username;
        $user->password = Hash::make($password);
        $user->no_hp = $no_hp;
        $user->alamat = $alamat;
        $user->level = $level;
        $user->save();

        //echo 'Data berhasil tersimpan';
        $r->session()->flash('msg', "Data User/Pelanggan berhasil diubah");
        return redirect('/pelanggan/datapelanggan');
    }

    public function hapus($id)
    {
        ModelLogin::find($id)->delete();
        return redirect()->back();
    }
}
