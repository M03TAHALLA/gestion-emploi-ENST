<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use App\Models\Salle;
use App\Models\Seance;
use Illuminate\Http\Request;


class SalleController extends Controller
{
    public function index()
    {

        $salles = Salle::all();
        return view('salles.index', compact('salles'));
    }

    public function create()
    {
        $departements = Departement::all();
        return view('salles.create', compact('departements'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom_departement' => 'required|string|max:255',
            'type_salle' => 'required|in:Salle,Amphi,Laboratoire',
            'capacite' => 'required|integer',
        ]);

        Salle::create($request->all());

        return redirect()->route('salles.index')
                        ->with('success', 'Salle créée avec succès.');
    }

    public function show(Salle $salle)
    {
        return view('salles.show', compact('salle'));
    }

    public function edit(Salle $salle)
{
    $departements = Departement::all(); // Récupérer tous les départements
    return view('salles.edit', compact('salle', 'departements')); // Passer les départements à la vue
}

    public function update(Request $request, Salle $salle)
    {
        $request->validate([
            'nom_departement' => 'required|string|max:255',
            'type_salle' => 'required|in:Salle,Amphi,Laboratoire',
            'capacite' => 'required|integer',
            'disponibilite' => 'required|boolean',
        ]);

        $salle->update($request->all());

        return redirect()->route('salles.index')
                        ->with('success', 'Salle mise à jour avec succès.');
    }

    public function destroy(Salle $salle)
    {
        $salle->delete();

        return redirect()->route('salles.index')
                        ->with('success', 'Salle supprimée avec succès.');
    }
    public function recherche()
    {
        $seances = Seance::all();
        return view('recherche', compact('seances'));
    }
}
