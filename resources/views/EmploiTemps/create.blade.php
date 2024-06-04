<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Dashboard | Saisie Emploi Temps</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="/vendors/feather/feather.css">
  <link rel="stylesheet" href="/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="/js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="/css/vertical-layout-light/dashboard.css">
  <link rel="stylesheet" href="../../vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="/css/AjouterEmploi/style.css">

  <style>
     .formbold--mx-3 {
        margin-left: -12px;
        margin-right: -12px;
      }
      .formbold-px-3 {
        padding-left: 12px;
        padding-right: 12px;
      }
      .flex {
        display: flex;
      }
      .flex-wrap {
        flex-wrap: wrap;
      }

      .w-full {
        width: 100%;
      }
      .alert {
                padding: 20px;
                margin-bottom: 15px;
                border: 1px solid transparent;
                border-radius: 4px;
            }

            .alert-danger {
                color: #a94442;
                background-color: #f2dede;
                border-color: #ebccd1;
            }

            .alert-success {
                color: #3c763d;
                background-color: #dff0d8;
                border-color: #d6e9c6;
            }

            .alert-info {
                color: #31708f;
                background-color: #d9edf7;
                border-color: #bce8f1;
            }

            .alert-warning {
                color: #8a6d3b;
                background-color: #fcf8e3;
                border-color: #faebcc;
            }

            .alert ul {
                margin: 0;
                padding: 0;
                list-style-type: none;
            }
  </style>


  <!-- endinject -->
  <link rel="shortcut icon" href="/images/logo.png" />
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    @include('Layout.navbar')
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      @include('Layout.sidebar')

      <div class="formbold-main-wrapper">

        <!-- Author: FormBold Team -->
        <!-- Learn More: https://formbold.com -->
        <div class="formbold-form-wrapper">
            @if ($errors->any())
            <div id="message" class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('error'))
        <div id="message" class="alert alert-danger">
          {{ session('error') }}
        </div>
        @endif

            <h2 style="margin-bottom: 5%;text-align:center" class=""> Emploi Temps</h2>
          <form action="{{ route('Emploitemps.store') }}" method="POST">
            @csrf
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
                <div style="margin-top: 2%" class="formbold-input-group">
                    <label for="nombre_seance">Nombre Seance</label>
                    <input
                        type="number"
                        value=""
                        class="formbold-form-input"
                        name="nombre_seance"
                        id="nombre_seance"
                        onchange="generateHoraires()"
                        required
                    />
                </div>
            <div id="horaires-container" style="margin-top: 2%" class="formbold-input-group">
                <!-- Les inputs horaires générés apparaîtront ici -->
            </div>

            <button class="formbold-btn">Ajouter Une Emploi Temps</button>
          </form>
        </div>
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
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
    setTimeout(function() {
        var messageElement = document.getElementById('message');
        if (messageElement) {
            messageElement.style.transition = 'opacity 0.5s';
            messageElement.style.opacity = '0';
            setTimeout(function() {
                messageElement.style.display = 'none';
            }, 2000);
        }
    }, 3000);

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

    function generateHoraires() {
    const nombreSeance = document.getElementById('nombre_seance').value;
    const horairesContainer = document.getElementById('horaires-container');

    // Réinitialiser le conteneur d'horaires
    horairesContainer.innerHTML = '';

    // Générer les champs horaires en fonction du nombre de séances
    for (let i = 0; i < nombreSeance; i++) {
        const div = document.createElement('div');
        div.classList.add('formbold-mb-5');

        const labelDebut = document.createElement('label');
        labelDebut.classList.add('formbold-form-label');
        labelDebut.textContent = `Horaire de début pour la séance ${i + 1}`;

        const inputDebut = document.createElement('input');
        inputDebut.type = 'time';
        inputDebut.name = `horaires_debut[]`;
        inputDebut.classList.add('formbold-form-input');
        inputDebut.required = true;

        div.appendChild(labelDebut);
        div.appendChild(inputDebut);

        const labelFin = document.createElement('label');
        labelFin.classList.add('formbold-form-label');
        labelFin.textContent = `Horaire de fin pour la séance ${i + 1}`;

        const inputFin = document.createElement('input');
        inputFin.type = 'time';
        inputFin.name = `horaires_fin[]`;
        inputFin.classList.add('formbold-form-input');
        inputFin.required = true;

        div.appendChild(labelFin);
        div.appendChild(inputFin);

        horairesContainer.appendChild(div);
    }
}

</script>
  <!-- End custom js for this page-->
</body>

</html>
