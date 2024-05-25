<?php

namespace App\Http\Controllers;

use App\Models\Filliere;
use App\Models\Departement;
use Illuminate\Http\Request;
use App\Models\EmploiTemps;
use App\Models\EmploiTempsStock;
use Illuminate\Support\Facades\DB;

class FilliereController extends Controller
{
    // Affiche la liste des filières
    public function index()
    {
        $fillieres = Filliere::all();
    $departements = Departement::all();

    $dispoEmploi = [];

    foreach($fillieres as $filliere){
        $nombreLignes = EmploiTemps::where('NomFilliere', $filliere->NomFilliere)
                                    ->where('Semestre', $filliere->Semestre)
                                    ->count();

        $disponible = $filliere->NombreGroupe == $nombreLignes ? 1 : 0;

        $dispoEmploi[] = $disponible;
    }
        return view('Fillieres.filieres', [
            'fillieres' => $fillieres,
            'Departement' => $departements,
            'dispoEmploi'=>$dispoEmploi
        ]);
    }

    // Affiche le formulaire de création de filière
    public function create()
    {
        $departements = Departement::all();
        return view('Fillieres.filieres-form', [
            'Departement' => $departements
        ]);
    }

    // Enregistre une nouvelle filière
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'NomFilliere' => 'required|string|max:255',
            'NomDepartement' => 'required|string|max:255',
            'Cordinateur' => 'required|string|max:255',
            'Semestre' => 'required|integer',
            'NombreGroupe' => 'required|integer',
        ]);

        $existingFilliere = Filliere::where('NomFilliere', $validatedData['NomFilliere'])
                                     ->where('Semestre', $validatedData['Semestre'])
                                     ->first();

        if ($existingFilliere) {
            return redirect()->back()->with('error', 'Cette filière existe déjà.');
        }

        Filliere::create($validatedData);

        return redirect()->route('fillieres.index')->with('success', 'Filière créée avec succès');
    }

    // Affiche une filière spécifique
    public function show($id)
    {
        $filliere = Filliere::findOrFail($id);
        return view('Fillieres.show', compact('filliere'));
    }

    // Affiche le formulaire de modification de filière
    public function edit(Filliere $filliere)
    {
        $departements = Departement::all();
        return view('Fillieres.filieres-form-edit', compact('filliere', 'departements'));
    }

    // Met à jour une filière existante
    public function update(Request $request, Filliere $filliere)
    {
        $validatedData = $request->validate([
            'NomFilliere' => 'required|string|max:255',
            'NomDepartement' => 'required|string|max:255',
            'Cordinateur' => 'required|string|max:255',
            'Semestre' => 'required|integer',
            'NombreGroupe' => 'required|integer',
        ]);

        $oldFilliere = clone $filliere;

        DB::transaction(function () use ($validatedData, $filliere, $oldFilliere) {
            $existingFilliere = Filliere::where('NomFilliere', $validatedData['NomFilliere'])
                ->where('Semestre', $validatedData['Semestre'])
                ->where('NomDepartement', $validatedData['NomDepartement'])
                ->where('NombreGroupe', $validatedData['NombreGroupe'])
                ->first();

            if ($existingFilliere && $existingFilliere->id != $filliere->id) {
                throw new \Exception('Cette filière existe déjà.');
            }

            $filliere->update($validatedData);

            $this->updateEmploiTemps($oldFilliere, $filliere);
            $this->updateEmploiTempsStock($oldFilliere, $filliere);
        });

        return redirect()->route('fillieres.index')->with('success', 'Filière mise à jour avec succès');
    }

    // Supprime une filière
    public function destroy(Filliere $filliere)
{
    DB::transaction(function () use ($filliere) {
        // Supprimer les enregistrements correspondants dans EmploiTemps
        EmploiTemps::where('NomFilliere', $filliere->NomFilliere)
            ->where('Semestre', $filliere->Semestre)
            ->delete();

        // Supprimer les enregistrements correspondants dans EmploiTempsStock
        EmploiTempsStock::where('NomFilliere', $filliere->NomFilliere)
            ->where('Semestre', $filliere->Semestre)
            ->delete();

        // Supprimer la filière
        $filliere->delete();
    });

    return redirect()->route('fillieres.index')->with('success', 'La filière a été supprimée avec succès.');
}

    // Met à jour les enregistrements dans EmploiTemps
    private function updateEmploiTemps(Filliere $oldFilliere, Filliere $newFilliere)
    {
        EmploiTemps::where('NomFilliere', $oldFilliere->NomFilliere)
                   ->where('Semestre', $oldFilliere->Semestre)
                   ->update([
                       'NomFilliere' => $newFilliere->NomFilliere,
                       'NomDepartement' => $newFilliere->NomDepartement,
                       'Semestre'=>$newFilliere->Semestre
                   ]);
    }

    // Met à jour les enregistrements dans EmploiTempsStock
    private function updateEmploiTempsStock(Filliere $oldFilliere, Filliere $newFilliere)
    {
        EmploiTempsStock::where('NomFilliere', $oldFilliere->NomFilliere)
                        ->where('Semestre', $oldFilliere->Semestre)
                        ->update([
                            'NomFilliere' => $newFilliere->NomFilliere,
                            'Semestre'=>$newFilliere->Semestre
                        ]);
    }
}
