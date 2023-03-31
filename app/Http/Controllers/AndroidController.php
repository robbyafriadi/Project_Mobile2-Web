<?php

namespace App\Http\Controllers;

use App\Http\Resources\AndroidResource;
use App\Models\ModelMobil;
use App\Models\ModelTransaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AndroidController extends Controller
{

    public function indexMobil()
    {
        $mobil = ModelMobil::all();

        return new AndroidResource(true, 'Data Mobil..!', $mobil);
    }

    public function showMobil($id)
    {
        $mobil = ModelMobil::find($id);

        if ($mobil == true) {
            return new AndroidResource(true, 'Data Founded..!', $mobil);
        } else {
            return response()->json([
                'message' => 'Data Not Found..!'
            ], 422);
        }
    }


    // ---------------- Data User -----------------------

    public function indexUser()
    {
        $user = User::all();

        return new AndroidResource(true, 'Data Mobil..!', $user);
    }

    public function showUser(string $id)
    {
        $user = User::find($id);

        if ($user == true) {
            return new AndroidResource(true, 'Data Founded..!', $user);
        } else {
            return response()->json([
                'message' => 'Data Not Found..!'
            ], 422);
        }
    }

    public function createUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'username' => 'required|string|min:6|max:50|unique:users',
            'password' => 'required|string|min:6|max:255',
            'no_hp' => 'required|string|min:10|max:25|unique:users',
            'alamat' => 'required|string|max:250',
            'level' => 'required|integer|max:5',
        ]);

        $Users = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'level' => $request->level,
        ]);
        return response()->json([
            'status' => 'success',
            'message' => 'User Created Successfull..!',
            'user' => $Users
        ]);
    }

    public function loginUser(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // if ($request->fails()) {
        //     return response()->json($request->error(), 422);
        // }

        $request = Auth::user();
        return response()->json([
            'status' => 'success',
            'user' => $request
        ]);
    }

    // ---------------- Data Transaksi -----------------------

    public function indexTransaksi()
    {
        $transaksi = ModelTransaksi::all();

        return new AndroidResource(true, 'Data Transaksi..!', $transaksi);
    }

    public function showTransaksi(string $id)
    {
        $transaksi = ModelTransaksi::find($id);

        if ($transaksi == true) {
            return new AndroidResource(true, 'Data Founded..!', $transaksi);
        } else {
            return response()->json([
                'message' => 'Data Not Found..!'
            ], 422);
        }
    }

    public function createTransaksi(Request $request)
    {
        $request->validate([
            'id_transaksi' => 'required|string|max:255|unique:transaksi_mobil',
            'date_transaksi' => 'required|string|max:255',
            'time_transaksi' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'nama_mobil' => 'required|string|max:255',
            'durasi' => 'required|integer|max:255',
        ]);

        $Transaksi = ModelTransaksi::create([
            'id_transaksi' => $request->id_transaksi,
            'date_transaksi' => $request->date_transaksi,
            'time_transaksi' => $request->time_transaksi,
            'name' => $request->name,
            'nama_mobil' => $request->nama_mobil,
            'durasi' => $request->durasi,
        ]);
        return response()->json([
            'status' => 'success',
            'message' => 'User Created Successfull..!',
            'data' => $Transaksi
        ]);
    }
}
