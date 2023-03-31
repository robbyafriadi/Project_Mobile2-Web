<?php

namespace App\Http\Controllers;

use App\Models\ModelMobil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{


    public function detail(ModelMobil $car)
    {

        // $cars = ModelMobil::latest()->get();
        return view('frontend.detail', compact('car'))->with([
            'user' => Auth::user(),
        ]);
    }




    public function homepage(Request $request)
    {

        $cari = $request->query('cari');
        if (!empty($cari)) {
            $cars = ModelMobil::sortable()
                ->where('mobil.nama_mobil', 'like', '%' . $cari . '%')
                ->orWhere('mobil.harga_sewa', 'like', '%' . $cari . '%')
                ->paginate(5)->onEachSide(2)->fragment('mobil');
        } else {
            $cars = ModelMobil::sortable()->paginate(2)->onEachSide(2)->fragment('mobil');
        }



        $cars = ModelMobil::latest()->get();

        return View('frontend.homepage', compact('cars'))->with([
            'cari' => $cari,
            'cars' => $cars,
            'user' => Auth::user(),
        ]);
    }
}
