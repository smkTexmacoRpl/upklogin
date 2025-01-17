<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth', 'user-access:user'])->group(function(){

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

Route::middleware(['auth','user-access:admin'])->group(function(){
   Route::get('/admin/home',[HomeController::class,'adminHome'])->name('admin.home');  
});

Route::middleware(['auth','user-access:super_admin'])->group(function(){
    Route::get('/admin/home',[HomeController::class,'superHome'])->name('super.home');  
 });