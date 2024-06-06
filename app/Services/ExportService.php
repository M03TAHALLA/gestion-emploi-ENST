<?php

namespace App\Services;

use App\Models\Etudiant;
use App\Models\Filiere;

class ExportService
{
    function exporterListeEtudiantsParFiliere($nomFiliere)
{
    // Récupérer les informations de la filière
    $filiere = Filiere::where('nom_filiere', $nomFiliere)->firstOrFail();

    // Récupérer les étudiants de la filière sélectionnée
    $etudiants = Etudiant::where('id_filiere', $filiere->id)->get();

    // Calculer le nombre d'étudiants par groupe
    $nombreEtudiantsParGroupe = ceil($etudiants->count() / $filiere->groupe);

    // Diviser les étudiants en groupes
    $groupes = $etudiants->chunk($nombreEtudiantsParGroupe);

    // Créer les listes d'étudiants par groupe
    $listes = [];
    foreach ($groupes as $index => $groupe) {
        $liste = [];
        foreach ($groupe as $etudiant) {
            $liste[] = $etudiant->nom_etudiant . ' ' . $etudiant->prenom_etudiant;
        }
        $listes['Groupe ' . ($index + 1)] = $liste;
    }

    // Exporter les listes au format souhaité (par exemple CSV)
    $csvFileName = $nomFiliere . '_listes_etudiants.csv';
    $csvFile = fopen(storage_path('app/' . $csvFileName), 'w');
    foreach ($listes as $nomGroupe => $etudiants) {
        fputcsv($csvFile, [$nomGroupe]);
        foreach ($etudiants as $etudiant) {
            fputcsv($csvFile, [$etudiant]);
        }
    }
    fclose($csvFile);

    // Retourner le chemin du fichier CSV généré
    return storage_path('app/' . $csvFileName);
}
}
