<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Dashboard | Departement</title>
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
                Gestion des Departement
              </span>
            </div>
            <div class="right-section">
              <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" class="bi bi-laptop" viewBox="0 0 16 16">
                <path d="M13.5 3a.5.5 0 0 1 .5.5V11H2V3.5a.5.5 0 0 1 .5-.5zm-11-1A1.5 1.5 0 0 0 1 3.5V12h14V3.5A1.5 1.5 0 0 0 13.5 2zM0 12.5h16a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5"></path>
              </svg>
              <span>Tableau de board / </span><a href=""> Departements de l'ENS</a>
            </div>
          </div>
          <div class="add-operation mt-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"></path>
            </svg>
            <a href="{{ route('departements.create') }}" style="color:black">Ajouter une Departement</a>
          </div>
            @if (session('success'))
                <div id="success-message" class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
          <table id="myTable" class="table table-striped mt-5">
            <thead>
              <tr>
                <th style="text-align: center" scope="col">Nom Departement</th>
                <th style="text-align: center"  >Actions</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($departement as $departement)
              <tr>
                <td>{{ $departement->NomDepartement }}</td>
                <td class="td-crud-operations">
                  <a href="{{ route('departements.edit', $departement->NomDepartement) }}" class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="green" class="bi bi-pencil-square mr-3" viewBox="0 0 16 16">
                      <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                      <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                    </svg>
                  </a>
                  <form action="{{ route('departements.destroy', $departement->NomDepartement) }}" method="POST" style="display: inline;">
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

  <script src="/js/fillierefiltre.js"></script>

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
