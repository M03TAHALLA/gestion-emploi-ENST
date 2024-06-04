<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Dashboard | Module</title>
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="/images/logo.png" />
  <link rel="stylesheet" href="/css/AjouterEmploi/style.css">
  <style>
    .mcui-checkbox,
.mcui-radio {
  display: flex;
  align-items: center;
  user-select: none;
  padding: 0.6em 0;
  box-sizing: border-box;
  width: 17%;
  cursor: pointer;

}

.mcui-checkbox input[type="checkbox"],
.mcui-checkbox input[type="radio"],
.mcui-radio input[type="checkbox"],
.mcui-radio input[type="radio"] {
  position: absolute !important;
  height: 1px;
  width: 1px;
  overflow: hidden;
  clip: rect(1px, 1px, 1px, 1px);
  margin-right: 2%;
  cursor: pointer;
}

.mcui-checkbox input[type="checkbox"] + div,
.mcui-checkbox input[type="radio"] + div,
.mcui-radio input[type="checkbox"] + div,
.mcui-radio input[type="radio"] + div {
  border: 2px solid #8d9aa9;
  height: 1.5em;
  width: 1.5em;
  box-sizing: border-box;
  border-radius: 2px;
  position: relative;
  margin-right: 5%;
  cursor: pointer;
}

.mcui-checkbox input[type="checkbox"] ~ div:last-child,
.mcui-checkbox input[type="radio"] ~ div:last-child,
.mcui-radio input[type="checkbox"] ~ div:last-child,
.mcui-radio input[type="radio"] ~ div:last-child {
  padding-left: 25px;
  cursor: pointer;
}

.mcui-checkbox input[type="radio"] + div,
.mcui-radio input[type="radio"] + div {
  border-radius: 50%;
  cursor: pointer;
}

.mcui-checkbox input[type="radio"] + div::after,
.mcui-radio input[type="radio"] + div::after {
  content: "";
  position: absolute;
  left: 25%;
  top: 25%;
  width: 50%;
  height: 50%;
  border-radius: 50%;
  transform: scale(0.5);
  opacity: 0;
  background: black;
  transition: all 107ms cubic-bezier(0.65, 0.25, 0.56, 0.96);
  cursor: pointer;
}

.mcui-checkbox input[type="checkbox"]:focus + div,
.mcui-checkbox input[type="radio"]:focus + div,
.mcui-checkbox input[type="checkbox"]:active + div,
.mcui-checkbox input[type="radio"]:active + div,
.mcui-radio input[type="checkbox"]:focus + div,
.mcui-radio input[type="radio"]:focus + div,
.mcui-radio input[type="checkbox"]:active + div,
.mcui-radio input[type="radio"]:active + div {
  outline: 2px dashed #8d9aa9;
  outline-offset: 2px;
  cursor: pointer;
}

.mcui-checkbox input[type="checkbox"]:checked + div,
.mcui-radio input[type="checkbox"]:checked + div {
  border-color: black;
  transition: border-color 107ms cubic-bezier(0.65, 0.25, 0.56, 0.96);
}

.mcui-checkbox input[type="checkbox"]:checked + div .mcui-check,
.mcui-radio input[type="checkbox"]:checked + div .mcui-check {
  opacity: 1;
  transition: opacity 107ms cubic-bezier(0.65, 0.25, 0.56, 0.96);
}

.mcui-checkbox input[type="checkbox"]:checked + div .mcui-check polyline,
.mcui-radio input[type="checkbox"]:checked + div .mcui-check polyline {
  animation: dash-check 107ms cubic-bezier(0.65, 0.25, 0.56, 0.96) forwards;
}

.mcui-checkbox input[type="radio"]:checked + div,
.mcui-radio input[type="radio"]:checked + div {
  border-color: black;
}

.mcui-checkbox input[type="radio"]:checked + div::after,
.mcui-radio input[type="radio"]:checked + div::after {
  opacity: 1;
  transform: scale(1);
}

.mcui-checkbox input[type="checkbox"]:indeterminate + div::after,
.mcui-radio input[type="checkbox"]:indeterminate + div::after {
  content: "";
  height: 4px;
  width: 60%;
  left: 20%;
  top: calc(50% - 2px);
  position: absolute;
  background: #8d9aa9;
  border-radius: 1px;
}

.mcui-checkbox input[type="checkbox"]:disabled ~ div,
.mcui-checkbox input[type="radio"]:disabled ~ div,
.mcui-radio input[type="checkbox"]:disabled ~ div,
.mcui-radio input[type="radio"]:disabled ~ div {
  color: #8d9aa9;
  cursor: not-allowed;
}

.mcui-checkbox input[type="checkbox"]:enabled ~ div,
.mcui-checkbox input[type="radio"]:enabled ~ div,
.mcui-radio input[type="checkbox"]:enabled ~ div,
.mcui-radio input[type="radio"]:enabled ~ div {
  cursor: default;
}

.mcui-check {
  height: 100%;
  width: 100%;
  transform: scale(1);
  color: black;
  opacity: 0;
  cursor: pointer;
}

.mcui-check polyline {
  fill: none;
  transform-origin: 50% 50%;
  stroke-width: 5px;
  stroke-dasharray: 22.771367900227325;
  stroke: currentcolor;
}

@supports (display: grid) {
  .mcui-check polyline {
    stroke-dashoffset: 22.771367900227325;
  }
}

@keyframes dash-check {
  to {
    stroke-dashoffset: 0;
  }
}

    .alert {
    padding: 15px;
    margin-bottom: 20px;
    border: 1px solid transparent;
    border-radius: 4px;
}
td{
    text-align: center;
}
.alert-success {
    color: #3c763d;
    background-color: #dff0d8;
    border-color: #d6e9c6;
}
#myInput, #myCountryInput {
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}
.create-salle-button{
    background-color: #0039a6;
    padding: 15px;
    color: white;
    margin-top: 25px;
    width: 250px;
}
.create-salle-button:hover{
    background-color: white;
    color: #0039a6;
    border: 1px solid #0039a6;
}
  </style>
</head>
<body>
  <div class="container-scroller">
    @include('layout.navbar')
      @include('Layout.sidebar')

      <div class="container-section">
        <section>
          <div class="head-section">
            <div class="left-section">
              <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" class="bi bi-calendar-check" viewBox="0 0 16 16" style="color:white; margin-bottom:2px; padding:0;">
                <path d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0"></path>
                <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z"></path>
              </svg>
              <span class="title-section">
                Gestion des modules
              </span>
            </div>
            <div class="right-section">
              <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" class="bi bi-laptop" viewBox="0 0 16 16">
                <path d="M13.5 3a.5.5 0 0 1 .5.5V11H2V3.5a.5.5 0 0 1 .5-.5zm-11-1A1.5 1.5 0 0 0 1 3.5V12h14V3.5A1.5 1.5 0 0 0 13.5 2zM0 12.5h16a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5"></path>
              </svg>
              <span>Tableau de board / </span><a href=""> Modules</a>
            </div>
          </div>
            @if (session('success'))
                <div id="success-message" class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            <form action="{{ route('modules.store') }}" method="POST" class="mx-auto mt-5">
                @csrf
                <div class="form-group">
                    <label for="nom_module">Nom module</label>
                    <input type="text" id="nom_module" name="nom_module" value="{{ old('nom_module') }}" required class="form-control">
                </div>
                <div class="form-group">
                    <label for="nom_filiere">Nom du Filiére</label>
                    <select id="nom_filiere" name="nom_filiere" required class="form-control" onchange="getSemesters()">
                        @foreach($filieres as $filiere)
                            <option value="{{ $filiere->nom_filiere }}">{{ $filiere->nom_filiere }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="formbold-form-label">Semestre</label>
                    <select class="formbold-form-select" name="semestre" id="semestre">
                      <option value="">Sélectionner un semestre</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="volume_horaire">Volume horaire:</label>
                    <input type="number" id="volume_horaire" name="volume_horaire" value="{{ old('volume_horaire') }}" required class="form-control">
                </div>
                <div class="form-group">
                    <label for="nature_module">Nature de Module</label>
                    <select id="nature_module" name="nature_module" required class="form-control">
                        @foreach($natures as $nature)
                            <option value="{{ $nature }}">{{ $nature }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="nom_enseignant">Nom d'enseignant</label>
                    <select id="nom_enseignant" name="cin_enseignant" required class="form-control">
                        <!-- This will be populated dynamically -->
                    </select>
                </div>
                <div class="form-group mt-3">
                    <label for="annee_academique">Année Académique:</label>
                    <input type="text" id="annee_academique" name="annee_academique" value="2024-2025" readonly class="form-control">
                </div>
                <button type="submit" class="btn create-salle-button">Créer un nouveau module</button>
            </form>
        </section>
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

  <script>
    document.addEventListener('DOMContentLoaded', function() {
    const filiereSelect = document.getElementById('nom_filiere');
    const enseignantSelect = document.getElementById('nom_enseignant');

    filiereSelect.addEventListener('change', function() {
        const selectedFiliere = filiereSelect.value;

        fetch(`/getEnseignants/${selectedFiliere}`)
            .then(response => response.json())
            .then(data => {
                enseignantSelect.innerHTML = ''; // Clear current options

                data.forEach(enseignant => {
                    const option = document.createElement('option');
                    option.value = enseignant.cin_enseignant;
                    option.textContent = `${enseignant.nom_enseignant} ${enseignant.prenom_enseignant}`;
                    enseignantSelect.appendChild(option);
                });
            })
            .catch(error => console.error('Error:', error));
    });

    // Trigger change event to load enseignants for the initially selected filiere
    filiereSelect.dispatchEvent(new Event('change'));
});

function getSemesters() {
      const filliere = document.getElementById('nom_filiere').value;

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

    

  </script>

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
        var messageElement = document.getElementById('success-message');
        if (messageElement) {
            messageElement.style.transition = 'opacity 0.5s';
            messageElement.style.opacity = '0';
            setTimeout(function() {
                messageElement.style.display = 'none';
            }, 2000);
        }
    }, 3000);
</script>
  <!-- End custom js for this page-->
</body>

</html>
