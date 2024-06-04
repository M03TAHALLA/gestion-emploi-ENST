<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Dashboard | Admins</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="/vendors/feather/feather.css">
  <link rel="stylesheet" href="/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <link rel="stylesheet" href="../../vendors/mdi/css/materialdesignicons.min.css">
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.bootstrap5.css">
  <link rel="stylesheet" href="/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="/js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="/css/vertical-layout-light/dashboard.css">
  <link rel="stylesheet" href="../../vendors/mdi/css/materialdesignicons.min.css">

  <!-- endinject -->
  <link rel="shortcut icon" href="/images/logo.png" />

  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
  <script src="hhttps://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
  <script src="https://cdn.datatables.net/2.0.7/js/dataTables.bootstrap5.js"></script>
    <style>
            .button {
            background-color: #0039a6;
            color: #ffffff;
            width: 8.5em;
            height: 2.9em;
            font-size: 15px;
            border: #0039a6 0.2em solid;
            border-radius: 11px;
            text-align: right;
            transition: all 0.2s ease;
            }

            .button:hover {
            background-color: #e2e2e2;
            cursor: pointer;
            color: black;
            }

            .button svg {
            width: 1.6em;
            margin: -0.2em 0.8em 1em;
            position: absolute;
            display: flex;
            transition: all 0.2s ease;
            }

            .button:hover svg {
            transform: translateX(10px);
            }

            .text {
            margin: 0 1.5em
            }
            /* radios */
            :root {
            --checkbox-size: 16px;
            --margin: 16px;
            --margin-small: calc(var(--margin) / 2);
            --text-lighter: #ccc;
            --brand: #0039a6;
            }


            fieldset {
            border: none;
            display: flex;
            flex-direction: column;
            margin: 20px;
            align-items: flex-start;
            min-width: 400px;
            }

            label {
            display: flex;
            flex-direction: row;
            align-items: center;
            }

            .aside {
            color: var(--text-lighter);
            }

            input {
            position: relative !important;
            appearance: none;
            margin: var(--margin-small);
            box-sizing: content-box;
            overflow: hidden;
            }

            /* circle */
            input:before {
            content: '';
            display: block;
            box-sizing: content-box;
            width: var(--checkbox-size);
            height: var(--checkbox-size);
            border: 2px solid var(--text-lighter);
            transition: 0.2s border-color ease;
            }

            input:checked:before {
            border-color: var(--brand);
            transition: 0.5s border-color ease;
            }

            input:disabled:before {
            border-color: var(--text-lighter);
            background-color: var(--text-lighter);
            }

            /* dot */
            input:after {
            content: '';
            display: block;
            position: absolute;
            box-sizing: content-box;
            top: 50%;
            left: 50%;
            transform-origin: 50% 50%;
            background-color: var(--brand);
            width: var(--checkbox-size);
            height: var(--checkbox-size);
            border-radius: 100vh;
            transform: translate(-50%, -50%) scale(0);
            }

            input[type="radio"]:before {
            border-radius: 100vh;
            }

            input[type="radio"]:after {
            width: var(--checkbox-size);
            height: var(--checkbox-size);
            border-radius: 100vh;
            transform: translate(-50%, -50%) scale(0);
            }

            input[type="radio"]:checked:after {
            animation: toggleOnRadio 0.2s ease forwards;
            }

            input[type="checkbox"]:before {
            border-radius: calc(var(--checkbox-size) / 4);
            }

            input[type="checkbox"]:after {
            width: calc(var(--checkbox-size) * 0.6);
            height: var(--checkbox-size);
            border-radius: 0;
            transform: translate(-50%, -85%) scale(0) rotate(45deg);
            background-color: transparent;
            box-shadow: 4px 4px 0px 0px var(--brand);
            }

            input[type="checkbox"]:checked:after {
            animation: toggleOnCheckbox 0.2s ease forwards;
            }

            input[type="checkbox"].filled:before {
            border-radius: calc(var(--checkbox-size) / 4);
            transition: 0.2s border-color ease, 0.2s background-color ease;
            }

            input[type="checkbox"]:checked:not(:disabled):before {
            background-color: var(--brand);
            }

            input:not(:disabled):after {
            box-shadow: 4px 4px 0px 0px white;
            }

            @keyframes toggleOnCheckbox {
            0% {
                opacity: 0;
                transform: translate(-50%, -85%) scale(0) rotate(45deg);
            }

            70% {
                opacity: 1;
                transform: translate(-50%, -85%) scale(0.9) rotate(45deg);
            }

            100% {
                transform: translate(-50%, -85%) scale(0.8) rotate(45deg);
            }
            }

            @keyframes toggleOnRadio {
            0% {
                opacity: 0;
                transform: translate(-50%, -50%) scale(0);
            }

            70% {
                opacity: 1;
                transform: translate(-50%, -50%) scale(0.9);
            }

            100% {
                transform: translate(-50%, -50%) scale(0.8);
            }
            }

    </style>
</head>
<body>
  <div class="container-scroller">
    @include('Layout.navbar')
      @include('Layout.sidebar')

      <div class="container-section">
        <section>
          <div class="head-section">
            <div class="left-section">
                <i class="mdi mdi-account-multiple menu-icon" style="height:10% ;color:white; "></i>
              <span class="title-section">
                Sous Admin
              </span>
            </div>
            <div class="right-section">
              <span>Admins liste  </span>
            </div>
          </div>
          <div class="operations-section">
            <div class="container">
              <div class="add-operation">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"></path>
                </svg>
                <a href="{{ route('admins.create') }}" style="color:black">Ajouter un Nauveau Admin</a>
              </div>
              @if (session('success'))
              <div id="success-message" class="alert alert-success">
                  {{ session('success') }}
              </div>
          @endif
            </div>
            <div class="formbold-input-flex">
              <div style="margin-top: 2%" class="formbold-input-group">
                  <input
                      type="text"
                      id="searchInput" placeholder="Rechercher par Nom, Prenom, Cin ou Email"
                      class="formbold-form-input"
                  />
              </div>
            </div>
          </div>
          @superadmin
          <p>Bienvenue, Super Admin!</p>
        @endsuperadmin
        @sousadmin
        <p>Bienvenue, sous Admin!</p>
        @endsousadmin
          <div class="temp-div" >
            <table id="Table" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>CIN</th>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sousAdmins as $sousAdmin)
                        <tr>
                          <td>{{$sousAdmin->cin}}</td>
                          <td>{{$sousAdmin->nom}}</td>
                          <td>{{$sousAdmin->prenom}}</td>
                          <td>{{$sousAdmin->email}}</td>
                          <td class="td-crud-operations">
                            <a href="{{ route('admins.edit', $sousAdmin->id) }}" class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="green" class="bi bi-pencil-square mr-3" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                </svg>
                            </a>
                            <form action="{{ route('admins.destroy', $sousAdmin->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-link" style="padding: 0; background-color: transparent; border: none;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="red" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                        <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
                                    </svg>
                                </button>
                            </form>
                            <a href="{{ route('admins.show', $sousAdmin->id) }}">
                              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16" style="margin-left: 10px">
                                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                              </svg>
                            </a>
                        </tr>
                    @endforeach
                </tbody>
                
            </table>
          </div>
        </section>
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <script>
    document.addEventListener('DOMContentLoaded', function () {
        const searchInput = document.getElementById('searchInput');
        const table = document.getElementById('Table');
        const rows = table.getElementsByTagName('tr');

        searchInput.addEventListener('keyup', function () {
            const filter = searchInput.value.toLowerCase();
            for (let i = 1; i < rows.length; i++) {
                const cells = rows[i].getElementsByTagName('td');
                let showRow = false;
                for (let j = 0; j < cells.length - 1; j++) { // exclude the last column (actions)
                    if (cells[j] && cells[j].innerText.toLowerCase().includes(filter)) {
                        showRow = true;
                        break;
                    }
                }
                rows[i].style.display = showRow ? '' : 'none';
            }
        });
    });
  </script>
  <!-- plugins:js -->
  <script src="/vendors/js/vendor.bundle.base.js"></scrip>
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
