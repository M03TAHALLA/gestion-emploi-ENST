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

    foreach ($filieres as $filiere) {
        // Filtrer les étudiants par filière
        $etudiantsFiliere = $etudiants->where('id_filiere', $filiere->id);

        // Vérifier s'il y a des étudiants dans la filière
        if ($etudiantsFiliere->isEmpty()) {
            continue; // Passer à la filière suivante
        }

        // Diviser les étudiants en groupes de manière équilibrée
        $totalEtudiants = $etudiantsFiliere->count();
        $groupSize = intval($totalEtudiants / $filiere->groupe);
        $remainder = $totalEtudiants % $filiere->groupe;

        $groupedEtudiants = [];
        $currentIndex = 0;

        for ($i = 0; $i < $filiere->groupe; $i++) {
            $currentGroupSize = $groupSize + ($remainder > 0 ? 1 : 0);
            $groupedEtudiants[$i] = $etudiantsFiliere->slice($currentIndex, $currentGroupSize);
            $currentIndex += $currentGroupSize;
            $remainder--;
        }

        // Générer les fichiers PDF pour chaque groupe
        foreach ($groupedEtudiants as $index => $group) {
            if ($group->isEmpty()) {
                continue; // Passer les groupes vides
            }
            
            $pdf = Pdf::loadView('pdf.etudiants', [
                'filiereName' => $filiere->nom_filiere,
                'groupIndex' => $index + 1,
                'etudiants' => $group,
            ]);
            $pdf->save(storage_path('app/public/etudiants_' . $filiere->nom_filiere . '_groupe' . ($index + 1) . '.pdf'));
        }
    }

    return redirect()->route('etudiants.pdf');
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
