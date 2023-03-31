<?php

namespace App\Http\Controllers;

use App\Http\Resources\MobilResource;
use App\Models\ModelMobil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Throwable;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class MobilController extends Controller
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

        return View('mobil.data')->with([
            'dataMobil' => $dataMobil,
            'cari' => $cari,
            'user' => Auth::user(),
        ]);
    }

    public function datasoft()
    {

        $data = [
            'dataMobil' => ModelMobil::onlyTrashed()->get()
        ];
        return View('mobil.datasoft', $data)->with([
            'user' => Auth::user(),
        ]);
    }

    public function add()
    {
        return View('mobil.formtambah')->with([
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
        return redirect('/mobil/tambah');
    }


    public function edit($id_mobil)
    {
        $mobil = ModelMobil::find($id_mobil);
        $data = [
            'id_mobil' => $id_mobil,
            'nama_mobil' => $mobil->nama_mobil,
            'merk_mobil' => $mobil->merk_mobil,
            'tahun_mobil' => $mobil->tahun_mobil,
            'plat_mobil' => $mobil->plat_mobil,
            'bahan_bakar' => $mobil->bahan_bakar,
            'transmisi' => $mobil->transmisi,
            'kursi' => $mobil->kursi,
            'harga_sewa' => $mobil->harga_sewa,
            'gambar' => $mobil->gambar,
            'keterangan' => $mobil->keterangan,
            'deskripsi' => $mobil->deskripsi,
            'p3k' => $mobil->p3k,
            'charger' => $mobil->charger,
            'ac' => $mobil->ac,
            'audio' => $mobil->audio,

        ];

        return View('mobil.edit', $data)->with([
            'user' => Auth::user(),
        ]);
    }

    public function update(Request $r)
    {
        $id_mobil = $r->id_mobil;
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
                'gambar' => 'mimes:jpg,png,jpeg|image|max:2048',

            ]
        );

        if ($r->hasFile('gambar')) {
            $path = $r->file('gambar')->storeAs('uploads', time() . '-' . $nama_mobil . '.' . $r->file('gambar')->extension());
        } else {
            $path = '';
        }

        $mobil = ModelMobil::find($id_mobil);
        $pathgambar = $mobil->gambar;

        if ($pathgambar != null || $pathgambar != '') {
            Storage::delete($pathgambar);
        }
        //$mobil->find($id_mobil);
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
        $r->session()->flash('msg', "Data Mobil berhasil diubah");
        return redirect('/mobil/index');
    }

    public function hapus($id_mobil)
    {
        ModelMobil::find($id_mobil)->delete();
        return redirect()->back();
    }

    public function restore($id_mobil)
    {
        ModelMobil::withTrashed()->find($id_mobil)->restore();
        return redirect()->back();
    }

    public function forceDelete($id_mobil)
    {
        $mobil  = ModelMobil::withTrashed()->find($id_mobil);
        $pathgambar = $mobil->gambar;

        if ($pathgambar != null || $pathgambar != '') {
            Storage::delete($pathgambar);
        }
        ModelMobil::onlyTrashed()->find($id_mobil)->forceDelete();
        return redirect()->back();
    }

    public function detailmobil(ModelMobil $car)
    {

        // $cars = ModelMobil::latest()->get();
        return view('mobil.detailmobil', compact('car'))->with([
            'user' => Auth::user(),
        ]);
    }

    public function laporan()
    {
        $dataMobil = ModelMobil::all();

        $time = Carbon::now()->isoFormat('D MMMM Y');

        // // $cars = ModelMobil::latest()->get();
        // return view('mobil.laporan', compact('car'))->with([
        //     'user' => Auth::user(),
        // ]);

        return view('mobil.laporan')->with([
            'dataMobil' => $dataMobil,
            'time' => $time
        ]);
    }
}
