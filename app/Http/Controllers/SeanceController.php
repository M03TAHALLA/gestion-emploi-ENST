<?php

namespace App\Http\Controllers;

use App\Models\Enseignant;
use App\Models\Module;
use Illuminate\Http\Request;
use App\Models\Filiere;
use App\Models\Salle;
use App\Models\Seance;
use App\Models\EmploiTemps;
use App\Models\Departement;
use App\Models\Horaire;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class SeanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    // Récupérer les paramètres de la session
    $id_filiere = session('id_filiere');
    $semestre = session('semestre');
    $nom_groupe = session('nom_groupe');

    $filiere = Filiere::where('id',$id_filiere)->first();

    $nomFiliere = $filiere->nom_filiere;

    // Récupérer les départements
    $Departements = Departement::all();

    // Récupérer les séances correspondantes
    $seances = Seance::with('module')
                ->where('id_filiere', $id_filiere)
                ->where('semestre', $semestre)
                ->where('nom_groupe', $nom_groupe)
                ->get();




    $nombreSeances = $seances->count();

    // Récupérer les résultats (si nécessaire)
    $resultats = EmploiTemps::where('id_filiere', $id_filiere)
                    ->where('semestre', $semestre)
                    ->where('groupe', $nom_groupe)
                    ->first();


                    if ($resultats) {
                        $Horaire = Horaire::where('emploi_temps_id',$resultats->id)->get();
                        $countHoraire = $Horaire->count();
                            }else{
                                $Horaire = collect();
                                $countHoraire = $Horaire->count();

                            }

                    // Retourner la vue avec les données
                    return view('EmploiTemps.ResultRecherche', [
                        'seances' => $seances,
                        'resultats' => $resultats,
                        'Departements' => $Departements,
                        'nombreSeances' => $nombreSeances,
                        'nomFiliere' => $nomFiliere,
                        'semestre' => $semestre,
                        'groupe' => $nom_groupe,
                        'Horaire' => $Horaire,
                        'countHoraire' => $countHoraire // Ajout de la variable countHoraire
                    ]);
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Valider les données entrantes
    $validatedData = $request->validate([
        'id_filiere' => 'required|integer',
        'nom_groupe' => 'required|string',
        'semestre' => 'required|string',
        'id_module' => 'required|integer',
        'jour' => 'required|string',
        'heure_debut' => 'required|date_format:H:i',
        'heure_fin' => 'required|date_format:H:i|after:heure_debut',
        'num_salle' => 'required|integer',
        'cin_enseignant' => 'required|string',
    ]);

    $seances = Seance::all();

    $seanceExiste = Seance::where('num_salle', $validatedData['num_salle'])
    ->where('jour', $validatedData['jour'])
    ->where('heure_debut',$validatedData['heure_debut'])
    ->where('heure_fin',$validatedData['heure_fin'])
    ->exists();

    if ($seanceExiste) {
        return Redirect::back()->withErrors(['error' => 'La salle ' . $validatedData['num_salle'] . ' est déjà réservée pour ' . $validatedData['jour'] . ' de ' . $validatedData['heure_debut'] . ' à ' . $validatedData['heure_fin']]);
    }


    $id = EmploiTemps::where('id_filiere', $validatedData['id_filiere'])
        ->where('semestre', $validatedData['semestre'])
        ->where('groupe',  $validatedData['nom_groupe'])
        ->first();



    $Horairesdebut = Horaire::where('emploi_temps_id', $id->id)->pluck('heure_debut');
    $Horairesfin = Horaire::where('emploi_temps_id', $id->id)->pluck('heure_fin');

    $heuresDebut = $Horairesdebut->map(function ($heureDebut) {
        return \Carbon\Carbon::parse($heureDebut)->format('H:i');
    });


    $heuresFin = $Horairesfin->map(function ($heureFin) {
        return \Carbon\Carbon::parse($heureFin)->format('H:i');
    });



    if($heuresDebut->contains($validatedData['heure_debut']) &&  $heuresFin->contains($validatedData['heure_fin'])){

    }else{
        return redirect()->back()->withErrors(['error' => 'Les heures ne correspondent à aucun horaire de Emploi Temps']);
    }













    // Vérifier si la séance existe déjà
    $existingSeance = Seance::where('id_filiere', $validatedData['id_filiere'])
        ->where('nom_groupe', $validatedData['nom_groupe'])
        ->where('jour', $validatedData['jour'])
        ->where('semestre',$validatedData['semestre'])
        ->where('heure_debut', $validatedData['heure_debut'])
        ->where('heure_fin', $validatedData['heure_fin'])
        ->first();

    if ($existingSeance) {
        // Si la séance existe déjà, retourner un message d'erreur
        return redirect()->back()->withErrors(['error' => 'Cette Horaire est déjà réservée dans l\'emploi du temps.']);
    }

    // Créer un nouvel enregistrement de Seance
    $seance = new Seance();
    $seance->id_filiere = $validatedData['id_filiere'];
    $seance->nom_groupe = $validatedData['nom_groupe'];
    $seance->semestre = $validatedData['semestre'];
    $seance->id_module = $validatedData['id_module'];
    $seance->jour = $validatedData['jour'];
    $seance->heure_debut = $validatedData['heure_debut'];
    $seance->heure_fin = $validatedData['heure_fin'];
    $seance->num_salle = $validatedData['num_salle'];
    $seance->cin_enseignant = $validatedData['cin_enseignant'];

    // Sauvegarder la séance dans la base de données
    $seance->save();

    // Stocker les informations nécessaires dans la session
    session([
        'id_filiere' => $validatedData['id_filiere'],
        'semestre' => $validatedData['semestre'],
        'nom_groupe' => $validatedData['nom_groupe'],
    ]);

    // Rediriger vers la route Seance.index avec un message de succès
    return redirect()->route('Seance.index')
        ->with('success', 'Séance ajoutée avec succès!');
}


    /**
     * Display the specified resource.
     */
    public function show($id_filiere, $groupe, $semestre)
{
    $jour = request()->query('jour');

    $nomfiliere = Filiere::where('id', $id_filiere)->first();

    $modules = Module::where('id_filiere', $id_filiere)
                            ->where('semestre',$semestre)
                            ->get();


    $salles = Salle::where('nom_departement', $nomfiliere->nom_departement)->get();
    $enseignant = Enseignant::where('nom_departement', $nomfiliere->nom_departement)->get();

    $id = EmploiTemps::where('id_filiere', $id_filiere)
        ->where('semestre', $semestre)
        ->where('groupe', $groupe)
        ->first();

    $horairesIndispo = Seance::where('id_filiere', $id_filiere)
                                ->where('semestre',$semestre)
                                ->where('nom_groupe',$groupe)
                                ->where('jour',$jour)
                                ->get();


    $Horaires = Horaire::where('emploi_temps_id', $id->id)->get();

    $countHoraires = $Horaires->count();


    return view('Seance.create', [
        'modules' => $modules,
        'id_filiere' => $id_filiere,
        'nomfiliere' => $nomfiliere,
        'groupe' => $groupe,
        'semestre' => $semestre,
        'salles' => $salles,
        'enseignant' => $enseignant,
        'Horaires' => $Horaires,
        'id' => $id,
        'jour' => $jour,
        'horairesIndispo'=>$horairesIndispo,
        'countHoraires'=>$countHoraires
    ]);
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

    public function getEnseignants($moduleId, $filiereId, $semestre)
{
    $module = Module::where('id', $moduleId)
                    ->where('id_filiere', $filiereId)
                    ->where('semestre', $semestre)
                    ->first();

    if ($module) {
        $enseignants = $module->enseignants; // Assuming you have a relation defined in the Module model
    } else {
        $enseignants = [];
    }

    return response()->json($enseignants);
}

}
