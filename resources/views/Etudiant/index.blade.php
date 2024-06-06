<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Dashboard | Filliere</title>
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
  </style>
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    @include('Layout.navbar')
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
                Gestion des Etudiants
              </span>
            </div>
            <div class="right-section">
              <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" class="bi bi-laptop" viewBox="0 0 16 16">
                <path d="M13.5 3a.5.5 0 0 1 .5.5V11H2V3.5a.5.5 0 0 1 .5-.5zm-11-1A1.5 1.5 0 0 0 1 3.5V12h14V3.5A1.5 1.5 0 0 0 13.5 2zM0 12.5h16a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5"></path>
              </svg>
              <span>Tableau de board / </span><a href=""> Filiéres de l'ENS</a>
            </div>
          </div>
          <div class="add-operation mt-2">
            <svg id='Import_24' width='24' height='24' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'><rect width='24' height='24' stroke='none' fill='#000000' opacity='0'/>
                <g transform="matrix(0.36 0 0 0.36 12 12)" >
                <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" translate(-32, -29)" d="M 29 2 C 28.449219 2 28 2.449219 28 3 L 28 16 L 7 16 C 5.347656 16 4 17.347656 4 19 L 4 53 C 4 54.652344 5.347656 56 7 56 L 57 56 C 58.652344 56 60 54.652344 60 53 L 60 19 C 60 17.347656 58.652344 16 57 16 L 36 16 L 36 3 C 36 2.449219 35.550781 2 35 2 Z M 30 4 L 34 4 L 34 30 C 34 30.402344 34.246094 30.769531 34.617188 30.921875 C 34.992188 31.078125 35.421875 30.992188 35.707031 30.707031 L 39 27.414063 L 41.585938 30 L 32 39.585938 L 22.414063 30 L 25 27.414063 L 28.292969 30.707031 C 28.578125 30.992188 29.007813 31.078125 29.382813 30.921875 C 29.753906 30.769531 30 30.402344 30 30 Z M 7 18 L 28 18 L 28 27.585938 L 25.707031 25.292969 C 25.316406 24.902344 24.683594 24.902344 24.292969 25.292969 L 20.292969 29.292969 C 20.097656 29.488281 20 29.742188 20 30 C 20 30.257813 20.097656 30.511719 20.292969 30.707031 L 31.292969 41.707031 C 31.683594 42.097656 32.316406 42.097656 32.707031 41.707031 L 43.707031 30.707031 C 44.097656 30.316406 44.097656 29.683594 43.707031 29.292969 L 39.707031 25.292969 C 39.316406 24.902344 38.683594 24.902344 38.292969 25.292969 L 36 27.585938 L 36 18 L 57 18 C 57.550781 18 58 18.449219 58 19 L 58 53 C 58 53.550781 57.550781 54 57 54 L 7 54 C 6.449219 54 6 53.550781 6 53 L 6 19 C 6 18.449219 6.449219 18 7 18 Z M 10 48 C 9.449219 48 9 48.445313 9 49 L 9 51 C 9 51.554688 9.449219 52 10 52 C 10.550781 52 11 51.554688 11 51 L 11 49 C 11 48.445313 10.550781 48 10 48 Z M 15 48 C 14.449219 48 14 48.445313 14 49 L 14 51 C 14 51.554688 14.449219 52 15 52 C 15.550781 52 16 51.554688 16 51 L 16 49 C 16 48.445313 15.550781 48 15 48 Z M 20 48 C 19.449219 48 19 48.445313 19 49 L 19 51 C 19 51.554688 19.449219 52 20 52 C 20.550781 52 21 51.554688 21 51 L 21 49 C 21 48.445313 20.550781 48 20 48 Z M 25 48 C 24.449219 48 24 48.445313 24 49 L 24 51 C 24 51.554688 24.449219 52 25 52 C 25.550781 52 26 51.554688 26 51 L 26 49 C 26 48.445313 25.550781 48 25 48 Z M 30 48 C 29.449219 48 29 48.445313 29 49 L 29 51 C 29 51.554688 29.449219 52 30 52 C 30.550781 52 31 51.554688 31 51 L 31 49 C 31 48.445313 30.550781 48 30 48 Z M 35 48 C 34.449219 48 34 48.445313 34 49 L 34 51 C 34 51.554688 34.449219 52 35 52 C 35.550781 52 36 51.554688 36 51 L 36 49 C 36 48.445313 35.550781 48 35 48 Z M 40 48 C 39.449219 48 39 48.445313 39 49 L 39 51 C 39 51.554688 39.449219 52 40 52 C 40.550781 52 41 51.554688 41 51 L 41 49 C 41 48.445313 40.550781 48 40 48 Z M 45 48 C 44.449219 48 44 48.445313 44 49 L 44 51 C 44 51.554688 44.449219 52 45 52 C 45.550781 52 46 51.554688 46 51 L 46 49 C 46 48.445313 45.550781 48 45 48 Z M 50 48 C 49.449219 48 49 48.445313 49 49 L 49 51 C 49 51.554688 49.449219 52 50 52 C 50.550781 52 51 51.554688 51 51 L 51 49 C 51 48.445313 50.550781 48 50 48 Z M 55 48 C 54.449219 48 54 48.445313 54 49 L 54 51 C 54 51.554688 54.449219 52 55 52 C 55.550781 52 56 51.554688 56 51 L 56 49 C 56 48.445313 55.550781 48 55 48 Z" stroke-linecap="round" />
                </g>
                </svg>
                @if (session('success'))
                <p>{{ session('success') }}</p>
            @endif

            <form action="{{ route('etudiants.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" required>
                <button type="submit">Import</button>
            </form>
          </div>
            @if (session('success'))
                <div id="success-message" class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        <div class="formbold-input-flex">
            <div style="margin-top: 2%" class="formbold-input-group">
                <input
                  type="text"
                  oninput="filtrerTable()"
                  name="name"
                  id="filliereInput"
                  placeholder="Rechercher Par Filliere"
                  class="formbold-form-input"
                />
              </div>
              <div style="margin-top: 2%" class="formbold-input-group">
                <input
                  type="text"
                  name="name"
                  id="departementInput"
                  oninput="filtrerTable()"
                  placeholder="Rechercher Par Departement"
                  class="formbold-form-input"
                />
              </div>
            </div>
            <div class="formbold-input-flex">
                <div style="margin-top: 1%" class="formbold-input-group">
                    <input
                      type="text"
                      name="name"
                      oninput="filtrerTable()"
                      id="cordinateurInput"
                      placeholder="Rechercher Par Cordinateur"
                      class="formbold-form-input"
                    />
                  </div>
                  <div style="margin-top: 1%" class="formbold-input-group">
                    <input
                      type="number"
                      name="name"
                      oninput="filterTable()"
                      id="semestreInput"
                      placeholder=" Rechercher Par  Semestre"
                      class="formbold-form-input"
                    />
                  </div>
                </div>
                <p>Emploi Temps : </p>
                <label class="mcui-checkbox">
                    <input type="checkbox" id="nonDisponibleCheckbox" >
                    <div>
                      <svg class="mcui-check" viewBox="-2 -2 35 35" aria-hidden="true">
                        <polyline points="7.57 15.87 12.62 21.07 23.43 9.93" />
                      </svg>
                    </div>
                    <div>Valider</div> <i class="fas fa-exclamation-triangle" style="color: red; font-size:20px"></i>
                  </label>

                  <label class="mcui-checkbox">
                    <input type="checkbox" id="disponibleCheckbox">
                    <div>
                      <svg class="mcui-check" viewBox="-2 -2 35 35" aria-hidden="true">
                        <polyline points="7.57 15.87 12.62 21.07 23.43 9.93" />
                      </svg>
                    </div>
                    <div>Non Valider</div> <i class="fas fa-check-circle" style="color: green; font-size:20px"></i>
                  </label>
          <table id="myTable" class="table table-striped mt-5">
            <thead>
              <tr>
                <th style="text-align: center" scope="col">CIN</th>
                <th style="text-align: center"  scope="col">Nom</th>
                <th style="text-align: center"  scope="col">Prenom</th>
                <th style="text-align: center"  scope="col">Filliere</th>
                <th style="text-align: center"  scope="col">Semestre Actuelle</th>
                <th style="text-align: center"  scope="col">Situation</th>

              </tr>
            </thead>
            <tbody>
              @foreach ($etudiants as $e)
                <tr>
                    <td scope="col">{{ $e->cin_etudiant }}</td>
                    <td scope="col">{{ $e->nom_etudiant }}</td>
                    <td scope="col">{{ $e->prenom_etudiant }}</td>
                    <td scope="col">{{ $e->id_filiere }} </td>
                    <td scope="col">{{ $e->aac }}</td>
                    <td scope="col"><i class="fas fa-check-circle" style="color: green; font-size:20px"></i></td>
                </tr>
               @endforeach
              </tbody>
          </table>
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
