<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard.home');


// show all ressources 
Route::get('/dashboard/ressources', function () {
    return view('ressources');
})->name('dashboard');


// TO CHANGE (temp route)
Route::get('/dashboard/ressources/salles', function(){ return view('ressources-pages.salles');});
Route::get('/dashboard/ressources/enseignants', function(){ return view('ressources-pages.enseignants');});
Route::get('/dashboard/ressources/modules', function(){ return view('ressources-pages.modules');});
Route::get('/dashboard/ressources/filieres', function(){ return view('ressources-pages.filieres');});
Route::get('/dashboard/ressources/departements', function(){ return view('ressources-pages.departements');});
Route::get('/dashboard/ressources/etudiants', function(){ return view('ressources-pages.etudiants');});

Route::get('/icons', function () {
    return view('pages/icons/mdi');
});

Route::post('/',[LoginController::class,'login'])->name('login');

// create | add admin (test authentification)  
Route::get('users/create',[UserController::class,'create'])->name('create');
Route::post('users/store',[UserController::class,'store'])->name('store');
