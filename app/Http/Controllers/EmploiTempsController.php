<?php

namespace App\Http\Controllers;

use App\Models\EmploiTemps;
use Illuminate\Http\Request;
use App\Models\emploitempsstock;

class EmploiTempsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Emploi-Temps.EmploiTemps');
    }


    public function Recherche(){
        return view('Emploi-Temps.EmploiTemps');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Emploi-Temps.AjouterEmploiTemps');
    }

    public function store(Request $request)
        {
            // Validation des données
            $validatedData = $request->validate([
                'Departement' => 'required|string|max:255',
                'Filliere' => 'required|string|max:255',
                'Groupe' => 'required|string|max:255',
                'CraunauxDebut' => 'required|date_format:H:i',
                'CraunauxFin' => 'required|date_format:H:i',
            ]);

            // Création d'un nouvel enregistrement dans la base de données
            Emploitemps::create([
                'NomDepartement' => $validatedData['Departement'],
                'NomFilliere' => $validatedData['Filliere'],
                'Groupe' => $validatedData['Groupe'],
                'CraunauxDebut' => $validatedData['CraunauxDebut'],
                'CraunauxFin' => $validatedData['CraunauxFin'],
            ]);

            // Rediriger ou retourner une réponse appropriée
            return redirect()->route('Emploitemps.index')->with('success', 'Emploi du temps ajouté avec succès');
        }


        public function ResultatRecherche(Request $request)
        {
            // Validation des données du formulaire
            $validatedData = $request->validate([
                'Filliere' => 'required|string|max:255',
                'Groupe' => 'required|string|max:255',
            ]);

            // Rechercher l'enregistrement dans la base de données en fonction des critères
            $resultat = Emploitemps::where('NomFilliere', $validatedData['Filliere'])
                                   ->where('Groupe', $validatedData['Groupe'])
                                   ->first();

            $resultatRech = emploitempsstock::where('NomFilliere', $validatedData['Filliere'])
                            ->where('NomGroupe', $validatedData['Groupe'])
                            ->get();









            // Retourner la vue avec le résultat de la recherche
            return view('Emploi-Temps.RechercheEmploiTemps',[
                'resultat'=>$resultat,
                'resultatRech'=>$resultatRech

            ]);
        }
    /**
     * Display the specified resource.
     */
    public function show(EmploiTemps $emploiTemps)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($NomFilliere,$Groupe)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EmploiTemps $emploiTemps)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EmploiTemps $emploiTemps)
    {
        //
    }
}
