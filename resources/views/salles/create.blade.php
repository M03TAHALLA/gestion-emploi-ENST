<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Dashboard | Salle</title>
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
              Gestion des salles
            </span>
          </div>
          <div class="right-section">
            <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" class="bi bi-laptop" viewBox="0 0 16 16">
              <path d="M13.5 3a.5.5 0 0 1 .5.5V11H2V3.5a.5.5 0 0 1 .5-.5zm-11-1A1.5 1.5 0 0 0 1 3.5V12h14V3.5A1.5 1.5 0 0 0 13.5 2zM0 12.5h16a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5"></path>
            </svg>
            <span>Tableau de bord / </span><a href=""> Salles de l'ENS</a>
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

        <form action="{{ route('salles.store') }}" method="POST" class="mx-auto mt-5">
          @csrf
          <div class="form-group">
            <label for="num_salle">Numéro de la Salle:</label>
            <input type="text" id="num_salle" name="num_salle" value="{{ old('num_salle') }}" required class="form-control">
          </div>
          <div class="form-group">
            <label for="nom_departement">Nom du Département:</label>
            <select id="nom_departement" name="nom_departement" required class="form-control">
              <option value="">Sélectionnez un département</option>
              @foreach($departements as $departement)
                <option value="{{ $departement->nom_departement }}">{{ $departement->nom_departement }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="type_salle">Type de Salle:</label>
            <select id="type_salle" name="type_salle" required class="form-control">
              <option value="Salle">Salle</option>
              <option value="Amphi">Amphi</option>
              <option value="Laboratoire">Laboratoire</option>
            </select>
          </div>
          <div class="form-group">
            <label for="capacite">Capacité:</label>
            <input type="number" id="capacite" name="capacite" value="{{ old('capacite') }}" required class="form-control">
          </div>
          <div class="form-group form-check">
            <input type="checkbox" id="disponibilite" name="disponibilite" value="0" {{ old('disponibilite') ? 'checked' : '' }} class="form-check-input mr-0" checked>
            <label for="disponibilite" class="form-check-label ml-0">Disponible</label>
          </div>
          <div class="form-group mt-3">
            <label for="annee_academique">Année Académique:</label>
            <input type="text" id="annee_academique" name="annee_academique" value="2024-2025" readonly class="form-control">
          </div>
          <button type="submit" class="btn btn-primary">Créer une nouvelle salle</button>
        </form>

      </section>
    </div>
  </div>

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
