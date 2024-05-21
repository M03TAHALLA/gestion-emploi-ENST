<?php

namespace App\Http\Controllers;

use App\Models\emploitempsstock;
use App\Models\Emploitemps;
use Illuminate\Http\Request;

class EmploiStockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Emploi-Temps.EmploitempsEdit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation des données
        $validatedData = $request->validate([
            'NomFilliere' => 'required|string|max:255',
            'NomGroupe' => 'required|string|max:255',
            'NomModule' => 'required|string|max:255',
            'Jour' => 'required|string|max:255',
            'HeurDebut' => 'required|date_format:H:i',
            'HeurFin' => 'required|date_format:H:i',
            'NumSalle' => 'required|string|max:255',
            'TypeSalle' => 'required|string|max:255',
            'NomEnseignant' => 'required|string|max:255',
            'PrenomEnseignant' => 'required|string|max:255',
        ]);

        // Création d'un nouvel enregistrement dans la table emploitempsstock
        emploitempsstock::create([
            'NomFilliere' => $validatedData['NomFilliere'],
            'NomGroupe' => $validatedData['NomGroupe'],
            'NomModule' => $validatedData['NomModule'],
            'Jour' => $validatedData['Jour'],
            'HeurDebut' => $validatedData['HeurDebut'],
            'HeurFin' => $validatedData['HeurFin'],
            'NumSalle' => $validatedData['NumSalle'],
            'TypeSalle' => $validatedData['TypeSalle'],
            'NomEnseignant' => $validatedData['NomEnseignant'],
            'PrenomEnseignant' => $validatedData['PrenomEnseignant'],
        ]);

        // Rediriger ou retourner une réponse appropriée
        return redirect()->route('fillieres.index')->with('success', 'Emploi du temps stocké avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show($NomFilliere, $Groupe)
    {
        $emploitemps = Emploitemps::where('NomFilliere', $NomFilliere)
                                    ->where('Groupe', $Groupe)
                                    ->first();
            return view('Emploi-Temps.EmploitempsEdit',[
            'EmploiTemps'=>$emploitemps
]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(emploitempsstock $emploitempsstock)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, emploitempsstock $emploitempsstock)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(emploitempsstock $emploitempsstock)
    {
        //
    }
}
