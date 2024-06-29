<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use Illuminate\Http\Request;
use App\Models\Filiere;
use App\Models\EmploiTemps;
use App\Models\Horaire;
use App\Models\Seance;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session as FacadesSession;

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
        $validatedData = $request->validate([
            'nom_departement' => 'required',
            'nom_filiere' => 'required',
            'semestre' => 'required',
            'groupe' => 'required',
            'nombre_seance' => 'required|integer|max:7',
            'horaires_debut' => 'required|array',
            'horaires_fin' => 'required|array',
        ]);
    
        $horairesDebut = $request->input('horaires_debut');
        $horairesFin = $request->input('horaires_fin');
    
        $errors = [];
        foreach ($horairesDebut as $key => $horaireDebut) {
            $horaireFin = $horairesFin[$key];
    
            if ($horaireDebut >= $horaireFin) {
                // Collecter les erreurs spécifiques à chaque champ d'heure
                $errors["horaires_debut.$key"] = 'L\'heure de début doit être inférieure à l\'heure de fin.';
                $errors["horaires_fin.$key"] = 'L\'heure de fin doit être supérieure à l\'heure de début.';
            }
        }
    
        $filiere = Filiere::where('nom_filiere', $validatedData['nom_filiere'])
            ->where('semestre', $validatedData['semestre'])
            ->firstOrFail();
        $id_filiere = $filiere->id;
    
        // Check if the schedule already exists
        $existingEmploiTemps = EmploiTemps::where('nom_departement', $validatedData['nom_departement'])
            ->where('id_filiere', $id_filiere)
            ->where('semestre', $validatedData['semestre'])
            ->where('groupe', $validatedData['groupe'])
            ->first();
    
        if ($existingEmploiTemps) {
            return Redirect::back()->withErrors(['emploi_temps' => 'Un emploi du temps pour cette combinaison existe déjà.'])->withInput();
        }
    
        if (!empty($errors)) {
            // Rediriger avec des messages d'erreur
            return Redirect::back()->withErrors($errors)->withInput();
        }
    
        // Création de l'emploi du temps
        $emploiTemps = new EmploiTemps();
        $emploiTemps->nom_departement = $validatedData['nom_departement'];
        $emploiTemps->id_filiere = $id_filiere;
        $emploiTemps->semestre = $validatedData['semestre'];
        $emploiTemps->groupe = $validatedData['groupe'];
        $emploiTemps->save();
    
        // Stocker les horaires
        foreach ($horairesDebut as $key => $horaireDebut) {
            $horaireFin = $horairesFin[$key];
    
            $horaire = new Horaire();
            $horaire->emploi_temps_id = $emploiTemps->id;
            $horaire->heure_debut = $horaireDebut;
            $horaire->heure_fin = $horaireFin;
            $horaire->save();
        }
        $resultats = EmploiTemps::where('id_filiere', $id_filiere)
            ->where('semestre',  $validatedData['semestre'])
            ->where('groupe', $validatedData['groupe'])
            ->first();

            $seances = Seance::with('module')
                ->where('id_filiere', $id_filiere)
                ->where('semestre',$validatedData['semestre'])
                ->where('nom_groupe', $validatedData['groupe'])
                ->get();


            $nombreSeances = $seances->count();
            $Departements = Departement::all();

            $nomFiliere = $validatedData['nom_filiere'];
            $semestre = $validatedData['semestre'];
            $groupe = $validatedData['groupe'];

            if ($resultats) {
                $Horaire = Horaire::where('emploi_temps_id',$resultats->id)->get();
                $countHoraire = $Horaire->count();
                    }else{
                        $Horaire = collect();
                        $countHoraire = $Horaire->count();
        
                    }

            


    
        // Rediriger avec un message de succès
        FacadesSession::flash('success', 'Emploi du temps ajouté avec succès.');
        return view('EmploiTemps.ResultRecherche',[
        'resultats' => $resultats,
         'seances' => $seances,
         'Departements'=>$Departements,
        'nomFiliere'=>$nomFiliere,
        'semestre'=>$semestre,
        'groupe'=>$groupe,
        'nombreSeances'=>$nombreSeances,
        'Horaire'=>$Horaire,
        'countHoraire' => $countHoraire,
        'idFiliere'=>$id_filiere
        ]);
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
        $filiere = Filiere::where('nom_filiere', $nomFiliere)
                            ->where('semestre',$semestre)
                            ->first();

        $idFiliere = $filiere->id;


        // Sélectionner toutes les séances en fonction des critères
        $seances = Seance::with('module')
                ->where('id_filiere', $idFiliere)
                ->where('semestre', $semestre)
                ->where('nom_groupe', $groupe)
                ->get();


            $nombreSeances = $seances->count();


        // Requête pour récupérer les données correspondantes dans la table EmploiTemps
        $resultats = EmploiTemps::where('id_filiere', $idFiliere)
            ->where('semestre', $semestre)
            ->where('groupe', $groupe)
            ->first();

            $Departements = Departement::all();

            if ($resultats) {
        $Horaire = Horaire::where('emploi_temps_id',$resultats->id)->get();
        $countHoraire = $Horaire->count();
            }else{
                $Horaire = collect();
                $countHoraire = $Horaire->count();

            }



        // Vous pouvez ensuite envoyer ces résultats à une vue pour l'affichage
        return view('EmploiTemps.ResultRecherche', [
        'resultats' => $resultats,
         'seances' => $seances,
         'Departements'=>$Departements,
        'nomFiliere'=>$nomFiliere,
        'semestre'=>$semestre,
        'groupe'=>$groupe,
        'nombreSeances'=>$nombreSeances,
        'Horaire'=>$Horaire,
        'countHoraire' => $countHoraire,
        'idFiliere'=>$idFiliere

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
    public function destroy( $id)
    {
        $EmploiTemps = EmploiTemps::findOrFail($id);

        // Delete the Filiere instance
        $EmploiTemps->delete();

        return redirect()->route('Emploitemps.index')->with('success', 'Emploi Temps supprimée avec succès.');

    }
}
