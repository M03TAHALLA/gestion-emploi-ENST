<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Dashboard | Emploi Temps : </title>
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
            <h2 style="margin-bottom: 5%;text-align:center" class=""> Emploi Temps</h2>
          <form action="{{ route('EmploiStock.store') }}"  method="POST">
            @csrf
            <div class="formbold-input-flex">

                  <div style="margin-top: 2%" class="formbold-input-group">
                    <label for="">Filliere</label>
                    <input
                      type="text"
                      name="NomFilliere"
                      id="filliereInput"
                      value="{{ $EmploiTemps->NomFilliere }}"
                      class="formbold-form-input"
                      disabled
                    />
                  </div>
                  <div style="margin-top: 2%" class="formbold-input-group">
                    <label for="">Groupe</label>
                    <input
                      type="text"
                      name="NomGroupe"
                      id="Groupe"
                      value="{{ $EmploiTemps->Groupe }}"
                      class="formbold-form-input"
                      disabled
                    />
                  </div>


                </div>
                <div class="formbold-input-group">
                    <label for="numero" class="formbold-form-label"> Nom Module </label>
                    <input required
                      type="text"
                      name="NomModule"
                      id="NomModule"
                      placeholder="Enter Nom Module"
                      class="formbold-form-input"

                    />
                  </div>
                  <div>
                    <label class="formbold-form-label">
                        Jour
                      </label>

                      <select class="formbold-form-select" name="Jour" id="occupation">
                        <option value="Lundi">Lundi</option>
                        <option value="Mardi">Mardi</option>
                        <option value="Mercredi">Mercredi</option>
                        <option value="Jeudi">Jeudi</option>
                        <option value="Vendredi">Vendredi</option>
                        <option value="Samedi">Samedi</option>
                      </select>
                </div>
                <div class="flex flex-wrap formbold--mx-3">
                    <div class="w-full sm:w-half formbold-px-3">
                      <div class="formbold-mb-5 w-full">
                        <label for="date" class="formbold-form-label"> Heur Debut Cour </label>
                        <input
                          type="time"
                          name="HeurDebut"
                          id="date"
                          class="formbold-form-input"
                          required
                        />
                      </div>
                    </div>
                    <div class="w-full sm:w-half formbold-px-3">
                      <div class="formbold-mb-5">
                        <label for="time" class="formbold-form-label">  Heur Fin Cour</label>
                        <input
                          type="time"
                          name="HeurFin"
                          id="time"
                          class="formbold-form-input"
                          required
                        />
                      </div>
                    </div>
                  </div>
                  <div class="formbold-input-group">
                    <label for="numero" class="formbold-form-label"> Num Salle </label>
                    <input required
                      type="text"
                      name="NumSalle"
                      id="NumSalle"
                      placeholder="Enter Numero Salle"
                      class="formbold-form-input"

                    />
                  </div>
                  <div>
                    <label class="formbold-form-label">
                        Type Salle
                      </label>

                      <select class="formbold-form-select" name="TypeSalle" id="occupation">
                        <option value="Amphi">Amphi</option>
                        <option value="Salle">Salle</option>
                      </select>
                </div>
                <div class="formbold-input-flex">
                    <div style="margin-top: 2%" class="formbold-input-group">
                      <label for="">Nom Enseignant</label>
                      <input
                        type="text"
                        name="NomEnseignant"
                        id="NomEnseignant"
                        class="formbold-form-input"
                        placeholder="Entre Nom Enseignant"
                      />
                    </div>
                    <div style="margin-top: 2%" class="formbold-input-group">
                      <label for="">Prenom Enseignant</label>
                      <input
                        type="text"
                        name="PrenomEnseignant"
                        id="PrenomEnseignant"
                        class="formbold-form-input"
                        placeholder="Entrer Prenom Enseignant"

                      />
                    </div>

                  </div>
            <button type="submit" class="formbold-btn">Ajouter Dans Emploi Temps</button>
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
  <!-- End custom js for this page-->
</body>

</html>
