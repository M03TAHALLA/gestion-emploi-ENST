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


Route::get('/dashboard/Profile', function () {
    return view('Profile');
})->name('Profile');

Route::get('/dashboard/AjouterEmploiTemps', function () {
    return view('AjouterEmploiTemps');
})->name('AjouterEmploiTemps');


// show all ressources
Route::get('/dashboard/ressources', function () {
    return view('ressources');
})->name('dashboard.ressources');

Route::get('/dashboard/sous_admin', function () {
    return view('sous_admin');
})->name('sous_admin');


// TO CHANGE (temp route)
Route::get('/dashboard/ressources/salles', function(){ return view('ressources-pages.salles');})->name('salles');
Route::get('/dashboard/ressources/enseignants', function(){ return view('ressources-pages.enseignants');})->name('enseignants');
Route::get('/dashboard/ressources/modules', function(){ return view('ressources-pages.modules');})->name('modules');
Route::get('/dashboard/ressources/departements', function(){ return view('ressources-pages.departements');})->name('departements');
Route::get('/dashboard/ressources/etudiants', function(){ return view('ressources-pages.etudiants');})->name('etudiants');

Route::get('/dashboard/ressources/salles/create', function(){ return view('create-pages.salles-form');})->name('salles.form');
Route::get('/dashboard/ressources/enseignants/create', function(){ return view('create-pages.enseignants-form');})->name('enseignants.form');
Route::get('/dashboard/ressources/modules/create', function(){ return view('create-pages.modules-form');})->name('modules.form');
Route::get('/dashboard/ressources/departement/create', function(){ return view('create-pages.departement-form');})->name('departement.form');
Route::get('/dashboard/ressources/sous-admin/create', function(){ return view('create-pages.sous-admin-form');})->name('sous-admin.form');






Route::get('/icons', function () {
    return view('pages/icons/mdi');
});

Route::post('/',[LoginController::class,'login'])->name('login');


// create | add admin (test authentification)
Route::get('users/create',[UserController::class,'create'])->name('create');
Route::post('users/store',[UserController::class,'store'])->name('store');

Route::post('dashboard/EmploiTemps-Rech',[EmploiTempsController::class,'Recherche'])->name('Recherche');





Route::resource('fillieres', FilliereController::class);
Route::resource('Emploitemps',EmploiTempsController::class);




