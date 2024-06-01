<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use Illuminate\Http\Request;

class DepartementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departements = Departement::all();
        return view('Departement.index', ['departements' => $departements]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Departement.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom_departement' => 'required|unique:departements|string|max:255',
            'aac' => 'nullable|string|max:255'
        ]);

        $existingDepartement = Departement::where('nom_departement', $validatedData['nom_departement'])->first();
        if ($existingDepartement) {
            return redirect()->back()->with('error', 'Ce département existe déjà.');
        }

        Departement::create($validatedData);
        return redirect()->route('departements.index')->with('success', 'Département créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Departement $departement)
    {
        return view('Departement.show', ['departement' => $departement]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($departement)
    {
        $departements = Departement::where('nom_departement',$departement)
        ->first();
        return view('Departement.edit',[
            'departements'=>$departements
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$departement)
    {
        $validatedData = $request->validate([
            'nom_departement' => 'required|string|max:255',
            'aac' => 'nullable|string|max:255'
        ]);

        $existingDepartement = Departement::where('nom_departement', $validatedData['nom_departement'])
                                          ->where('nom_departement', '!=', $departement)
                                          ->first();

        if ($existingDepartement) {
            return redirect()->back()->with('error', 'Ce département existe déjà.');
        }

        // Retrieve the Filiere instance by ID or fail if not found
        $departements = Departement::findOrFail($departement);

        // Update the Filiere instance with the validated data
        $departements->update($validatedData);
        return redirect()->route('departements.index')->with('success', 'Département mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Departement $departement)
    {
        $departement->delete();
        return redirect()->route('departements.index')->with('success', 'Département supprimé avec succès.');
    }
}
