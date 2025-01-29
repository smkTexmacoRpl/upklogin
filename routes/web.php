<?php

// use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JasaController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\PengunjungController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;
use  Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome')->name('/');
});

Route::get('/dash',[FrontController::class,'index'])->name('dash');

Route::resource('/kamar',KamarController::class);
Route::resource('/pengunjung', PengunjungController::class);
Route::resource('/transaksi', TransaksiController::class);
// Route::resource('/jasa', JasaController::class);

Auth::routes();

Route::middleware(['auth', 'user-access:user'])->group(function(){

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

Route::middleware(['auth','user-access:admin'])->group(function(){
   Route::get('/admin/home',[HomeController::class,'adminHome'])->name('admin.home');  
});

Route::middleware(['auth','user-access:super_admin'])->group(function(){
    Route::get('/super/home',[HomeController::class,'superHome'])->name('super.home');  
 });
 

Route::get('logout', [LoginController::class, 'logout'])->name('logout');