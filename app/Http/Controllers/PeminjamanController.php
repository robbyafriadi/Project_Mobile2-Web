<?php

namespace App\Http\Controllers;

use App\Models\ModelLogin;
use App\Models\ModelMobil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class PeminjamanController extends Controller
{
    public function index(Request $request)
    {

        $cari = $request->query('cari');
        if (!empty($cari)) {
            $dataMobil = ModelMobil::sortable()
                ->where('mobil.nama_mobil', 'like', '%' . $cari . '%')
                ->orWhere('mobil.harga_sewa', 'like', '%' . $cari . '%')
                ->paginate(5)->onEachSide(2)->fragment('mobil');
        } else {
            $dataMobil = ModelMobil::sortable()->paginate(2)->onEachSide(2)->fragment('mobil');
        }

        // $data = [
        //     'dataMobil' => ModelMobil::sortable()->paginate(5)->onEachSide(2)->fragment('mobil'),
        // ];
        // return View('mobil.data', $data);

        return View('peminjaman.datapeminjaman')->with([
            'dataMobil' => $dataMobil,
            'cari' => $cari,
            'user' => Auth::user(),
        ]);
    }

    // public function add()
    // {
    //     $pela = ModelLogin::all();
    //     $mob = ModelMobil::all();
    //     // $idmob = auth()->id_mobil;
    //     // $details = ModelMobil::where('id_mobil', '=', $idmob)->first();

    //     return View('peminjaman.tambahpeminjaman', compact('pela', 'mob',))->with([
    //         'user' => Auth::user(),
    //     ]);
    // }

    public function add(Request $request)
    {

        // $search = $request->search;

        // if ($search == '') {
        //     $employees = ModelMobil::orderby('nama_mobil', 'asc')->select('id_mobil', 'nama_mobil')->limit(5)->get();
        // } else {
        //     $employees = ModelMobil::orderby('nama_mobil', 'asc')->select('id_mobil', 'nama_mobil')->where('nama_mobil', 'like', '%' . $search . '%')->limit(5)->get();
        // }

        // $response = array();
        // foreach ($employees as $employee) {
        //     $response[] = array("value" => $employee->id_mobil, "label" => $employee->nama_mobil);
        // }

        // return response()->json($response);


        $pela = ModelLogin::all();
        $mob = ModelMobil::all();

        // $mobil = ModelMobil::find($request->id_mobil);
        // $mobil->nama_mobil = $request->nama_mobil;
        // $mobil->plat_mobil = $request->plat_mobil;
        // $mobil->save();
        // $idmob = auth()->id_mobil;
        // $details = ModelMobil::where('id_mobil', '=', $idmob)->first();

        return View('peminjaman.tambahpeminjaman', compact('pela', 'mob',))->with([
            'user' => Auth::user(),
        ]);
    }

    public function save(Request $r)
    {
        // $slug = Str::slug($r->nama_mobil, '-');
        // $id_mobil = $r->id_mobil;
        $nama_mobil = $r->nama_mobil;
        $merk_mobil = $r->merk_mobil;
        $tahun_mobil = $r->tahun_mobil;
        $plat_mobil = $r->plat_mobil;
        $bahan_bakar = $r->bahan_bakar;
        $transmisi = $r->transmisi;
        $kursi = $r->kursi;
        $harga_sewa = $r->harga_sewa;
        $path = $r->gambar;
        $keterangan = $r->keterangan;
        $deskripsi = $r->deskripsi;
        $p3k = $r->p3k;
        $charger = $r->charger;
        $ac = $r->ac;
        $audio = $r->audio;

        $validateData = $r->validate(
            [
                'plat_mobil' => 'required|unique:mobil,plat_mobil',
                'nama_mobil' => 'required',
                'merk_mobil' => 'required',
                'tahun_mobil' => 'required',
                'kursi' => 'required',
                'bahan_bakar' => 'required',
                'transmisi' => 'required',
                'harga_sewa' => 'required',
                'keterangan' => 'required',
                'deskripsi' => 'required',
                'gambar' => 'mimes:jpg,png,jpeg|image|max:2048',

            ],
            [
                'plat_mobil.required' => 'Plat mobil tidak boleh kosong',
                'nama_mobil.required' => 'Nama mobil tidak boleh kosong',
                'merk_mobil.required' => 'Merek mobil tidak boleh kosong',
                'tahun_mobil.required' => 'Tahun mobil tidak boleh kosong',
                'kursi.required' => 'Kursi mobil tidak boleh kosong',
                'deskripsi.required' => 'Deskripsi mobil tidak boleh kosong',
                'transmisi.required' => 'Tahun mobil tidak boleh kosong',
                'harga_sewa.required' => 'Harga Sewa mobil tidak boleh kosong',
                'keterangan.required' => 'Keterangan mobil tidak boleh kosong',
            ]
        );

        if ($r->hasFile('gambar')) {
            $path = $r->file('gambar')->storeAs('uploads', time() . '-' . $nama_mobil . '.' . $r->file('gambar')->extension());
        } else {
            $path = '';
        }
        $mobil = new ModelMobil;
        //$mobil->mobilid = $id_mobil;
        $mobil->nama_mobil = $nama_mobil;
        $mobil->merk_mobil = $merk_mobil;
        $mobil->tahun_mobil = $tahun_mobil;
        $mobil->plat_mobil = $plat_mobil;
        $mobil->bahan_bakar = $bahan_bakar;
        $mobil->transmisi = $transmisi;
        $mobil->kursi = $kursi;
        $mobil->harga_sewa = $harga_sewa;
        $mobil->gambar = $path;
        $mobil->keterangan = $keterangan;
        $mobil->deskripsi = $deskripsi;
        $mobil->p3k = $p3k;
        $mobil->charger = $charger;
        $mobil->ac = $ac;
        $mobil->audio = $audio;
        $mobil->save();

        //echo 'Data berhasil tersimpan';
        $r->session()->flash('msg', "Data Mobil dengan nama $nama_mobil berhasil tersimpan");
        return redirect('/peminjaman/tambahpeminjaman');
    }


    public function getEmployees(Request $request)
    {

        $search = $request->search;

        if ($search == '') {
            $employees = ModelMobil::orderby('nama_mobil', 'asc')->select('id_mobil', 'nama_mobil')->limit(5)->get();
        } else {
            $employees = ModelMobil::orderby('nama_mobil', 'asc')->select('id_mobil', 'nama_mobil')->where('nama_mobil', 'like', '%' . $search . '%')->limit(5)->get();
        }

        $response = array();
        foreach ($employees as $employee) {
            $response[] = array("value" => $employee->id_mobil, "label" => $employee->nama_mobil);
        }

        return response()->json($response);
    }
}
