<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Dashboard | Sous - Admin</title>
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
              <span>Nombre Sous Admins : <span style="color : red;font-weight:bold">10</span>  </span>
            </div>
          </div>
          <div class="operations-section">
            <div class="container">
              <div class="add-operation">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"></path>
                </svg>
                <a href="{{ route('sous-admin.form') }}" style="color:black">Ajouter un Nauveau Admin</a>
              </div>
            </div>
          </div>
          <div class="temp-div" >
            <table id="Table" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Roles</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Tahalla</td>
                        <td>Mohammed</td>
                        <td>mohammedtahalla@gmail.com</td>
                        <td>Tahalla2003</td>
                        <td>
                            <div class="container" style="text-align: center; margin-left: 40%">
                                <fieldset id="c-group">
                                  <label for="c1">
                                    <input type="checkbox" id="c1" name="c-group" checked>
                                    <span class="label-text">Create</span>
                                  </label>
                                  <label for="c2">
                                    <input type="checkbox" id="c2" name="c-group">
                                    <span class="label-text">Update</span>
                                  </label>
                                  <label for="c3">
                                    <input type="checkbox" id="c3" name="c-group">
                                    <span class="label-text">Delete</span>
                                  </label>
                                </fieldset>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Ahmed</td>
                        <td>Mansof</td>
                        <td>AhmedMansof@gmail.com</td>
                        <td>Ahmed2003</td>
                        <td>
                            <div class="container" style="text-align: center; margin-left: 40%">
                                <fieldset id="c-group">
                                  <label for="c11">
                                    <input type="checkbox" id="c11" name="c-group" checked>
                                    <span class="label-text">Create</span>
                                  </label>
                                  <label for="c22">
                                    <input type="checkbox" id="c22" name="c-group">
                                    <span class="label-text">Update</span>
                                  </label>
                                  <label for="c33">
                                    <input type="checkbox" id="c33" name="c-group">
                                    <span class="label-text">Delete</span>
                                  </label>
                                </fieldset>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Elyazid</td>
                        <td>Halim</td>
                        <td>ElyazidHalim@gmail.com</td>
                        <td>Elyazid2003</td>
                        <td>
                            <div class="container" style="text-align: center; margin-left: 40%">
                                <fieldset id="c-group">
                                  <label for="c111">
                                    <input type="checkbox" id="c111" name="c-group" checked>
                                    <span class="label-text">Create</span>
                                  </label>
                                  <label for="c222">
                                    <input type="checkbox" id="c222" name="c-group">
                                    <span class="label-text">Update</span>
                                  </label>
                                  <label for="c333">
                                    <input type="checkbox" id="c333" name="c-group">
                                    <span class="label-text">Delete</span>
                                  </label>
                                </fieldset>
                            </div>
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Role</th>
                    </tr>
                </tfoot>
            </table>
          </div>
        </section>
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

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
