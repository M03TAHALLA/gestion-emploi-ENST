<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use App\Models\EmploiTemps;
use App\Models\Filiere;
use App\Models\Horaire;
use App\Models\Seance;
use Illuminate\Http\Request;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFController extends Controller
{
    public function generatePDF($departement,$id_filiere, $groupe, $semestre){
        // Trouver l'ID de la filière à partir de son nom


        $idFiliere = $id_filiere;

        $filiere = Filiere::where('id',$id_filiere)->first();

        $nomFiliere = $filiere->nom_filiere;


        // Sélectionner toutes les séances en fonction des critères
        $seances = Seance::with('module')
                ->where('id_filiere', $idFiliere)
                ->where('semestre', $semestre)
                ->where('nom_groupe', $groupe)
                ->get();


            $nombreSeances = $seances->count();


        // Requête pour récupérer les données correspondantes dans la table EmploiTemps
        $resultats = EmploiTemps::where('id_filiere', $idFiliere)
            ->where('semestre', $semestre)
            ->where('groupe', $groupe)
            ->first();

            $Departements = Departement::all();

            if ($resultats) {
        $Horaire = Horaire::where('emploi_temps_id',$resultats->id)->get();
        $countHoraire = $Horaire->count();
            }else{
                $Horaire = collect();
                $countHoraire = $Horaire->count();

            }

        // Préparer les données à passer à la vue
        $data = [
            'resultats' => $resultats,
            'seances' => $seances,
            'Departements'=>$Departements,
           'nomFiliere'=>$nomFiliere,
           'semestre'=>$semestre,
           'groupe'=>$groupe,
           'nombreSeances'=>$nombreSeances,
           'Horaire'=>$Horaire,
           'countHoraire' => $countHoraire,
           'idFiliere'=>$idFiliere
        ];

        // Charger la vue et passer les données, spécifier le format A4
        $pdf = PDF::loadView('EmploiTempsPDF.index', $data)->setPaper('a4', 'landscape');

        // Retourner le PDF au navigateur
        return $pdf->stream('EmploiTemps.pdf');
    }
}
