<?php

use App\Http\Controllers\LoginController;
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
})->name('dashboard.home');


// show all ressources
Route::get('/dashboard/ressources', function () {
    return view('ressources');
})->name('dashboard');
Route::get('/dashboard/sous_admin', function () {
    return view('sous_admin');
})->name('sous_admin');


// TO CHANGE (temp route)
Route::get('/dashboard/ressources/salles', function(){ return view('ressources-pages.salles');})->name('salles');
Route::get('/dashboard/ressources/enseignants', function(){ return view('ressources-pages.enseignants');})->name('enseignants');
Route::get('/dashboard/ressources/modules', function(){ return view('ressources-pages.modules');})->name('modules');
Route::get('/dashboard/ressources/filieres', function(){ return view('ressources-pages.filieres');})->name('filieres');
Route::get('/dashboard/ressources/departements', function(){ return view('ressources-pages.departements');})->name('departements');
Route::get('/dashboard/ressources/etudiants', function(){ return view('ressources-pages.etudiants');})->name('etudiants');

Route::get('/icons', function () {
    return view('pages/icons/mdi');
});

Route::post('/',[LoginController::class,'login'])->name('login');


// create | add admin (test authentification)
Route::get('users/create',[UserController::class,'create'])->name('create');
Route::post('users/store',[UserController::class,'store'])->name('store');

Route::resource('admins', AdminController::class);
Route::resource('departements', DepartementController::class);
Route::resource('emploi-temps', EmploiTempsController::class);
Route::resource('etudiants', EtudiantController::class);
Route::resource('fillieres', FilliereController::class);
Route::resource('matieres', MatiereController::class);
Route::resource('salles', SalleController::class);
Route::resource('users', UserController::class);

