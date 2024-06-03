<?php
namespace App\Http\Controllers;

use App\Models\Departement;
use App\Models\Enseignant;
use Illuminate\Http\Request;

class EnseignantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $enseignants = Enseignant::all();
        return view('Enseignant.index', compact('enseignants'));
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
