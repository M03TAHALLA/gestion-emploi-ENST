<?php

namespace App\Http\Controllers;

use App\Models\EmploiTemps;
use Illuminate\Http\Request;

class EmploiTempsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Emploi-Temps.EmploiTemps');
    }


    public function Recherche(){
        return view('Emploi-Temps.EmploiTemps');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Emploi-Temps.AjouterEmploiTemps');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(EmploiTemps $emploiTemps)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EmploiTemps $emploiTemps)
    {
        //
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
