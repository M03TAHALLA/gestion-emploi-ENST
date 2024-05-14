<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Sous Admin's | Admin</title>
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
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo ens-logo" href="/dashboard"><img src="/images/ENSlogo-removebg-preview.png" alt="logo" style="width:140px; height:70px;"/>ENST</a>
        <a class="navbar-brand brand-logo-mini ens-logo" href="/dashboard" style="margin-left: 35px">ENST</a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item nav-search d-none d-lg-block">
            <div class="input-group">
              <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                <span class="input-group-text" id="search">
                  <i class="icon-search"></i>
                </span>
              </div>
              <input type="text" class="form-control" id="navbar-search-input" placeholder="Search now" aria-label="search" aria-describedby="search">
            </div>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="icon-bell mx-0"></i>
              <span class="count"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
              <p class="mb-0 font-weight-normal float-left dropdown-header">notif</p>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-success">
                    <i class="ti-info-alt mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal">Application Error</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    Just now
                  </p>
                </div>
              </a>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-warning">
                    <i class="ti-settings mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal">Settings</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    Private message
                  </p>
                </div>
              </a>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-info">
                    <i class="ti-user mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal">New user registration</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    2 days ago
                  </p>
                </div>
              </a>
            </div>
          </li>
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="/images/faces/face28.jpg" alt="profile"/>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item">
                <i class="ti-settings text-primary"></i>
                Settings
              </a>
              <a class="dropdown-item">
                <i class="ti-power-off text-primary"></i>
                Logout
              </a>
            </div>
          </li>
          <li class="nav-item nav-settings d-none d-lg-flex">
            <a class="nav-link" href="#">
              <i class="icon-ellipsis"></i>
            </a>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div>
      <div id="right-sidebar" class="settings-panel">
        <i class="settings-close ti-close"></i>
        <ul class="nav nav-tabs border-top" id="setting-panel" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="chats-tab" data-toggle="tab" href="#chats-section" role="tab" aria-controls="chats-section">CHATS</a>
          </li>
        </ul>
        <div class="tab-content" id="setting-content">
          <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel" aria-labelledby="todo-section">
            <div class="add-items d-flex px-3 mb-0">
              <form class="form w-100">
                <div class="form-group d-flex">
                  <input type="text" class="form-control todo-list-input" placeholder="Add To-do">
                  <button type="submit" class="add btn btn-primary todo-list-add-btn" id="add-task">Add</button>
                </div>
              </form>
            </div>
            <div class="list-wrapper px-3">
              <ul class="d-flex flex-column-reverse todo-list">
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Team review meeting at 3.00 PM
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Prepare for presentation
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Resolve all the low priority tickets due today
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li class="completed">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked>
                      Schedule meeting for next week
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li class="completed">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked>
                      Project review
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
              </ul>
            </div>
            <h4 class="px-3 text-muted mt-5 font-weight-light mb-0">Events</h4>
            <div class="events pt-4 px-3">
              <div class="wrapper d-flex mb-2">
                <i class="ti-control-record text-primary mr-2"></i>
                <span>Feb 11 2018</span>
              </div>
              <p class="mb-0 font-weight-thin text-gray">Creating component page build a js</p>
              <p class="text-gray mb-0">The total number of sessions</p>
            </div>
            <div class="events pt-4 px-3">
              <div class="wrapper d-flex mb-2">
                <i class="ti-control-record text-primary mr-2"></i>
                <span>Feb 7 2018</span>
              </div>
              <p class="mb-0 font-weight-thin text-gray">Meeting with Alisa</p>
              <p class="text-gray mb-0 ">Call Sarah Graves</p>
            </div>
          </div>
          <!-- To do section tab ends -->
          <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
            <div class="d-flex align-items-center justify-content-between border-bottom">
              <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
              <small class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 font-weight-normal">See All</small>
            </div>
            <ul class="chat-list">
              <li class="list active">
                <div class="profile"><img src="/images/faces/face1.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Thomas Douglas</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">19 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face2.jpg" alt="image"><span class="offline"></span></div>
                <div class="info">
                  <div class="wrapper d-flex">
                    <p>Catherine</p>
                  </div>
                  <p>Away</p>
                </div>
                <div class="badge badge-success badge-pill my-auto mx-2">4</div>
                <small class="text-muted my-auto">23 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="/images/faces/face3.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Daniel Russell</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">14 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="/images/faces/face4.jpg" alt="image"><span class="offline"></span></div>
                <div class="info">
                  <p>James Richardson</p>
                  <p>Away</p>
                </div>
                <small class="text-muted my-auto">2 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="/images/faces/face5.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Madeline Kennedy</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">5 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="/images/faces/face6.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Sarah Graves</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">47 min</small>
              </li>
            </ul>
          </div>
          <!-- chat tab ends -->
        </div>
      </div>
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="/dashboard">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Gestion Emploi Temps</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link"  href="/dashboard/sous_admin" >
                <i class="mdi mdi-account-multiple menu-icon"></i>
              <span class="menu-title">Sous Admin </span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link"  href="/dashboard/ressources" >
                <i class="mdi mdi-book-open-variant menu-icon"></i>
              <span class="menu-title">Ressources</span>
            </a>
          </li>
        </ul>
      </nav>
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
                <a href="" style="color:black">Ajouter un Nauveau Admin</a>
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
