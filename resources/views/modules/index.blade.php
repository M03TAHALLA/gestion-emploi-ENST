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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

  <!-- endinject -->
  <link rel="shortcut icon" href="/images/logo.png" />
</head>
<body>
  <div class="container-scroller">
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
                Gestion des modules
              </span>
            </div>
            <div class="right-section">
              <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" class="bi bi-laptop" viewBox="0 0 16 16">
                <path d="M13.5 3a.5.5 0 0 1 .5.5V11H2V3.5a.5.5 0 0 1 .5-.5zm-11-1A1.5 1.5 0 0 0 1 3.5V12h14V3.5A1.5 1.5 0 0 0 13.5 2zM0 12.5h16a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5"></path>
              </svg>
              <span>Tableau de board / </span><a href=""> modules de l'ENS</a>
            </div>
          </div>
          <div class="add-operation mt-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"></path>
            </svg>
            <a href="{{ route('modules.create') }}" style="color:black">Ajouter un module</a>
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
                      placeholder="Rechercher par nom de module"
                      class="formbold-form-input"
                  />
              </div>
              <div class="formbold-input-group" style="margin-top: 2%">
                  <select class="form-select form-select-lg mb-3">
                      <option value="" disabled selected>Nature de module</option>
                      <option value="Disciplinaire">Disciplinaire</option>
                      <option value="Complementaire">Complémentaire</option>
                  </select>
              </div>
          </div>
          <div class="formbold-input-flex">
              <div style="margin-top: 1%" class="formbold-input-group">
                  <input
                      type="number"
                      id="capaciteInput"
                      placeholder="Rechercher par volume horaire"
                      class="formbold-form-input"
                  />
              </div>
              <div style="margin-top: 1%" class="formbold-input-group">
                  <input
                      type="text"
                      placeholder="Rechercher par nom filiére"
                      class="formbold-form-input"
                  />
              </div>
              <div style="margin-top: 1%" class="formbold-input-group">
                <input
                    type="text"
                    placeholder="Rechercher par nom d'enseignant"
                    class="formbold-form-input"
                />
            </div>
          </div>
          
          <!-- Include table and other elements as in your original code -->
          
          <table id="myTable" class="table table-striped mt-5">
              <thead>
                  <tr>
                      <th scope="col">Nom module</th>
                      <th scope="col">Nom Filiére</th>
                      <th scope="col">Volume horaire</th>
                      <th scope="col">Nature module</th>
                      <th scope="col">Nom enseignant</th>
                      <th scope="col">Année Académique</th>
                      <th scope="col">Actions</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach ($modules as $module)
                      <tr>
                          <td style="font-weight: bold">{{ $module->nom_module }}</td>
                          <td>{{ $module->nom_filiere }}</td>
                          <td>{{ $module->volume_horaire }}</td>
                          <td>{{ $module->nature_module }}</td>
                          <td>{{ $module->nom_professeur}}</td>
                          <td>{{ $module->AAc }}</td>
                          <td class="td-crud-operations">
                              <a href="{{ route('modules.edit', $module->id) }}" class="">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="green" class="bi bi-pencil-square mr-3" viewBox="0 0 16 16">
                                      <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                      <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                  </svg>
                              </a>
                              <form action="{{ route('modules.destroy', $module->id) }}" method="POST" style="display: inline;">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-link" style="padding: 0; background-color: transparent; border: none;">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="red" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                          <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
                                      </svg>
                                  </button>
                              </form>
                          </td>
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


  <script>
    function filterTable() {
        var inputNomModule = document.getElementById("nomModuleInput");
        var inputNatureModule = document.getElementById("natureModuleInput");
        var inputVolumeHoraire = document.getElementById("volumeHoraireInput");
        var inputNomFiliere = document.getElementById("nomFiliereInput");
        var inputNomEnseignant = document.getElementById("nomEnseignantInput");

        var filterNomModule = inputNomModule ? inputNomModule.value.toUpperCase() : "";
        var filterNatureModule = inputNatureModule ? inputNatureModule.value.toUpperCase() : "";
        var filterVolumeHoraire = inputVolumeHoraire ? inputVolumeHoraire.value : "";
        var filterNomFiliere = inputNomFiliere ? inputNomFiliere.value.toUpperCase() : "";
        var filterNomEnseignant = inputNomEnseignant ? inputNomEnseignant.value.toUpperCase() : "";

        var table = document.getElementById("myTable");
        var rows = table.getElementsByTagName("tr");

        for (var i = 0; i < rows.length; i++) {
            var tdNomModule = rows[i].getElementsByTagName("td")[0];
            var tdNomFiliere = rows[i].getElementsByTagName("td")[1];
            var tdVolumeHoraire = rows[i].getElementsByTagName("td")[2];
            var tdNatureModule = rows[i].getElementsByTagName("td")[3];
            var tdNomEnseignant = rows[i].getElementsByTagName("td")[4];

            if (tdNomModule && tdNomFiliere && tdVolumeHoraire && tdNatureModule && tdNomEnseignant) {
                var txtValueNomModule = tdNomModule.textContent || tdNomModule.innerText;
                var txtValueNomFiliere = tdNomFiliere.textContent || tdNomFiliere.innerText;
                var txtValueVolumeHoraire = tdVolumeHoraire.textContent || tdVolumeHoraire.innerText;
                var txtValueNatureModule = tdNatureModule.textContent || tdNatureModule.innerText;
                var txtValueNomEnseignant = tdNomEnseignant.textContent || tdNomEnseignant.innerText;

                var matchNomModule = txtValueNomModule.toUpperCase().indexOf(filterNomModule) > -1;
                var matchNomFiliere = txtValueNomFiliere.toUpperCase().indexOf(filterNomFiliere) > -1;
                var matchVolumeHoraire = filterVolumeHoraire === "" || parseInt(txtValueVolumeHoraire) >= parseInt(filterVolumeHoraire);
                var matchNatureModule = txtValueNatureModule.toUpperCase().indexOf(filterNatureModule) > -1;
                var matchNomEnseignant = txtValueNomEnseignant.toUpperCase().indexOf(filterNomEnseignant) > -1;

                if (matchNomModule && matchNomFiliere && matchVolumeHoraire && matchNatureModule && matchNomEnseignant) {
                    rows[i].style.display = "";
                } else {
                    rows[i].style.display = "none";
                }
            }
        }
    }

    document.getElementById("nomModuleInput").addEventListener("input", filterTable);
    document.getElementById("natureModuleInput").addEventListener("input", filterTable);
    document.getElementById("volumeHoraireInput").addEventListener("input", filterTable);
    document.getElementById("nomFiliereInput").addEventListener("input", filterTable);
    document.getElementById("nomEnseignantInput").addEventListener("input", filterTable);
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
  <!-- End custom js for this page-->
</body>

</html>
