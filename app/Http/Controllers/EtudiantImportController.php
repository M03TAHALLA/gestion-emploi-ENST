<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;
use App\Models\Etudiant;

class EtudiantImportController extends Controller
{
    public function import(Request $request)
    {
        // Validate the file upload
        $request->validate([
            'file' => 'required|mimes:xls,xlsx',
        ]);

        // Load the uploaded file
        $file = $request->file('file');
        $spreadsheet = IOFactory::load($file->getRealPath());

        // Get the first worksheet
        $worksheet = $spreadsheet->getActiveSheet();

        // Iterate over the rows and import data
        foreach ($worksheet->getRowIterator() as $row) {
            $cellIterator = $row->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(false);

            $data = [];
            foreach ($cellIterator as $cell) {
                $data[] = $cell->getValue();
            }

            // Assuming columns: CIN, Nom, Prenom, Departement, Filiere ID, Semestre, Email
            Etudiant::updateOrCreate(
                ['cin_etudiant' => $data[0]],
                [
                    'nom_etudiant' => $data[1],
                    'prenom_etudiant' => $data[2],
                    'nom_departement' => $data[3],
                    'id_filiere' => $data[4],
                    'semestre_actuel' => $data[5],
                    'email' => $data[6],
                    'aac' => '24-25', // default value
                ]
            );
        }

        return redirect()->back()->with('success', 'Etudiants imported successfully.');
    }
}
