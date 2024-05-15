<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Gestion Emploi Temps | Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="/vendors/feather/feather.css">
  <link rel="stylesheet" href="/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <link rel="stylesheet" href="../../vendors/mdi/css/materialdesignicons.min.css">
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="/js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="/css/vertical-layout-light/dashboard.css">
  <link rel="stylesheet" href="../../vendors/mdi/css/materialdesignicons.min.css">
    <style>
        .schedule-table table thead th {
padding: 25px 50px;
color: #000000;
text-align: center;
font-size: 20px;
font-weight: 800;
position: relative;
border: 0;

}
.schedule-table table thead th:before {
content: "";
width: 3px;
height: 35px;
position: absolute;
right: -1px;
top: 50%;
transform: translateY(-50%);
}
.schedule-table table thead th.last:before {
content: none;
}
.schedule-table table tbody td {
vertical-align: middle;
border: 1px solid rgba(98, 98, 100, 0.877);
font-weight: 500;
padding: 30px;
text-align: center;
}
.schedule-table table tbody td.day {
font-size: 22px;
font-weight: 600;
background: #f0f1f3;
border: 1px solid #e4e4e4;
position: relative;
transition: all 0.3s linear 0s;
min-width: 165px;
}
.schedule-table table tbody td.active {
position: relative;
z-index: 10;
transition: all 0.3s linear 0s;
min-width: 165px;
}
.schedule-table table tbody td.active h4 {
font-weight: 700;
color: #000;
font-size: 20px;
margin-bottom: 5px;
}
.schedule-table table tbody td.active p {
font-size: 16px;
line-height: normal;
margin-bottom: 0;
}
.schedule-table table tbody td .hover h4 {
font-weight: 700;
font-size: 20px;
color: #ffffff;
margin-bottom: 5px;
}
.schedule-table table tbody td .hover p {
font-size: 16px;
margin-bottom: 5px;
color: #ffffff;
line-height: normal;
}
.schedule-table table tbody td .hover span {
color: #ffffff;
font-weight: 600;
font-size: 18px;
}

#Table{
    margin-top: 5%;
}
.schedule-table table tbody td.active::before {
position: absolute;
content: "";
min-width: 100%;
min-height: 100%;
transform: scale(0);
top: 0;
left: 0;
z-index: -1;
border-radius: 0.25rem;
transition: all 0.3s linear 0s;
}
.schedule-table table tbody td .hover {
position: absolute;
left: 50%;
top: 50%;
width: 120%;
height: 120%;
transform: translate(-50%, -50%) scale(0.8);
z-index: 99;
background: #86d4f5;
border-radius: 0.25rem;
padding: 25px 0;
visibility: hidden;
opacity: 0;
transition: all 0.3s linear 0s;
}
.schedule-table table tbody td.active:hover .hover {
transform: translate(-50%, -50%) scale(1);
visibility: visible;
opacity: 1;
}
.schedule-table table tbody td.day:hover {
background: #86d4f5;
color: #fff;
border: 1px solid #86d4f5;
}
@media screen and (max-width: 1199px) {
.schedule-table {
display: block;
width: 100%;
overflow-x: auto;
}
.schedule-table table thead th {
padding: 25px 40px;
}
.schedule-table table tbody td {
padding: 20px;
}
.schedule-table table tbody td.active h4 {
font-size: 18px;
}
.schedule-table table tbody td.active p {
font-size: 15px;
}
.schedule-table table tbody td.day {
font-size: 20px;
}
.schedule-table table tbody td .hover {
padding: 15px 0;
}
.schedule-table table tbody td .hover span {
font-size: 17px;
}
}
@media screen and (max-width: 991px) {
.schedule-table table thead th {
font-size: 18px;
padding: 20px;
}
.schedule-table table tbody td.day {
font-size: 18px;
}
.schedule-table table tbody td.active h4 {
font-size: 17px;
}
}
@media screen and (max-width: 767px) {
.schedule-table table thead th {
padding: 15px;
}
.schedule-table table tbody td {
padding: 15px;
}
.schedule-table table tbody td.active h4 {
font-size: 16px;
}
.schedule-table table tbody td.active p {
font-size: 14px;
}
.schedule-table table tbody td .hover {
padding: 10px 0;
}
.schedule-table table tbody td.day {
font-size: 18px;
}
.schedule-table table tbody td .hover span {
font-size: 15px;
}
}
@media screen and (max-width: 575px) {
.schedule-table table tbody td.day {
min-width: 135px;
}
}


    </style>
  <!-- endinject -->
  <link rel="shortcut icon" href="/images/logo.png" />
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
                <a href="{{ route('Profile') }}" class="dropdown-item">
                    <i class="ti-user text-primary"></i>
                    Profile
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
          <li style="background: white;" >
                <a class="nav-link" href="{{  route('AjouterEmploiTemps') }}">
                    <i style="color:#6C7383" class="mdi mdi-archive menu-icon"></i>
                  <span style="color:#6C7383" class="menu-title"> Saisie Emploi Temps</span>
                </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{  route('dashboard.home') }}">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Gestion Emploi Temps</span>
            </a>
          </li>
          <li style="background: white;" >
            <a class="nav-link" href="{{route('sous_admin') }}">
                <i style="color:#6C7383" class="mdi mdi-account-multiple menu-icon"></i>
                <span style="color:#6C7383" class="menu-arrow">Sous Admin</span>
            </a>
          </li>
          <li style="background: white;" >
            <a class="nav-link"  href="{{route('dashboard.ressources') }}" >
                <i style="color:#6C7383" class="mdi mdi-book-open-variant menu-icon"></i>
              <span style="color:#6C7383" class="menu-arrow">Ressources</span>
            </a>
          </li>
        </ul>
      </nav>
      <div class="container-section">
        <section>
          <div class="head-section">
            <div class="left-section">
              <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" class="bi bi-calendar-check" viewBox="0 0 16 16" style="color:white; margin-bottom:2px; padding:0;">
                <path d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0"></path>
                <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z"></path>
              </svg>
              <span class="title-section">
                Emploi de temps
              </span>
            </div>
            <div class="right-section">
              <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" class="bi bi-laptop" viewBox="0 0 16 16">
                <path d="M13.5 3a.5.5 0 0 1 .5.5V11H2V3.5a.5.5 0 0 1 .5-.5zm-11-1A1.5 1.5 0 0 0 1 3.5V12h14V3.5A1.5 1.5 0 0 0 13.5 2zM0 12.5h16a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5"></path>
              </svg>
              <span>Tableau de board / </span><a href=""> Saisir les emplois de temps</a>
            </div>
          </div>
          <div class="operations-section">
            <div class="container">
              <div class="add-operation">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"></path>
                </svg>
                <a href="" style="color:black">Ajouter un emploi de temps</a>
              </div>
              <div class="export-operation">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-arrow-up" viewBox="0 0 16 16">
                  <path d="M8.5 11.5a.5.5 0 0 1-1 0V7.707L6.354 8.854a.5.5 0 1 1-.708-.708l2-2a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 7.707z"></path>
                  <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z"></path>
                </svg>
                <a href="" style="color:black">Exporter Emploi du temps par enseignat</a>
              </div>
              <div class="export-operation-second">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-arrow-up" viewBox="0 0 16 16">
                  <path d="M8.5 11.5a.5.5 0 0 1-1 0V7.707L6.354 8.854a.5.5 0 1 1-.708-.708l2-2a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 7.707z"></path>
                  <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z"></path>
                </svg>
                <a href="" style="color:black">Exporter Emploi du temps par classe</a>
              </div>
              <div class="afficher-tous">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-list" viewBox="0 0 16 16">
                  <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2z"></path>
                  <path d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8m0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0M4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0m0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0"></path>
                </svg>
                <a href="">Afficher tout</a>
              </div>
            </div>
          </div>
    <div id="Table">
          <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="schedule-table">
                        <table class="table bg-white">
                            <thead>
                                <tr>
                                    <th>Class Name</th>
                                    <th>08h - 10h</th>
                                    <th>10h - 12h</th>
                                    <th>14h - 16h</th>
                                    <th class="last">16h - 18h</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="day">Lundi</td>
                                    <td class="active">
                                        <h4>UML</h4>
                                        <p>08h - 10h</p>
                                        <div class="hover">
                                            <h4>UML</h4>
                                            <p>08h - 10h</p>
                                            <span>PROF ....</span>
                                        </div>
                                    </td>
                                    <td></td>
                                    <td class="active">
                                        <h4>Symfony</h4>
                                        <p>14h - 16h</p>
                                        <div class="hover">
                                            <h4>Symfony</h4>
                                            <p>10h - 12h</p>
                                            <span>PROF BENDEHMAN</span>
                                        </div>
                                    </td>
                                    <td></td>
                                </tr>

                                <tr>
                                    <td class="day">Mardi</td>
                                    <td></td>
                                    <td class="active">
                                        <h4>PHP</h4>
                                        <p>10h - 12h</p>
                                        <div class="hover">
                                            <h4>PHP</h4>
                                            <p>10H - 12 h</p>
                                            <span>PROF ....</span>
                                        </div>
                                    </td>
                                    <td class="active">
                                        <h4>JEE</h4>
                                        <p>14h - 16h</p>
                                        <div class="hover">
                                            <h4>JEE</h4>
                                            <p>14h - 16h</p>
                                            <span>PROF BENDEHMAN</span>
                                        </div>
                                    </td>
                                    <td></td>
                                </tr>

                                <tr>
                                    <td class="day">Mercredi</td>
                                    <td class="active">
                                        <h4>JEE</h4>
                                        <p>08h - 09h</p>
                                        <h4>ANGLAIS</h4>
                                        <p>09h - 10h</p>
                                        <div class="hover">
                                            <h4>JEE</h4>
                                            <p>08h - 09h</p>
                                            <span>PROF 1 </span>
                                            <h4>ANGLAIS</h4>
                                            <p>09h - 10h</p>
                                            <span>PROF 2 </span>
                                        </div>
                                    </td>
                                    <td></td>
                                    <td class="active">
                                        <h4>ANGLAIS</h4>
                                        <p>14h - 16h</p>
                                        <div class="hover">
                                            <h4>ANGLAIS</h4>
                                            <p>14h - 16 h</p>
                                            <span>PROF ...</span>
                                        </div>
                                    </td>
                                    <td></td>
                                </tr>

                                <tr>
                                    <td class="day">Jeudi</td>
                                    <td class="active">
                                        <h4>PHP</h4>
                                        <p>08h - 10h</p>
                                        <div class="hover">
                                            <h4>PHP</h4>
                                            <p>08h - 10h</p>
                                            <span>PROF .....</span>
                                        </div>
                                    </td>
                                    <td class="active">
                                        <h4>UML</h4>
                                        <p>10h - 12h</p>
                                        <div class="hover">
                                            <h4>UML</h4>
                                            <p>10h - 12h</p>
                                            <span>PROF ....</span>
                                        </div>
                                    </td>
                                    <td class="active">
                                        <h4>Symfony</h4>
                                        <p>14h - 16h</p>
                                        <div class="hover">
                                            <h4>Symfony</h4>
                                            <p>14h - 16h</p>
                                            <span>PROF BENDEHMAN</span>
                                        </div>
                                    </td>
                                    <td class="active">
                                        <h4>JEE</h4>
                                        <p>16h - 17h</p>
                                        <h4>Symfony</h4>
                                        <p>17h - 18h</p>
                                        <div class="hover">
                                            <h4>JEE</h4>
                                            <p>16h - 17h</p>
                                            <span>PROF 1 </span>
                                            <h4>Symfony</h4>
                                            <p>17h - 18h</p>
                                            <span>PROF 2 </span>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="day">Vendredi</td>
                                    <td></td>
                                    <td class="active">
                                        <h4>PHP</h4>
                                        <p>10h - 12 h</p>
                                        <div class="hover">
                                            <h4>PHP</h4>
                                            <p>10h - 12h</p>
                                            <span>PROF ....</span>
                                        </div>
                                    </td>
                                    <td></td>
                                    <td class="active">
                                        <h4>Symfony</h4>
                                        <p>16h - 18h</p>
                                        <div class="hover">
                                            <h4>Symfony</h4>
                                            <p>16h - 18h</p>
                                            <span>PROF BENDEHMAN</span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="day">Samedi</td>
                                    <td class="active">
                                        <h4>JEE</h4>
                                        <p>08h - 10h</p>
                                        <div class="hover">
                                            <h4>JEE</h4>
                                            <p>08h - 10h</p>
                                            <span>PROF BENDEHMAN</span>
                                        </div>
                                    </td>
                                    <td></td>
                                    <td class="active">
                                        <h4>PHP</h4>
                                        <p>14h - 16h</p>
                                        <div class="hover">
                                            <h4>PHP</h4>
                                            <p>14h - 16h</p>
                                            <span>PROF ....</span>
                                        </div>
                                    </td>
                                    <td></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
</div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
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
