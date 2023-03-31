<?php

namespace App\Http\Controllers;

use App\Http\Resources\AndroidResource;
use App\Http\Resources\MobilResource;
use App\Models\ModelMobil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AndroidMobil extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mobil = ModelMobil::all();

        return new AndroidResource(true, 'Data Mobil..!', $mobil);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
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

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
