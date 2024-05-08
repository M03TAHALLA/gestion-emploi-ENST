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

// Admin Route
Route::get('/admins', [AdminController::class, 'index']);
Route::get('/admins/create', [AdminController::class, 'create']);
Route::post('/admins', [AdminController::class, 'store']);
Route::get('/admins/{admin}', [AdminController::class, 'show']);
Route::get('/admins/{admin}/edit', [AdminController::class, 'edit']);
Route::put('/admins/{admin}', [AdminController::class, 'update']);
Route::delete('/admins/{admin}', [AdminController::class, 'destroy']);

// Departement Route
Route::get('/departements', [DepartementController::class, 'index']);
Route::get('/departements/create', [DepartementController::class, 'create']);
Route::post('/departements', [DepartementController::class, 'store']);
Route::get('/departements/{departement}', [DepartementController::class, 'show']);
Route::get('/departements/{departement}/edit', [DepartementController::class, 'edit']);
Route::put('/departements/{departement}', [DepartementController::class, 'update']);
Route::delete('/departements/{departement}', [DepartementController::class, 'destroy']);


// Emploi Temps Route
Route::get('/emploi-temps', [EmploiTempsController::class, 'index']);
Route::get('/emploi-temps/create', [EmploiTempsController::class, 'create']);
Route::post('/emploi-temps', [EmploiTempsController::class, 'store']);
Route::get('/emploi-temps/{emploi_temps}', [EmploiTempsController::class, 'show']);
Route::get('/emploi-temps/{emploi_temps}/edit', [EmploiTempsController::class, 'edit']);
Route::put('/emploi-temps/{emploi_temps}', [EmploiTempsController::class, 'update']);
Route::delete('/emploi-temps/{emploi_temps}', [EmploiTempsController::class, 'destroy']);



// Etudiant Route
Route::get('/etudiants', [EtudiantController::class, 'index']);
Route::get('/etudiants/create', [EtudiantController::class, 'create']);
Route::post('/etudiants', [EtudiantController::class, 'store']);
Route::get('/etudiants/{etudiant}', [EtudiantController::class, 'show']);
Route::get('/etudiants/{etudiant}/edit', [EtudiantController::class, 'edit']);
Route::put('/etudiants/{etudiant}', [EtudiantController::class, 'update']);
Route::delete('/etudiants/{etudiant}', [EtudiantController::class, 'destroy']);


// Filliere Route
Route::get('/fillieres', [FilliereController::class, 'index']);
Route::get('/fillieres/create', [FilliereController::class, 'create']);
Route::post('/fillieres', [FilliereController::class, 'store']);
Route::get('/fillieres/{filliere}', [FilliereController::class, 'show']);
Route::get('/fillieres/{filliere}/edit', [FilliereController::class, 'edit']);
Route::put('/fillieres/{filliere}', [FilliereController::class, 'update']);
Route::delete('/fillieres/{filliere}', [FilliereController::class, 'destroy']);



// Matiere Route
Route::get('/matieres', [MatiereController::class, 'index']);
Route::get('/matieres/create', [MatiereController::class, 'create']);
Route::post('/matieres', [MatiereController::class, 'store']);
Route::get('/matieres/{matiere}', [MatiereController::class, 'show']);
Route::get('/matieres/{matiere}/edit', [MatiereController::class, 'edit']);
Route::put('/matieres/{matiere}', [MatiereController::class, 'update']);
Route::delete('/matieres/{matiere}', [MatiereController::class, 'destroy']);



// Salle Route
Route::get('/salles', [SalleController::class, 'index']);
Route::get('/salles/create', [SalleController::class, 'create']);
Route::post('/salles', [SalleController::class, 'store']);
Route::get('/salles/{salle}', [SalleController::class, 'show']);
Route::get('/salles/{salle}/edit', [SalleController::class, 'edit']);
Route::put('/salles/{salle}', [SalleController::class, 'update']);
Route::delete('/salles/{salle}', [SalleController::class, 'destroy']);




// User Route
Route::get('/users', [UserController::class, 'index']);
Route::get('/users/create', [UserController::class, 'create']);
Route::post('/users', [UserController::class, 'store']);
Route::get('/users/{user}', [UserController::class, 'show']);
Route::get('/users/{user}/edit', [UserController::class, 'edit']);
Route::put('/users/{user}', [UserController::class, 'update']);
Route::delete('/users/{user}', [UserController::class, 'destroy']);
