<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\EmploiTempsController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\FilliereController;
use App\Http\Controllers\MatiereController;
use App\Http\Controllers\SalleController;
use App\Http\Controllers\UserController;




Route::get('/', function () {
    return view('index');
});
Route::get('/dashboard', function () {
    return view('dashboard');
});
Route::get('/icons', function () {
    return view('pages/icons/mdi');
});

Route::resource('admins', AdminController::class);
Route::resource('departements', DepartementController::class);
Route::resource('emploi-temps', EmploiTempsController::class);
Route::resource('etudiants', EtudiantController::class);
Route::resource('fillieres', FilliereController::class);
Route::resource('matieres', MatiereController::class);
Route::resource('salles', SalleController::class);
Route::resource('users', UserController::class);
