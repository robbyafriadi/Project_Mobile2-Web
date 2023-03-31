<?php

use App\Http\Controllers\LayoutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PeminjamanController;
use App\Models\ModelMobil;
use App\Http\Middleware\Authenticate;

use App\Http\Middleware\CekUserLogin;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [LoginController::class, 'index'])->middleware('auth');
//Route::get('detail/{car:slug}', [\App\Http\Controllers\HomeController::class, 'detail'])->name('detail');

// Route::get('/', [LayoutController::class, 'index'])->middleware('auth');
// Route::get('/home', [LayoutController::class, 'index'])->middleware('auth');



Route::controller(LayoutController::class)->group(function () {
    // Route::get('/layout/home', 'home');
    // Route::get('/layout/index', 'index');
});

Route::controller(MobilController::class)->group(function () {
    Route::get('/mobil/index', 'index');
    Route::get('/mobil/tambah', 'add');
    Route::post('/mobil/simpan', 'save');
    Route::get('/mobil/datasoft', 'datasoft');
    Route::get('/mobil/edit/{id}', 'edit');
    Route::put('/mobil/update', 'update');
    Route::get('/mobil/laporan', 'laporan');
    Route::delete('/mobil/hapus/{id}', 'hapus');
    Route::delete('/mobil/forceDelete/{id}', 'forceDelete');
    Route::get('/mobil/restore/{id}', 'restore');
    Route::get('/mobil/detailmobil/{car:nama_mobil}', 'detailmobil');
});

Route::controller(PelangganController::class)->group(function () {
    Route::get('/pelanggan/datapelanggan', 'datapelanggan');
    Route::get('/pelanggan/tambah', 'add');
    Route::post('/pelanggan/simpan', 'save');
    Route::get('/pelanggan/edit/{id}', 'edit');
    Route::put('/pelanggan/update', 'update');
    Route::delete('/pelanggan/hapus/{id}', 'hapus');
});


Route::controller(HomeController::class)->group(function () {
    Route::get('/frontend/detail/{car:nama_mobil}', 'detail');
    Route::get('/frontend/detail', 'detail');
    Route::get('/frontend/homepage', 'homepage');
    Route::get('/frontend/contact', 'contact');
    Route::get('/frontend/homepage2', 'homepage2');
    Route::get('/frontend/peminjaman/{id}', 'peminjaman');
});

Route::controller(PeminjamanController::class)->group(function () {
    Route::get('/peminjaman/datapeminjaman', 'index');
    Route::get('/peminjaman/tambah', 'add');

    //Route::get('/mobil/index', 'index');

    Route::post('/employees/getEmployees/', 'App\Http\Controllers\PeminjamanController@getEmployees')->name('employees.getEmployees');
});



Route::controller(LoginController::class)->group(function () {
    Route::get('login', 'index')->name('login');
    Route::post('login/proses', 'proses');
    Route::get('logout', 'logout');
    Route::get('/login/formdaftar', 'add');
    Route::post('/login/simpan', 'save');
    Route::get('/login/tambah', 'add');
    Route::delete('/login/hapus/{id}', 'hapus');
});


Route::controller(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['cekUserLogin:1']], function () {
        Route::resource('/mobil/index', MobilController::class);
        Route::resource('/mobil/datasoft', MobilController::class);
        Route::resource('/mobil/edit', MobilController::class);
        Route::resource('/mobil/formtambah', MobilController::class);
        Route::get('/mobil/detailmobil/{car:nama_mobil}', 'detailmobil');
    });

    Route::group(['middleware' => ['cekUserLogin:2']], function () {
        Route::resource('/frontend/homepage', HomeController::class);
        Route::resource('/frontend/detail/{car:nama_mobil}', HomeController::class);
    });
});
