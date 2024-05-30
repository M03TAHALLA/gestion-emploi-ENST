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
        $fillieres = Filliere::distinct()->get(['NomFilliere']);
        $Departement = Departement::all();
        return view('Emploi-Temps.EmploiTemps',[
            'Fillieres'=>$fillieres,
            'Departement'=>$Departement
        ]);
    }

    public function getSemesters($filliere)
    {
        $semesters = Filliere::where('NomFilliere', $filliere)->pluck('Semestre')->unique()->sort()->values();;
        return response()->json($semesters);
    }
    public function getFillieres($departement)
    {
        $fillieres = Filliere::where('NomDepartement', $departement)->distinct()->pluck('NomFilliere')->unique()->sort()->values();
        return response()->json($fillieres);
    }

    public function getGroups($filliere, $semestre)
{
    $filliereData = Filliere::where('NomFilliere', $filliere)
                                ->where('Semestre',$semestre)
                                ->first();
    $groupCount = $filliereData ? $filliereData->NombreGroupe : 0;

    $groups = [];
    for ($i = 1; $i <= $groupCount; $i++) {
        $groups[] = $i;
    }

    return response()->json($groups);
}


    public function Recherche(){
        $fillieres = Filliere::distinct()->get(['NomFilliere']);
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
        $fillieres = Filliere::distinct()->get(['NomFilliere']);
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
        'Groupe' => 'required|integer',
        'Semestre' => 'required|integer',
        'CraunauxDebut' => 'required|date_format:H:i',
        'CraunauxFin' => 'required|date_format:H:i',
    ]);

    // Sélectionner tous les NomFilliere de la table Filliere avec le NomDepartement donné
    $fillieres = Filliere::where('NomDepartement', $validatedData['Departement'])->pluck('NomFilliere');

    // Vérifier si le NomFilliere donné est dans la liste des fillieres récupérées
    if ($fillieres->contains($validatedData['Filliere'])) {

        // Vérifier si la combinaison Groupe et Filliere existe déjà dans la table Emploitemps
        $existingEmploitemps = Emploitemps::where('NomFilliere', $validatedData['Filliere'])
                                           ->where('Semestre', $validatedData['Semestre'])
                                           ->where('Groupe',$validatedData['Groupe'])
                                           ->exists();

        if ($existingEmploitemps) {
            // Retourner un message d'erreur si la combinaison Groupe et Filliere existe déjà
            return redirect()->back()->withErrors(['Groupe' => 'Cette Filliere Et Semestre et Groupe Est Deja Affecter le Une Emploi Temps']);
        } else {
            // Création d'un nouvel enregistrement dans la base de données
            Emploitemps::create([
                'NomDepartement' => $validatedData['Departement'],
                'NomFilliere' => $validatedData['Filliere'],
                'Groupe' => $validatedData['Groupe'],
                'Semestre'=>$validatedData['Semestre'],
                'CraunauxDebut' => $validatedData['CraunauxDebut'],
                'CraunauxFin' => $validatedData['CraunauxFin'],
            ]);


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
                'Groupe' => 'required|integer',
                'Semestre'=> 'required|integer',
            ]);

            $resultat = Emploitemps::where('NomFilliere', $validatedData['Filliere'])
                                   ->where('Groupe', $validatedData['Groupe'])
                                   ->where('Semestre',$validatedData['Semestre'])
                                   ->first();

            $resultatRech = emploitempsstock::where('NomFilliere', $validatedData['Filliere'])
                            ->where('NomGroupe', $validatedData['Groupe'])
                            ->where('Semestre', $validatedData['Semestre'])
                            ->get();


            $fillieres = Filliere::distinct()->get(['NomFilliere']);
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
