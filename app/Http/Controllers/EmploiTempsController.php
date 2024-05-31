<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use Illuminate\Http\Request;
use App\Models\Filiere;
use App\Models\EmploiTemps;
use App\Models\Seance;
use Illuminate\Support\Facades\DB;



class EmploiTempsController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Departements = Departement::all();
        return view('EmploiTemps.index',[
            'Departements'=>$Departements
        ]);
    }

    public function getFilieres($departement)
{
    $filieres = Filiere::where('nom_departement', $departement)->distinct()->pluck('nom_filiere');
    return response()->json($filieres);
}


public function getSemesters($filiere)
{
    // Récupérer tous les enregistrements correspondant au nom de filière donné
    $filiereData = Filiere::where('nom_filiere', $filiere)->get();

    // Vérifier si des enregistrements ont été trouvés
    if ($filiereData->isEmpty()) {
        return response()->json(['error' => 'Filière non trouvée'], 404);
    }

    // Initialiser un tableau pour stocker tous les semestres
    $semesters = [];

    // Parcourir chaque enregistrement et ajouter ses semestres à la liste
    foreach ($filiereData as $record) {
        $semesters = array_merge($semesters, explode(',', $record->semestre));
    }

    // Supprimer les doublons et réorganiser les indices du tableau
    $semesters = array_values(array_unique($semesters));

    return response()->json($semesters);
}


    public function getGroups($filiere, $semestre)
    {
        $filliereData = Filiere::where('nom_filiere', $filiere)
                                ->where('semestre',$semestre)
                                ->first();
        $groups = range(1, $filliereData->groupe);

        return response()->json($groups);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Departements = Departement::all();

        return view('EmploiTemps.create',[
            'Departements'=>$Departements
        ]);
    }




    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'nom_departement' => 'required',
            'nom_filiere' => 'required',
            'semestre' => 'required',
            'groupe' => 'required',
            'crenau_debut' => 'required',
            'crenau_fin' => 'required',
        ]);

        // Trouver l'ID de la filière à partir de son nom
        $nomFiliere = $request->input('nom_filiere');
        $filiere = Filiere::where('nom_filiere', $nomFiliere)->first();

        if (!$filiere) {
            // Si la filière n'est pas trouvée, vous pouvez retourner un message d'erreur ou gérer la situation selon vos besoins
            return redirect()->back()->with('error', 'La filière sélectionnée n\'existe pas.');
        }

        // Créer un nouvel emploi du temps
        $emploiTemps = new EmploiTemps();
        $emploiTemps->nom_departement = $request->input('nom_departement');
        $emploiTemps->id_filiere = $filiere->id; // Utilisez l'ID de la filière trouvée
        $emploiTemps->semestre = $request->input('semestre');
        $emploiTemps->groupe = $request->input('groupe');
        $emploiTemps->crenau_debut = $request->input('crenau_debut');
        $emploiTemps->crenau_fin = $request->input('crenau_fin');
        // Vous pouvez également définir d'autres champs de votre emploi du temps si nécessaire

        // Enregistrer l'emploi du temps dans la base de données
        $emploiTemps->save();

        // Rediriger avec un message de succès
        return redirect()->route('Emploitemps.index')->with('success', 'L\'emploi du temps a été ajouté avec succès.');
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
    public function ResultatRecherche(Request $request)
    {
        // Récupérer les données du formulaire
        $departement = $request->input('nom_departement');
        $nomFiliere = $request->input('nom_filiere');
        $semestre = $request->input('semestre');
        $groupe = $request->input('groupe');

        // Trouver l'ID de la filière à partir de son nom
        $filiere = Filiere::where('nom_filiere', $nomFiliere)->first();
        $idFiliere = $filiere->id;

        // Sélectionner toutes les séances en fonction des critères
        $seances = Seance::where('id_filiere', $idFiliere)
            ->where('semestre', $semestre)
            ->where('nom_groupe', $groupe)
            ->get();

        // Requête pour récupérer les données correspondantes dans la table EmploiTemps
        $resultats = EmploiTemps::where('nom_departement', $departement)
            ->where('id_filiere', $idFiliere)
            ->where('semestre', $semestre)
            ->where('groupe', $groupe)
            ->first();

            $Departements = Departement::all();


        // Vous pouvez ensuite envoyer ces résultats à une vue pour l'affichage
        return view('EmploiTemps.ResultRecherche', [
        'resultats' => $resultats,
         'seances' => $seances,
         'Departements'=>$Departements,
        'nomFiliere'=>$nomFiliere,
        'semestre'=>$semestre,
        'groupe'=>$groupe
    ]);
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
