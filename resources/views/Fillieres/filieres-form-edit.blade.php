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
  <link rel="stylesheet" href="/../../vendors/mdi/css/materialdesignicons.min.css">

  <!-- endinject -->
  <link rel="shortcut icon" href="/images/logo.png" />
  <style>
    .alert-success {
    color: #ff0000;
    background-color: #ffffff;
    border-color: #000000;
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
      <!-- partial -->
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
              <span class="title-section">
                Gestion des Enseignants
              </span>
            </div>
            <div class="right-section">
              <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" class="bi bi-laptop" viewBox="0 0 16 16">
                <path d="M13.5 3a.5.5 0 0 1 .5.5V11H2V3.5a.5.5 0 0 1 .5-.5zm-11-1A1.5 1.5 0 0 0 1 3.5V12h14V3.5A1.5 1.5 0 0 0 13.5 2zM0 12.5h16a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5"></path>
              </svg>
              <span>Tableau de board / </span><a href=""> Enseignants de l'ENS</a>
            </div>
          </div>
          @if (session('error'))
          <div id="success-message" class="alert alert-success">
              {{ session('error') }}
          </div>
      @endif
          <div class="formbold-form-wrapper">
            <form action="{{ route('fillieres.update',$filliere->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="formbold-input-group">
                    <label for="numero" class="formbold-form-label"> Nom Filliere </label>
                    <input
                      type="text"
                      name="NomFilliere"
                      id="Filliere"
                      placeholder="Nom Filliere"
                      class="formbold-form-input"
                      value="{{ $filliere->NomFilliere }}"
                      required
                    />
                  </div>
                  <div>
                    <label class="formbold-form-label">Nom Departement</label>
                    <select class="formbold-form-select" name="NomDepartement" id="NomDepartement">
                        <option value="INFORMATIQUE" {{ $filliere->NomDepartement == 'INFORMATIQUE' ? 'selected' : '' }}>INFORMATIQUE</option>
                        <option value="METHEMATIQUE" {{ $filliere->NomDepartement == 'METHEMATIQUE' ? 'selected' : '' }}>METHEMATIQUE</option>
                        <option value="SCIENCE" {{ $filliere->NomDepartement == 'SCIENCE' ? 'selected' : '' }}>SCIENCE</option>
                        <option value="LANGUE" {{ $filliere->NomDepartement == 'LANGUE' ? 'selected' : '' }}>LANGUE</option>
                    </select>
                </div>
                <div class="formbold-input-group">
                    <label for="numero" class="formbold-form-label"> Cordinateur </label>
                    <input required
                      type="text"
                      name="Cordinateur"
                      id="Cordinateur"
                      placeholder="Cordinateur"
                      class="formbold-form-input"
                      value="{{ $filliere->Cordinateur }}"
                    />
                  </div>
                  <div class="formbold-input-group">
                    <label for="numero" class="formbold-form-label">Semestre Actuelle</label>
                    <input required
                      type="number"
                      name="Semestre"
                      id="Semestre"
                      placeholder="Semestre"
                      class="formbold-form-input"
                      value="{{ $filliere->Semestre }}"
                    />
                  </div>
                  <div class="formbold-input-group">
                    <label for="numero" class="formbold-form-label">Nombre Groupe </label>
                    <input required
                      type="number"
                      name="NombreGroupe"
                      id="NombreGroupe"
                      placeholder="Nombre Groupe"
                      class="formbold-form-input"
                      value="{{ $filliere->NombreGroupe }}"
                    />
                  </div>
              <button type="submit" class="formbold-btn">Modifier une Filliere</button>
            </form>
          </div>
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
  <!-- End custom js for this page-->
</body>

</html>
