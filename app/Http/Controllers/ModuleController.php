<?php

namespace App\Http\Controllers;

use App\Models\Enseignant;
use App\Models\Filiere;
use Illuminate\Http\Request;
use App\Models\Module;
use App\Models\Filliere;
use Illuminate\Support\Facades\DB;

class ModuleController extends Controller
{
    // Afficher la liste des modules
    public function index()
    {
        $modules = Module::select('modules.*', 'filieres.nom_filiere', 'enseignants.nom_enseignant')
            ->join('filieres', 'modules.id_filiere', '=', 'filieres.id')
            ->join('enseignants', 'modules.cin_enseignant', '=', 'enseignants.cin_enseignant')
            ->get();

        return view('modules.index', compact('modules'));
    }

    // Afficher le formulaire de création d'un module
    public function create()
    {
        $filieres = Filiere::select('nom_filiere')->distinct()->get();
        $natures = ['Disciplinaire', 'Complémentaire'];
        return view('modules.create', compact('filieres','natures'));

    }

    // Sauvegarder un nouveau module dans la base de données
    public function store(Request $request)
{
    // Validate the request data
    $validatedData = $request->validate([
        'nom_module' => 'required|string',
        'volume_horaire' => 'required|integer',
        'nature_module' => 'required|in:Disciplinaire,Complémentaire',
        'nom_filiere' => 'required|string|exists:filieres,nom_filiere', // Ensure nom_filiere exists in filieres table
        'nom_enseignant' => 'required|string|exists:enseignants,nom_enseignant', // Ensure cin_enseignant exists in enseignants table
    ]);

    // Fetch id_filiere based on the nom_filiere entered by the user
    $filiere = Filiere::where('nom_filiere', $validatedData['nom_filiere'])->firstOrFail();
    $id_filiere = $filiere->id;

    // Fetch cin_enseignant based on specific criteria
    $enseignant = Enseignant::where('nom_enseignant', $validatedData['nom_enseignant'])->firstOrFail(); // Adjust the condition and value as needed
    $cin_enseignant = $enseignant->cin_enseignant;

    // Create a new Module instance and save it
    $module = new Module();
    $module->nom_module = $validatedData['nom_module'];
    $module->id_filiere = $id_filiere;
    $module->volume_horaire = $validatedData['volume_horaire'];
    $module->nature_module = $validatedData['nature_module'];
    $module->cin_enseignant = $cin_enseignant;
    $module->save();

    // Redirect to a specific route or return a response as needed
    return redirect()->route('modules.index')->with('success', 'Module created successfully!');
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
        $modules = Module::select('modules.*', 'filieres.nom_filiere', 'enseignants.nom_enseignant')
            ->join('filieres', 'modules.id_filiere', '=', 'filieres.id')
            ->join('enseignants', 'modules.cin_enseignant', '=', 'enseignants.cin_enseignant')
            ->get();
        return view('modules.edit', compact('module', 'modules'));
    }

    // Mettre à jour les informations d'un module
    public function update(Request $request, $id)
{
    // Validate the request data
    $validatedData = $request->validate([
        'nom_module' => 'required|string',
        'volume_horaire' => 'required|integer',
        'nature_module' => 'required|in:Disciplinaire,Complémentaire',
        'nom_filiere' => 'required|string|exists:filieres,nom_filiere', // Ensure nom_filiere exists in filieres table
        'nom_enseignant' => 'required|string|exists:enseignants,nom_enseignant', // Ensure cin_enseignant exists in enseignants table
    ]);

    // Fetch id_filiere based on the nom_filiere entered by the user
    $filiere = Filiere::where('nom_filiere', $validatedData['nom_filiere'])->firstOrFail();
    $id_filiere = $filiere->id;

    // Fetch cin_enseignant based on specific criteria
    $enseignant = Enseignant::where('nom_enseignant', $validatedData['nom_enseignant'])->firstOrFail();
    $cin_enseignant = $enseignant->cin_enseignant;

    // Find the module by ID
    $module = Module::findOrFail($id);

    // Update the module attributes
    $module->nom_module = $validatedData['nom_module'];
    $module->id_filiere = $id_filiere;
    $module->volume_horaire = $validatedData['volume_horaire'];
    $module->nature_module = $validatedData['nature_module'];
    $module->cin_enseignant = $cin_enseignant;
    $module->save();

    // Redirect to a specific route or return a response as needed
    return redirect()->route('modules.index')->with('success', 'Module updated successfully!');
}


    // Supprimer un module de la base de données
    public function destroy($id)
    {
        $module = Module::findOrFail($id);
        $module->delete();

        return redirect()->route('modules.index')
            ->with('success', 'Module supprimé avec succès.');
    }
    public function getEnseignantsByFiliere($nom_filiere)
    {
        $filiere = Filiere::where('nom_filiere', $nom_filiere)->first();
        if ($filiere) {
            $enseignants = Enseignant::where('nom_departement', $filiere->nom_departement)->get();
            return response()->json($enseignants);
        } else {
            return response()->json([]);
        }
    }
    public function getEnseignants($filiere)
{
    $enseignants = DB::table('enseignants')
        ->join('filieres', 'enseignants.nom_departement', '=', 'filieres.nom_departement')
        ->where('filieres.nom_filiere', $filiere)
        ->select('enseignants.cin_enseignant', 'enseignants.nom_enseignant', 'enseignants.prenom_enseignant')
        ->get();

    return response()->json($enseignants);
}
}
