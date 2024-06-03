<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\SousAdminLoginController;
use App\Http\Controllers\Auth\SuperAdminLoginController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\EmploiTempsController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\FiliereController;
use App\Http\Controllers\SalleController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmploiStockController;
use App\Http\Controllers\EnseignantController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SeanceController;
use App\Http\Controllers\SousAdminController;
use App\Http\Controllers\SuperAdminController;
use App\Models\Enseignant;
use App\Models\Seance;
use App\Models\SousAdmin;

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
Route::get('/dashboard/ressources/salles', function () {
    return view('ressources-pages.salles');
})->name('salles');
Route::get('/dashboard/ressources/enseignants', function () {
    return view('ressources-pages.enseignants');
})->name('enseignants');
Route::get('/dashboard/ressources/modules', function () {
    return view('ressources-pages.modules');
})->name('modules');
Route::get('/dashboard/ressources/departements', function () {
    return view('ressources-pages.departements');
})->name('departements');
Route::get('/dashboard/ressources/etudiants', function () {
    return view('ressources-pages.etudiants');
})->name('etudiants');

Route::get('/dashboard/ressources/salles/create', function () {
    return view('create-pages.salles-form');
})->name('salles.form');
Route::get('/dashboard/ressources/enseignants/create', function () {
    return view('create-pages.enseignants-form');
})->name('enseignants.form');
Route::get('/dashboard/ressources/modules/create', function () {
    return view('create-pages.modules-form');
})->name('modules.form');
Route::get('/dashboard/ressources/departement/create', function () {
    return view('create-pages.departement-form');
})->name('departement.form');
Route::get('/dashboard/ressources/sous-admin/create', function () {
    return view('create-pages.sous-admin-form');
})->name('sous-admin.form');


Route::get('/icons', function () {
    return view('pages/icons/mdi');
});

//Route::post('/',[LoginController::class,'login'])->name('login');


// create | add admin (test authentification)
Route::get('users/create', [UserController::class, 'create'])->name('create');
Route::post('users/store', [UserController::class, 'store'])->name('store');

Route::post('dashboard/EmploiTemps-Rech', [EmploiTempsController::class, 'ResultatRecherche'])->name('ResultatRecherche');





Route::resource('fillieres', FiliereController::class);
Route::resource('etudiants', EtudiantController::class);
Route::resource('enseignant', EnseignantController::class);
Route::resource('departements', DepartementController::class);
Route::resource('Emploitemps', EmploiTempsController::class);
Route::resource('Seance', SeanceController::class);
Route::get('/seances/{id_filiere}/{groupe}/{semestre}', [SeanceController::class, 'show'])->name('Seance.show');







Route::resource('/dashboard/salles', SalleController::class)->parameters(['salles' => 'num_salle']);

Route::get('/recherche', [SalleController::class, 'recherche'])->name('salles.recherche');

Route::resource('/dashboard/modules', ModuleController::class);

Route::resource('/dashboard/admins', SousAdminController::class);
Route::resource('/dashboard/super_admins', SuperAdminController::class);
Route::resource('/dashboard/super_admins/roles', RoleController::class);

//Route::post('/assign-roles',  [SuperAdminController::class, 'assignRoles'])->name('assign.roles.submit');
Route::post('/assign-roles', [RoleController::class, 'assignRoles'])->name('assign.roles.submit');
Route::get('/assign-roles', [RoleController::class, 'showAssignRolesForm'])->name('assign.roles.form');

Route::post('/superadmin/assign-roles', [SuperAdminController::class, 'assignRoles']);
Route::post('/sous_admins/{id}/assign-roles', [SousAdminController::class, 'assignRoles'])->name('sous_admins.assignRoles');

Route::get('/get-semesters/{filliere}', [EmploiTempsController::class, 'getSemesters']);
Route::get('/get-groups/{filliere}/{semestre}', [EmploiTempsController::class, 'getGroups']);
Route::get('/get-filieres/{departement}', [EmploiTempsController::class, 'getFillieres']);

Route::get('/get-filieres/{departement}', [EmploiTempsController::class, 'getFilieres']);
Route::get('/get-semesters/{filiere}', [EmploiTempsController::class, 'getSemesters']);
Route::get('/get-groups/{filiere}/{semestre}', [EmploiTempsController::class, 'getGroups']);



Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
Route::post('/roles', [RoleController::class, 'store'])->name('roles.store');
