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

    // Vérifier si la séance existe déjà
    $existingSeance = Seance::where('id_filiere', $validatedData['id_filiere'])
        ->where('nom_groupe', $validatedData['nom_groupe'])
        ->where('jour', $validatedData['jour'])
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
    $modules = Module::where('id_filiere', $id_filiere)->get();
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
}
