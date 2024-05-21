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

            <h2 style="margin-bottom: 5%;text-align:center" class=""> Emploi Temps</h2>
          <form action="{{ route('Emploitemps.store') }}" method="POST">
            @csrf
                <div>
                    <label class="formbold-form-label">
                      Nom Departement
                    </label>
                    <select class="formbold-form-select" name="Departement" id="occupation">
                        @foreach ($Departement as $Departement)
                      <option value="{{ $Departement->NomDepartement }}">{{ $Departement->NomDepartement }}</option>
                      @endforeach
                    </select>
                  </div>
                <div>
              <label class="formbold-form-label">
               Nom Filliere
              </label>

              <select  class="formbold-form-select" name="Filliere" id="occupation">
                @foreach ($Fillieres as $Fillieres)
                <option value="{{ $Fillieres->NomFilliere }}" {{ isset($resultat) && $resultat->NomFilliere == $Fillieres->NomFilliere ? 'selected' : '' }}>
                    {{ $Fillieres->NomFilliere }}
                </option>
                @endforeach
              </select>
            </div>
            <div>
                <label class="formbold-form-label">
                    Groupe Name
                  </label>

                  <select class="formbold-form-select" name="Groupe" id="occupation">
                    <option value="1">Groupe 1</option>
                    <option value="2">Groupe 2</option>
                    <option value="3">Groupe 3</option>
                    <option value="4">Groupe 4</option>
                  </select>
            </div>

            <div class="flex flex-wrap formbold--mx-3">
                <div class="w-full sm:w-half formbold-px-3">
                  <div class="formbold-mb-5 w-full">
                    <label for="date" class="formbold-form-label"> Craunaux Debut </label>
                    <input value="{{ old('CraunauxDebut') }}"
                      type="time"
                      name="CraunauxDebut"
                      id="date"
                      class="formbold-form-input"
                      required
                    />
                  </div>
                </div>
                <div class="w-full sm:w-half formbold-px-3">
                  <div class="formbold-mb-5">
                    <label for="time" class="formbold-form-label">  Craunaux Fin </label>
                    <input value="{{ old('CraunauxFin') }}"
                      type="time"
                      name="CraunauxFin"
                      id="time"
                      class="formbold-form-input"
                      required
                    />
                  </div>
                </div>
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
</script>
  <!-- End custom js for this page-->
</body>

</html>
