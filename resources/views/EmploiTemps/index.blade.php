<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Gestion Emploi Temps | Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="/vendors/feather/feather.css">
  <link rel="stylesheet" href="/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <link rel="stylesheet" href="../../vendors/mdi/css/materialdesignicons.min.css">
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="/js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="/css/vertical-layout-light/dashboard.css">
  <link rel="stylesheet" href="../../vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="/css/AjouterEmploi/EmploiTempsStyle.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="/images/logo.png" />
  <style>
    .alert-success {
      color: #3c763d;
      background-color: #dff0d8;
      border-color: #d6e9c6;
      margin: 2%;
    }
  </style>
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    @include('Layout.navbar')

    <!-- partial:partials/_sidebar.html -->
    @include('Layout.sidebar')

    <div class="container-section">
      <section>
        <div class="head-section">
          <div class="left-section">
            <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" class="bi bi-calendar-check" viewBox="0 0 16 16" style="color:white; margin-bottom:2px; padding:0;">
              <path d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0"></path>
              <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z"></path>
            </svg>
            <span class="title-section">Emploi de temps</span>
          </div>
          <div class="right-section">
            <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" class="bi bi-laptop" viewBox="0 0 16 16">
              <path d="M13.5 3a.5.5 0 0 1 .5.5V11H2V3.5a.5.5 0 0 1 .5-.5zm-11-1A1.5 1.5 0 0 0 1 3.5V12h14V3.5A1.5 1.5 0 0 0 13.5 2zM0 12.5h16a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5"></path>
            </svg>
            <span>Tableau de board / </span><a href="">Saisir les emplois de temps</a>
          </div>
        </div>

        @if (session('success'))
        <div id="success-message" class="alert alert-success">
          {{ session('success') }}
        </div>
        @endif
        <form action="{{ route('ResultatRecherche') }}" method="POST">
          @csrf
          <div style="margin-top: 3%" class="formbold-input-flex">
            <div>
                <label class="formbold-form-label">Département</label>
                <select class="formbold-form-select" name="nom_departement" id="departement" onchange="getFiliere()">
                  <option value="">Sélectionner un département</option>
                  @foreach ($Departements as $Departement)
                    <option value="{{ $Departement->nom_departement }}">{{ $Departement->nom_departement }}</option>
                  @endforeach
                </select>
              </div>
              <div>
                <label class="formbold-form-label">Filière</label>
                <select class="formbold-form-select" name="nom_filiere" id="filliere" onchange="getSemesters()">
                  <option value="">Sélectionner une filière</option>
                </select>
              </div>
            <div>
              <label class="formbold-form-label">Semestre</label>
              <select class="formbold-form-select" name="semestre" id="semestre" onchange="getGroups()">
                <option value="">Sélectionner un semestre</option>
              </select>
            </div>
            <div>
              <label class="formbold-form-label">Groupe</label>
              <select class="formbold-form-select" name="groupe" id="groupe">
                <option value="">Sélectionner un groupe</option>
              </select>
            </div>
            <button type="submit" class="button-1" role="button">Recherche
              <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 50 50"
                style="fill:#FFFFFF;">
                <path d="M 21 3 C 11.601563 3 4 10.601563 4 20 C 4 29.398438 11.601563 37 21 37 C 24.355469 37 27.460938 36.015625 30.09375 34.34375 L 42.375 46.625 L 46.625 42.375 L 34.5 30.28125 C 36.679688 27.421875 38 23.878906 38 20 C 38 10.601563 30.398438 3 21 3 Z M 21 7 C 28.199219 7 34 12.800781 34 20 C 34 27.199219 28.199219 33 21 33 C 13.800781 33 8 27.199219 8 20 C 8 12.800781 13.800781 7 21 7 Z"></path>
              </svg>
            </button>
          </div>
        </form>

      </section>
    </div>
    <!-- main-panel ends -->
  </div>
  <!-- page-body-wrapper ends -->
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page
  <script src="/vendors/chart.js/Chart.min.js"></script>
  <script src="/vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="/js/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="/js/off-canvas.js"></script>
  <script src="/js/hoverable-collapse.js"></script>
  <script src="/js/template.js"></script>
  <script src="/js/settings.js"></script>
  <script src="/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="/js/dashboard.js"></script>
  <script src="/js/Chart.roundedBarCharts.js"></script>
  <script>
     function getFiliere() {
    const departement = document.getElementById('departement').value;

    // Réinitialiser la liste des filières
    const filliereSelect = document.getElementById('filliere');
    filliereSelect.innerHTML = '<option value="">Sélectionner une filière</option>';

    // Si un département est sélectionné
    if (departement) {
      fetch(`/get-filieres/${departement}`)
        .then(response => response.json())
        .then(data => {
          // Parcourir les filières et les ajouter à la liste déroulante
          data.forEach(filiere => {
            const option = document.createElement('option');
            option.value = filiere;
            option.textContent = filiere;
            filliereSelect.appendChild(option);
          });
        })
        .catch(error => {
          console.error('Erreur lors de la récupération des filières:', error);
        });
    }
  }
    // Fonction pour récupérer les semestres
    function getSemesters() {
      const filliere = document.getElementById('filliere').value;

      // Réinitialiser la liste des semestres
      const semestreSelect = document.getElementById('semestre');
      semestreSelect.innerHTML = '<option value="">Sélectionner un semestre</option>';

      // Si une filière est sélectionnée
      if (filliere) {
        fetch(`/get-semesters/${filliere}`)
          .then(response => response.json())
          .then(data => {
            // Parcourir les semestres et les ajouter à la liste déroulante
            data.forEach(semestre => {
              const option = document.createElement('option');
              option.value = semestre;
              option.textContent = `Semestre ${semestre}`;
              semestreSelect.appendChild(option);
            });
          })
          .catch(error => {
            console.error('Erreur lors de la récupération des semestres:', error);
          });
      }
    }

    // Fonction pour récupérer les groupes
    function getGroups() {
      const filliere = document.getElementById('filliere').value;
      const semestre = document.getElementById('semestre').value;

      // Si à la fois une filière et un semestre sont sélectionnés
      if (filliere && semestre) {
        fetch(`/get-groups/${filliere}/${semestre}`)
          .then(response => response.json())
          .then(data => {
            // Réinitialiser la liste des groupes
            const groupeSelect = document.getElementById('groupe');
            groupeSelect.innerHTML = '<option value="">Sélectionner un groupe</option>';

            // Ajouter les groupes à la liste déroulante
            data.forEach(groupe => {
              const option = document.createElement('option');
              option.value = groupe;
              option.text = `Groupe ${groupe}`;
              groupeSelect.appendChild(option);
            });
          })
          .catch(error => console.error('Erreur lors de la récupération des groupes:', error));
      }
    }
  </script>
  <!-- End custom js for this page-->
</body>
</html>
