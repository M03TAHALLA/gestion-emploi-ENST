<?php

namespace App\Http\Controllers;

use App\Models\Enseignant;
use Illuminate\Http\Request;
use App\Models\Module;
use App\Models\Filliere;

class ModuleController extends Controller
{
    // Afficher la liste des modules
    public function index()
    {
        $modules = Module::all();
        return view('modules.index', compact('modules'));
    }

    // Afficher le formulaire de création d'un module
    public function create()
    {
        $filieres = Filliere::all();
        $enseignant = Enseignant::all();
        return view('modules.create', compact('filieres','enseignant'));
    }

    // Sauvegarder un nouveau module dans la base de données
    public function store(Request $request)
    {
        $request->validate([
            'nom_module' => 'required',
            'nom_filiere' => 'required',
            'volume_horaire' => 'required|integer',
            'nature_module' => 'required|in:Disciplinaire,Complémentaire',
            'nom_professeur' => 'required',
        ]);

        Module::create($request->all());
        
        return redirect()->route('modules.index')
            ->with('success', 'Module créé avec succès.');
    }

    // Afficher les détails d'un module spécifique
    public function show($id)
    {
        $module = Module::findOrFail($id);
        return view('modules.show', compact('module'));
    }

    // Afficher le formulaire de modification d'un module
    public function edit($id)
    {
        $module = Module::findOrFail($id);
        return view('modules.edit', compact('module'));
    }

    // Mettre à jour les informations d'un module
    public function update(Request $request, $id)
    {
        $request->validate([
            'nom_module' => 'required',
            'nom_filiere' => 'required',
            'volume_horaire' => 'required|integer',
            'nature_module' => 'required|in:Disciplinaire,Complémentaire',
            'nom_professeur' => 'required',
        ]);

        $module = Module::findOrFail($id);
        $module->update($request->all());
        
        return redirect()->route('modules.index')
            ->with('success', 'Module mis à jour avec succès.');
    }

    // Supprimer un module de la base de données
    public function destroy($id)
    {
        $module = Module::findOrFail($id);
        $module->delete();
        
        return redirect()->route('modules.index')
            ->with('success', 'Module supprimé avec succès.');
    }
}
