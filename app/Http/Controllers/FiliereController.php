<?php

namespace App\Http\Controllers;
use App\Models\Filiere;
use App\Models\Departement;
use Illuminate\Http\Request;

class FiliereController extends Controller
{
    public function index()
{
    $filieres = Filiere::with('emploi_temps')->get();

    $disponibilites = $filieres->map(function($filiere) {
        $nombreGroupes = $filiere->groupe; // Assumant que vous avez une colonne 'nombre_groupes' dans la table 'filieres'
        $nombreEmploisTemps = $filiere->emploi_temps->count();

        return [
            'filiere' => $filiere,
            'disponible' => $nombreGroupes == $nombreEmploisTemps
        ];
    });

    return view('Fillieres.index', compact('disponibilites'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departements = Departement::all();
        return view('Fillieres.create', compact('departements'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom_filiere' => 'required|string|max:255',
            'nom_departement' => 'required|string|max:255',
            'cordinateur' => 'required|string|max:255',
            'semestre' => 'required|integer',
            'groupe' => 'required|integer',
        ]);

        // Vérifier si la filière existe déjà
        $existingFiliere = Filiere::where('nom_filiere', $validatedData['nom_filiere'])
                                    ->where('semestre', $validatedData['semestre'])
                                    ->first();

        if ($existingFiliere) {
            return redirect()->back()->with('error', 'Cette filière pour ce semestre existe déjà.');
        }

        Filiere::create($validatedData);

        return redirect()->route('fillieres.index')->with('success', 'Filière créée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Filiere $filiere)
    {
        return view('Fillieres.show', compact('filiere'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($filiere)
    {
        $departement = Departement::all();

        $nom_departement = Filiere::where('id',$filiere)
                            ->value("nom_departement");

                $filiere = Filiere::where('id',$filiere)
                            ->first();



        return view('Fillieres.edit',[
            'filiere'=>$filiere,
            'nom_departement'=>$nom_departement,
            'departements'=>$departement
        ]);
    }

    /**
     * Update the specified resource in storage.
     */

     public function update(Request $request, $id)
     {
         // Valider les données du formulaire
         $request->validate([
             'nom_filiere' => 'required|string',
             'nom_departement' => 'required|string',
             'cordinateur' => 'required|string',
             'semestre' => 'required|integer',
             'groupe' => 'required|integer',
         ]);

         // Récupérer la filière à mettre à jour
         $filiere = Filiere::findOrFail($id);

         // Mettre à jour les propriétés de la filière avec les données du formulaire
         $filiere->nom_filiere = $request->input('nom_filiere');
         $filiere->nom_departement = $request->input('nom_departement');
         $filiere->cordinateur = $request->input('cordinateur');
         $filiere->semestre = $request->input('semestre');
         $filiere->groupe = $request->input('groupe');

         // Enregistrer les modifications dans la base de données
         $filiere->save();

         // Rediriger avec un message de succès
         return redirect()->route('fillieres.index')->with('success', 'Filière mise à jour avec succès.');
     }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($filiere)
    {
        // Retrieve the Filiere instance by ID or fail if not found
        $filiereInstance = Filiere::findOrFail($filiere);

        // Delete the Filiere instance
        $filiereInstance->delete();

        return redirect()->route('fillieres.index')->with('success', 'Filière supprimée avec succès.');
    }

}
