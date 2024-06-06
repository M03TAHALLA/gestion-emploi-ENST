<?php
namespace App\Http\Controllers;

use App\Models\Departement;
use App\Models\Enseignant;
use App\Models\Module;
use Illuminate\Http\Request;

class EnseignantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $enseignants = Enseignant::all();

    // Tableau pour stocker le total des volumes horaires par enseignant
    $total_volumes_horaires = [];

    // Boucle à travers chaque enseignant
    foreach ($enseignants as $enseignant) {
        // Requête pour obtenir la somme des volumes horaires pour cet enseignant
        $total_volumes_horaires[$enseignant->cin_enseignant] = Module::where('cin_enseignant', $enseignant->cin_enseignant)->sum('volume_horaire');
    }

    return view('Enseignant.index', compact('enseignants', 'total_volumes_horaires'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departements = Departement::all();

        return view('Enseignant.create', compact('departements'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'cin_enseignant' => 'required|string|max:10',
            'nom_enseignant' => 'required|string|max:255',
            'prenom_enseignant' => 'required|string|max:255',
            'date_naissance' => 'required|date',
            'email' => 'required|email|unique:enseignants,email',
            'specialite' => 'required|string|max:255',
            'situation' => 'required|string|in:Permanant,Vacataire',
            'horaire_total' => 'required|integer|min:0',
            'date_affectation' => 'required|date',
            'nom_departement' => 'required|string|exists:departements,nom_departement',
        ]);

        $existingEnseignant = Enseignant::where('cin_enseignant', $request->cin_enseignant)->first();
            if ($existingEnseignant) {
                return redirect()->back()->with('error', 'CIN enseignant déjà existant.');
            }

        // Créer un nouvel enseignant
        Enseignant::create([
            'cin_enseignant' => $request->cin_enseignant,
            'nom_enseignant' => $request->nom_enseignant,
            'prenom_enseignant' => $request->prenom_enseignant,
            'date_naissance' => $request->date_naissance,
            'email' => $request->email,
            'specialite' => $request->specialite,
            'situation' => $request->situation,
            'horaire_total' => $request->horaire_total,
            'date_affectation' => $request->date_affectation,
            'nom_departement' => $request->nom_departement,
        ]);

        // Rediriger vers la page de listing des enseignants avec un message de succès
        return redirect()->route('enseignant.index')->with('success', 'Enseignant ajouté avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $cin_enseignant)
    {
        $enseignants = Enseignant::all();
        $enseignant = Enseignant::where('cin_enseignant', $cin_enseignant)->first();

        // Tableau pour stocker le total des volumes horaires par enseignant
    $total_volumes_horaires = [];

    // Boucle à travers chaque enseignant
    foreach ($enseignants as $enseignants) {
        // Requête pour obtenir la somme des volumes horaires pour cet enseignant
        $total_volumes_horaires[$enseignants->cin_enseignant] = Module::where('cin_enseignant', $enseignants->cin_enseignant)->sum('volume_horaire');
    }
    $total_horaire_enseignant =  $total_volumes_horaires[$cin_enseignant];
        $modules = Module::where('cin_enseignant',$cin_enseignant)->get();
        return view('Enseignant.show',[
            'enseignant'=>$enseignant,
            'models'=>$modules,
            'total_horaire_enseignant'=>$total_horaire_enseignant
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($cin_enseignant)
    {
        $enseignant = Enseignant::where('cin_enseignant',$cin_enseignant)->first();

        $departements = Departement::all();

        // Retourner la vue avec les données de l'enseignant et les départements
        return view('enseignant.edit', [
            'enseignant'=>$enseignant,
            'departements'=>$departements
        ]);
    }

    public function update(Request $request, $cin_enseignant)
    {
        // Valider les données du formulaire
        $request->validate([
            'cin_enseignant' => 'required|string|max:255',
            'nom_enseignant' => 'required|string|max:255',
            'prenom_enseignant' => 'required|string|max:255',
            'date_naissance' => 'required|date',
            'email' => 'required|email|max:255',
            'specialite' => 'required|string|max:255',
            'situation' => 'required|string|max:255',
            'horaire_total' => 'required|integer',
            'date_affectation' => 'required|date',
            'nom_departement' => 'required|string|max:255',
        ]);

        $existingEnseignant = Enseignant::where('cin_enseignant', $request->cin_enseignant)->where('cin_enseignant', '!=', $cin_enseignant)->first();
        if ($existingEnseignant) {
            return redirect()->back()->with('error', 'CIN enseignant déjà existant.');
        }

        // Récupérer l'enseignant à mettre à jour
        $enseignant = Enseignant::where('cin_enseignant',$cin_enseignant)->first();

        // Mettre à jour les informations de l'enseignant
        $enseignant->cin_enseignant = $request->cin_enseignant;
        $enseignant->nom_enseignant = $request->nom_enseignant;
        $enseignant->prenom_enseignant = $request->prenom_enseignant;
        $enseignant->date_naissance = $request->date_naissance;
        $enseignant->email = $request->email;
        $enseignant->specialite = $request->specialite;
        $enseignant->situation = $request->situation;
        $enseignant->horaire_total = $request->horaire_total;
        $enseignant->date_affectation = $request->date_affectation;
        $enseignant->nom_departement = $request->nom_departement;

        // Sauvegarder les modifications
        $enseignant->save();

        // Rediriger avec un message de succès
        return redirect()->route('enseignant.index')->with('success', 'Enseignant mis à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($cin_enseignant)
{
    // Rechercher l'enseignant à supprimer
    $enseignant = Enseignant::where('cin_enseignant', $cin_enseignant)->firstOrFail();

    // Supprimer l'enseignant
    $enseignant->delete();

    // Redirection avec un message de succès
    return redirect()->route('enseignant.index')->with('success', 'Enseignant supprimé avec succès');
}
}
