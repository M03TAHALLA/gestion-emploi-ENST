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
        $departement = Departement::all();
        return view('Departement.Departement',[
            'departement'=>$departement
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Departement.Departement-form');
    }

    /**
     * Store a newly created resource in storage.
     */
        public function store(Request $request)
        {
            $validatedData=$request->validate([
                'NomDepartement' => 'required|unique:departements|string|max:255',
            ]);

            $existingDepartement = Departement::where('NomDepartement', $validatedData['NomDepartement'])
                                     ->first();
            if ($existingDepartement) {
                return redirect()->back()->with('error', 'Cette Departement existe déjà.');
                }

            Departement::create($request->all());
            return redirect()->route('departements.index')->with('success', 'Département créé avec succès.');
        }

    /**
     * Display the specified resource.
     */
    public function show(Departement $departement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $departement)
    {
        return view('Departement.Departement-edit', ['departement' => $departement]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Departement $departement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Departement $departement)
    {
        //
    }
}
