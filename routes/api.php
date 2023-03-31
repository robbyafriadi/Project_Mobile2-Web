<?php

use App\Http\Controllers\AndroidController;
use App\Http\Controllers\AndroidMobil;
use App\Http\Controllers\MobilController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('mobil', AndroidMobil::class);

//Route::put('students/upload/{id}', [StudentsController::class, 'doupload']);

Route::controller(AndroidController::class)->group(function () {
    // Route::get('mobil', 'indexMobil');

    // Data User
    Route::get('user', 'indexUser');
    Route::post('loginuser', 'loginUser');
    Route::post('createuser', 'createUser');

    // Data Transaksi
    Route::get('transaksi', 'indexTransaksi');
    Route::get('idtransaksi/{id}', 'showTransaksi');
    Route::post('createtransaksi', 'createTransaksi');
});
