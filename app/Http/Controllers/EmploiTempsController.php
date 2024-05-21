<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use App\Models\EmploiTemps;
use Illuminate\Http\Request;
use App\Models\emploitempsstock;
use App\Models\Filliere;

class EmploiTempsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fillieres = Filliere::all();
        $Departement = Departement::all();
        return view('Emploi-Temps.EmploiTemps',[
            'Fillieres'=>$fillieres,
            'Departement'=>$Departement
        ]);
    }


    public function Recherche(){
        $fillieres = Filliere::all();
        $Departement = Departement::all();
        return view('Emploi-Temps.EmploiTemps',[
            'Fillieres'=>$fillieres,
            'Departement'=>$Departement

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $fillieres = Filliere::all();
        $Departement = Departement::all();
        return view('Emploi-Temps.AjouterEmploiTemps',[
            'Fillieres'=>$fillieres,
            'Departement'=>$Departement
        ]);
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

    // Sélectionner tous les NomFilliere de la table Filliere avec le NomDepartement donné
    $fillieres = Filliere::where('NomDepartement', $validatedData['Departement'])->pluck('NomFilliere');

    // Vérifier si le NomFilliere donné est dans la liste des fillieres récupérées
    if ($fillieres->contains($validatedData['Filliere'])) {
        // Récupérer le nombre maximal de groupes pour la filière spécifiée
        $nombreMaxGroupe = Filliere::where('NomFilliere', $validatedData['Filliere'])->value('NombreGroupe');

        // Vérifier si le groupe spécifié dépasse ou est égal au nombre maximal de groupes
        if ($validatedData['Groupe'] > $nombreMaxGroupe) {
            return redirect()->back()->withErrors(['Groupe' => 'Le groupe spécifié dépasse le nombre maximal de groupes pour cette filière.']);
        }

        // Vérifier si la combinaison Groupe et Filliere existe déjà dans la table Emploitemps
        $existingEmploitemps = Emploitemps::where('NomFilliere', $validatedData['Filliere'])
                                           ->where('Groupe', $validatedData['Groupe'])
                                           ->exists();

        if ($existingEmploitemps) {
            // Retourner un message d'erreur si la combinaison Groupe et Filliere existe déjà
            return redirect()->back()->withErrors(['Groupe' => 'La combinaison de groupe et de filière existe déjà dans l\'emploi du temps.']);
        } else {
            // Création d'un nouvel enregistrement dans la base de données
            Emploitemps::create([
                'NomDepartement' => $validatedData['Departement'],
                'NomFilliere' => $validatedData['Filliere'],
                'Groupe' => $validatedData['Groupe'],
                'CraunauxDebut' => $validatedData['CraunauxDebut'],
                'CraunauxFin' => $validatedData['CraunauxFin'],
            ]);

            $nombreLignes = Emploitemps::where('NomFilliere', $validatedData['Filliere'])->count();
            $nombreMaxGroupe = Filliere::where('NomFilliere', $validatedData['Filliere'])->value('NombreGroupe');

                if ($nombreLignes == $nombreMaxGroupe) {
                    // Editer la valeur de EmploiTempsDispo dans la table Filliere
                    Filliere::where('NomFilliere', $validatedData['Filliere'])->update(['EmploiTempsDispo' => 1]);
                }


            // Rediriger ou retourner une réponse appropriée
            return redirect()->route('Emploitemps.index')->with('success', 'Emploi du temps ajouté avec succès');
        }
    } else {
        // Retourner un message d'erreur si le NomFilliere n'est pas trouvé
        return redirect()->back()->withErrors(['Filliere' => 'La filière spécifiée n\'appartient pas au département donné.']);
    }
}





        public function ResultatRecherche(Request $request)
        {
            $validatedData = $request->validate([
                'Filliere' => 'required|string|max:255',
                'Groupe' => 'required|string|max:255',
            ]);

            $resultat = Emploitemps::where('NomFilliere', $validatedData['Filliere'])
                                   ->where('Groupe', $validatedData['Groupe'])
                                   ->first();

            $resultatRech = emploitempsstock::where('NomFilliere', $validatedData['Filliere'])
                            ->where('NomGroupe', $validatedData['Groupe'])
                            ->get();


            $fillieres = Filliere::all();
            $Departement = Departement::all();






            return view('Emploi-Temps.RechercheEmploiTemps',[
                'resultat'=>$resultat,
                'resultatRech'=>$resultatRech,
                'Fillieres'=>  $fillieres,
                'Departement'=>$Departement

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
