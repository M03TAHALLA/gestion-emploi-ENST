<?php

namespace App\Http\Controllers;

use App\Models\emploitempsstock;
use App\Models\Emploitemps;
use App\Models\Filliere;

use Illuminate\Http\Request;

class EmploiStockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $NomFilliere = session('NomFilliere');
        $NomGroupe = session('NomGroupe');
        $Semestre = session('Semestre');

        if ($NomFilliere && $NomGroupe) {
            $resultat = Emploitemps::where('NomFilliere', $NomFilliere)
                                   ->where('Groupe', $NomGroupe)
                                   ->first();

            $resultatRech = emploitempsstock::where('NomFilliere', $NomFilliere)
                                            ->where('NomGroupe', $NomGroupe)
                                            ->where('Semestre',$Semestre)
                                            ->get();
        } else {
            $resultat = null;
            $resultatRech = collect();
        }
        $fillieres = Filliere::select('NomFilliere')->distinct()->get();

        return view('Emploi-Temps.RechercheEmploiTemps', [
            'resultat' => $resultat,
            'resultatRech' => $resultatRech,
            'Fillieres'=>  $fillieres,
        ]);
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

    $validatedData = $request->validate([
        'NomFilliere' => 'required|string|max:255',
        'Semestre'=> 'required|integer',
        'NomGroupe' => 'required|integer',
        'NomModule' => 'required|string|max:255',
        'Jour' => 'required|string|max:255',
        'HeurDebut' => 'required|date_format:H:i',
        'HeurFin' => 'required|date_format:H:i',
        'NumSalle' => 'required|integer',
        'TypeSalle' => 'required|string|max:255',
        'NomEnseignant' => 'required|string|max:255',
        'PrenomEnseignant' => 'required|string|max:255',
    ]);

    emploitempsstock::create([
        'NomFilliere' => $validatedData['NomFilliere'],
        'Semestre' => $validatedData['Semestre'],
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

    return redirect()->route('EmploiStock.index')->with([
        'NomFilliere' => $validatedData['NomFilliere'],
        'NomGroupe' => $validatedData['NomGroupe'],
        'Semestre' => $validatedData['Semestre']
    ]);
}



    /**
     * Display the specified resource.
     */
    public function show($NomFilliere, $Groupe,$Semestre)
    {
        $emploitemps = Emploitemps::where('NomFilliere', $NomFilliere)
                                    ->where('Groupe', $Groupe)
                                    ->where('Semestre',$Semestre)
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
