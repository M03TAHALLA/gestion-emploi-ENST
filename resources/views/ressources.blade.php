<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>ENSTETOUAN &mdash; Ressources</title>
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

  <!-- endinject -->
  <link rel="shortcut icon" href="/images/logo.png" />
</head>
<body>
  <div class="container-scroller">
    @include('Layout.navbar')
      @include('Layout.sidebar')

      <div class="container-section">
        <section>
            <div class="elems">
                <div class="elem-salles">
                    <a href="{{ route('salles') }}">
                        <span>Liste des salles</span>
                    </a>
                  </div>
                  <div class="elem-profs">
                    <a href="{{ route('enseignants') }}">
                        <span>Liste des enseignants</span>
                    </a>
                  </div>
                  <div class="elem-modules">
                    <a href="{{ route('modules') }}">
                        <span>Liste des modules</span>
                    </a>
                  </div>
                  <div class="elem-fil">
                    <a href="{{ route('fillieres.index') }}">
                        <span>Liste des filiéres</span>
                    </a>
                  </div>
                  <div class="elem-dep">
                    <a href="{{ route('departements') }}">
                        <span>Liste des départements</span>
                    </a>
                  </div>
                  <div class="elem-etd">
                    <a href="{{ route('etudiants') }}">
                        <span>Liste des étudiants</span>
                    </a>
                  </div>
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
