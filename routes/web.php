<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::get('/icons', function () {
    return view('pages/icons/mdi');
});

Route::post('/',[LoginController::class,'login'])->name('login');

// create | add admin (test authentification)  
Route::get('users/create',[UserController::class,'create'])->name('create');
Route::post('users/store',[UserController::class,'store'])->name('store');
