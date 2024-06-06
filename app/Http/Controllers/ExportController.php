<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Filiere;
use App\Models\Etudiant;
use PDF; // Assurez-vous d'avoir installé le paquet TCPDF ou DomPDF pour cela.

class ExportController extends Controller
{
    public function exporterListeEtudiants()
    {
        $filieres = Filiere::all();
        
        foreach ($filieres as $filiere) {
            $etudiantsParFiliere = Etudiant::where('id_filiere', $filiere->id)->get();
            
            // Diviser les étudiants en groupes
            $etudiantsParGroupe = $this->diviserEnGroupes($etudiantsParFiliere, $filiere->groupe);
            
            // Exporter les listes d'étudiants
            $this->exporterListe($filiere->nom_filiere, $etudiantsParGroupe);
        }
    }

    private function diviserEnGroupes($etudiants, $nombreGroupes)
    {
        $groupes = [];
        $etudiants->shuffle(); // Mélangez les étudiants pour une répartition aléatoire
        
        // Calculer la taille de chaque groupe
        $tailleGroupe = ceil($etudiants->count() / $nombreGroupes);
        
        // Diviser les étudiants en groupes
        $etudiants = $etudiants->chunk($tailleGroupe);
        
        // Convertir la collection en tableau pour une manipulation facile
        foreach ($etudiants as $key => $groupe) {
            $groupes["Groupe " . ($key + 1)] = $groupe;
        }
        
        return $groupes;
    }

    private function exporterListe($nomFiliere, $etudiantsParGroupe)
    {
        // Par exemple, exporter en format CSV
        $file = fopen($nomFiliere . '.csv', 'w');
        
        foreach ($etudiantsParGroupe as $groupe => $etudiants) {
            fputcsv($file, [$groupe]);
            foreach ($etudiants as $etudiant) {
                fputcsv($file, [$etudiant->nom, $etudiant->prenom, $etudiant->email]);
            }
            // Ajoutez une ligne vide entre chaque groupe
            fputcsv($file, []);
        }
        
        fclose($file);
    }
}

