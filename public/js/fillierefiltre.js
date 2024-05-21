    function filterTable() {
    // Récupérer les valeurs saisies dans les champs de recherche pour filière, département, coordinateur et nombre de semestres
    var inputFilliere = document.getElementById("filliereInput");
    var inputDepartement = document.getElementById("departementInput");
    var inputCordinateur = document.getElementById("cordinateurInput");
    var inputSemestre = document.getElementById("semestreInput");
    var filterFilliere = inputFilliere ? inputFilliere.value.toUpperCase() : "";
    var filterDepartement = inputDepartement ? inputDepartement.value.toUpperCase() : "";
    var filterCordinateur = inputCordinateur ? inputCordinateur.value.toUpperCase() : "";
    var filterSemestre = inputSemestre ? inputSemestre.value.toUpperCase() : "";

    // Récupérer l'état des cases à cocher pour emploi du temps
    var disponibleCheckbox = document.getElementById("disponibleCheckbox").checked;
    var nonDisponibleCheckbox = document.getElementById("nonDisponibleCheckbox").checked;

    // Récupérer les lignes de la table
    var table = document.getElementById("myTable");
    var rows = table.getElementsByTagName("tr");

    // Parcourir toutes les lignes du tableau
    for (var i = 0; i < rows.length; i++) {
        // Récupérer le contenu des colonnes
        var tdFilliere = rows[i].getElementsByTagName("td")[0];
        var tdDepartement = rows[i].getElementsByTagName("td")[1];
        var tdCordinateur = rows[i].getElementsByTagName("td")[2];
        var tdSemestre = rows[i].getElementsByTagName("td")[3];
        var tdEmploiTemps = rows[i].getElementsByTagName("td")[4];

        if (tdFilliere && tdDepartement && tdCordinateur && tdSemestre && tdEmploiTemps) {
            var txtValueFilliere = tdFilliere.textContent || tdFilliere.innerText;
            var txtValueDepartement = tdDepartement.textContent || tdDepartement.innerText;
            var txtValueCordinateur = tdCordinateur.textContent || tdCordinateur.innerText;
            var txtValueSemestre = tdSemestre.textContent || tdSemestre.innerText;
            var emploiTempsIcon = tdEmploiTemps.querySelector("i");
            var emploiTempsDisponible = emploiTempsIcon.classList.contains("fa-check-circle");
            var emploiTempsNonDisponible = emploiTempsIcon.classList.contains("fa-exclamation-triangle");

            // Vérifier si le contenu correspond aux recherches
            var matchFilliere = txtValueFilliere.toUpperCase().indexOf(filterFilliere) > -1;
            var matchDepartement = txtValueDepartement.toUpperCase().indexOf(filterDepartement) > -1;
            var matchCordinateur = txtValueCordinateur.toUpperCase().indexOf(filterCordinateur) > -1;
            var matchSemestre = txtValueSemestre.toUpperCase().indexOf(filterSemestre) > -1;
            var matchEmploiTemps = (disponibleCheckbox && emploiTempsDisponible) ||
                                   (nonDisponibleCheckbox && emploiTempsNonDisponible) ||
                                   (!disponibleCheckbox && !nonDisponibleCheckbox);

            // Afficher la ligne si toutes les correspondances sont trouvées
            if (matchFilliere && matchDepartement && matchCordinateur && matchSemestre && matchEmploiTemps) {
                rows[i].style.display = "";
            } else {
                // Masquer la ligne sinon
                rows[i].style.display = "none";
            }
        }
    }
}

// Ajouter des écouteurs d'événements pour déclencher le filtrage lors de la saisie ou de la sélection
document.getElementById("filliereInput").addEventListener("input", filterTable);
document.getElementById("departementInput").addEventListener("input", filterTable);
document.getElementById("cordinateurInput").addEventListener("input", filterTable);
document.getElementById("semestreInput").addEventListener("input", filterTable);
document.getElementById("disponibleCheckbox").addEventListener("change", filterTable);
document.getElementById("nonDisponibleCheckbox").addEventListener("change", filterTable);

