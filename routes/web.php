<?php

// use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use  Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dash', function () {
    return view('admin.dashboard');
});

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

