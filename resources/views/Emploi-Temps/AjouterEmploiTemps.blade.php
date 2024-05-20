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
          <form action="https://formbold.com/s/FORM_ID" method="POST">

            <div class="formbold-input-flex">
                <div>
              <label class="formbold-form-label">
                Filliere Name
              </label>

              <select class="formbold-form-select" name="occupation" id="occupation">
                <option value="Class Name">LDW</option>
                <option value="designer">SIL</option>
                <option value="fullstack">SMPC</option>
                <option value="frontend">JIF</option>
              </select>
            </div>
            <div>
                <label class="formbold-form-label">
                    Groupe Name
                  </label>

                  <select class="formbold-form-select" name="occupation" id="occupation">
                    <option value="Groupe Name">Groupe 1</option>
                    <option value="designer">Groupe 2</option>
                    <option value="fullstack">Groupe 3</option>
                    <option value="frontend">Groupe 4</option>
                  </select>
            </div>
            </div>

            <div>
                <label class="formbold-form-label">
                   Semestre
                  </label>

                  <select class="formbold-form-select" name="occupation" id="occupation">
                    <option value="Semestre1">Semestre 1 </option>
                    <option value="Semestre2">Semestre 2 </option>
                    <option value="Semestre3">Semestre 3 </option>
                    <option value="Semestre4">Semestre 4 </option>
                    <option value="Semestre5">Semestre 5 </option>
                    <option value="Semestre6">Semestre 6 </option>
                    <option value="Semestre7">Semestre 7 </option>
                    <option value="Semestre8">Semestre 8 </option>
                    <option value="Semestre9">Semestre 9 </option>
                    <option value="Semestre10">Semestre 10 </option>
                  </select>
            </div>


            <div class="formbold-input-group">
                <label class="formbold-form-label">
                  Matiere
                </label>

                <select class="formbold-form-select" name="occupation" id="occupation">
                  <option value="Matiere">JEE</option>
                  <option value="designer">Symfony</option>
                  <option value="fullstack">PHP</option>
                  <option value="frontend">UML</option>
                </select>
              </div>

              <div class="formbold-input-group">
                <label class="formbold-form-label">
                  Enseignant
                </label>

                <select class="formbold-form-select" name="occupation" id="occupation">
                  <option value="Enseignant">PROF1</option>
                  <option value="designer">PROF2</option>
                  <option value="fullstack">PROF3</option>
                  <option value="frontend">PROF4</option>
                </select>
              </div>

              <div class="formbold-input-group">
                <label class="formbold-form-label">
                  Jour
                </label>

                <select class="formbold-form-select" name="occupation" id="occupation">
                  <option value="Jour">Lundi</option>
                  <option value="designer">Mardi</option>
                  <option value="fullstack">Mercredi</option>
                  <option value="frontend">Jeudi</option>
                  <option value="frontend">Vendredi</option>
                  <option value="frontend">Samedi</option>
                </select>
              </div>
              <div class="formbold-input-flex">
                <div>
              <label class="formbold-form-label">
               Heurs Debut
              </label>

              <select class="formbold-form-select" name="occupation" id="occupation">
                <option value="Heurs Debut">08h</option>
                <option value="Heurs Debut">09h</option>
                <option value="Heurs Debut">10h</option>
                <option value="Heurs Debut">11h</option>
                <option value="Heurs Debut">12h</option>
                <option value="Heurs Debut">14h</option>
                <option value="Heurs Debut">15h</option>
                <option value="Heurs Debut">16h</option>
                <option value="Heurs Debut">17h</option>
                <option value="Heurs Debut">18h</option>
              </select>
            </div>
            <div>
                <label class="formbold-form-label">
                    Heurs Fin
                  </label>

                  <select class="formbold-form-select" name="occupation" id="occupation">
                        <option value="Heurs Debut">09h</option>
                        <option value="Heurs Debut">10h</option>
                        <option value="Heurs Debut">11h</option>
                        <option value="Heurs Debut">12h</option>
                        <option value="Heurs Debut">14h</option>
                        <option value="Heurs Debut">15h</option>
                        <option value="Heurs Debut">16h</option>
                        <option value="Heurs Debut">17h</option>
                        <option value="Heurs Debut">18h</option>
                  </select>
            </div>
            </div>
            <div>
                <label class="formbold-form-label">
                    Departement
                  </label>

                  <select class="formbold-form-select" name="occupation" id="occupation">
                    <option value="Departement">INFORMATIQUE</option>
                    <option value="designer">METHEMATIQUE</option>
                    <option value="fullstack">SCIENCE</option>
                    <option value="frontend">LANGUE</option>
                  </select>
            </div>
            <div class="formbold-input-radio-wrapper">
                <label for="ans" class="formbold-form-label">
                  Type Salle
                </label>

                <div class="formbold-radio-flex">
                  <div class="formbold-radio-group">
                    <label class="formbold-radio-label">
                      <input
                        class="formbold-input-radio"
                        type="radio"
                        name="ans"
                        id="ans"
                      />
                      Amphi
                      <span class="formbold-radio-checkmark"></span>
                    </label>
                  </div>

                  <div class="formbold-radio-group">
                    <label class="formbold-radio-label">
                      <input
                        class="formbold-input-radio"
                        type="radio"
                        name="ans"
                        id="ans"
                      />
                      Salle
                      <span class="formbold-radio-checkmark"></span>
                    </label>
                  </div>
                </div>
              </div>

            <div class="formbold-input-group">
                <label for="name" class="formbold-form-label"> Salle </label>
                <input
                  type="text"
                  name="name"
                  id="name"
                  placeholder="Enter Numero Salle"
                  class="formbold-form-input"
                />
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
  <!-- End custom js for this page-->
</body>

</html>
