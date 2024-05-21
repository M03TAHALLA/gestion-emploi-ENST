<?php

namespace App\Http\Controllers;

use App\Models\Filliere;
use Illuminate\Http\Request;

class FilliereController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fillieres = Filliere::all();
        return view('Fillieres.filieres',compact('fillieres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Fillieres.filieres-form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'NomFilliere' => 'required|string|max:255',
            'NomDepartement' => 'required|string|max:255',
            'Cordinateur' => 'required|string|max:255',
            'Semestre' => 'required|integer',
            'Groupe' => 'required|integer',
        ]);

        $filliere = new Filliere();
        $filliere->NomFilliere = $validatedData['NomFilliere'];
        $filliere->NomDepartement = $validatedData['NomDepartement'];
        $filliere->Cordinateur = $validatedData['Cordinateur'];
        $filliere->Semestre = $validatedData['Semestre'];
        $filliere->NombreGroupe = $validatedData['Groupe'];
        $filliere->save();

        return redirect()->route('fillieres.index')->with('success', 'Filliere créée avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(Filliere $filliere)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Filliere $filliere)
    {
        return view('Fillieres.filieres-form-edit', compact('filliere'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Filliere $filliere)
    {
        $validatedData = $request->validate([
            'NomFilliere' => 'required|string|max:255',
            'NomDepartement' => 'required|string|max:255',
            'Cordinateur' => 'required|string|max:255',
            'Semestre' => 'required|integer',
            'Groupe' => 'required|integer',
        ]);

        $filliere->update($validatedData);

        return redirect()->route('fillieres.index')->with('success', 'Filliere mise à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Filliere $filliere)
    {
         $filliere->delete();

         return redirect()->route('fillieres.index')->with('success', 'La filière a été supprimée avec succès.');
    }
}
