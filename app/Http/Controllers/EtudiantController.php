<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Filiere;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $etudiants = Etudiant::all();
        return view('Etudiant.index',compact('etudiants'));
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
        //
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
    public function generatePDFs()
    {
        // Récupérer tous les étudiants
        $etudiants = Etudiant::all();

        // Récupérer toutes les filières
        $filieres = Filiere::all();

        $groupedEtudiants = [];

        foreach ($filieres as $filiere) {
            // Filtrer les étudiants par filière
            $etudiantsFiliere = $etudiants->where('id_filiere', $filiere->id);

            // Diviser les étudiants en groupes
            $groupSize = ceil($etudiantsFiliere->count() / $filiere->groupe);
            $groups = $etudiantsFiliere->chunk($groupSize);

            $groupedEtudiants[$filiere->nom_filiere] = $groups;
        }

        foreach ($groupedEtudiants as $filiereName => $groups) {
            foreach ($groups as $index => $group) {
                $pdf = Pdf::loadView('pdf.etudiants', [
                    'filiereName' => $filiereName,
                    'groupIndex' => $index + 1,
                    'etudiants' => $group,
                ]);
                $pdf->save(storage_path('app/public/etudiants_' . $filiereName . '_groupe' . ($index + 1) . '.pdf'));
            }
        }
        return to_route('etudiants.pdf');
    }
    public function downloadPDFs()
    {
        // Récupérer la liste des fichiers PDF dans le répertoire de stockage
        $pdfFiles = Storage::files('public');

        return view('pdf.index', ['pdfFiles' => $pdfFiles]);
    }
    public function deletePDF(Request $request)
    {
        $fileName = $request->input('fileName');

        if (Storage::delete('public/' . $fileName)) {
            return response()->json(['success' => true, 'message' => 'Fichier supprimé avec succès.']);
        } else {
            return response()->json(['success' => false, 'message' => 'Erreur lors de la suppression du fichier.']);
        }
    }
}
