<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFController extends Controller
{
    public function generatePDF(){
        // Récupérer tous les utilisateurs
        $users = User::get();

        // Préparer les données à passer à la vue
        $data = [
            'title' => 'Welcome to Funda of Web IT - fundaofwebit.com',
            'date' => date('m/d/Y'),
            'users' => $users
        ];

        // Charger la vue et passer les données, spécifier le format A4
        $pdf = PDF::loadView('EmploiTempsPDF.index', $data)->setPaper('a4', 'landscape');

        // Retourner le PDF au navigateur
        return $pdf->stream('EmploiTemps.pdf');
    }
}
