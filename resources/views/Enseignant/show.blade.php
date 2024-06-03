<!-- resources/views/assign-roles.blade.php -->

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

.cadre {
    border: 4px solid #000000; /* Couleur et épaisseur de la bordure */
    padding: 10px; /* Espace intérieur du cadre */
    margin: 20px auto; /* Marge extérieure pour centrer le cadre */
    max-width: 500px; /* Largeur maximale du cadre */
}
          </style>
      </head>
<body>
    @include('Layout.navbar')
    @include('Layout.sidebar')
    <div class="container mt-5">
        <div class="head-section">
            <div class="left-section">
              <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" class="bi bi-calendar-check" viewBox="0 0 16 16" style="color:white; margin-bottom:2px; padding:0;">
                <path d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0"></path>
                <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z"></path>
              </svg>
              <span class="title-section">
                Gestion des Enseignant
              </span>
            </div>
            <div class="right-section">
              <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" class="bi bi-laptop" viewBox="0 0 16 16">
                <path d="M13.5 3a.5.5 0 0 1 .5.5V11H2V3.5a.5.5 0 0 1 .5-.5zm-11-1A1.5 1.5 0 0 0 1 3.5V12h14V3.5A1.5 1.5 0 0 0 13.5 2zM0 12.5h16a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5"></path>
              </svg>
              <span>Enseignant / </span><a href=""> info</a>
            </div>
          </div>
        <h2 style="text-align: center" class="mb-5 mt-5"><svg id='Teacher_24' width='50' height='50' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'><rect width='24' height='24' stroke='none' fill='#000000' opacity='0'/>


            <g transform="matrix(0.83 0 0 0.83 12 12)" >
            <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" translate(-16.01, -15)" d="M 7 3 C 5.343145750507619 3 4 4.343145750507619 4 6 C 4 7.656854249492381 5.343145750507619 9 7 9 C 8.65685424949238 9 10 7.656854249492381 10 6 C 10 4.343145750507619 8.65685424949238 3 7 3 z M 12 4 L 12 6 L 25 6 L 25 17 L 21 17 L 21 16 L 17 16 L 17 17 L 14 17 L 12 17 L 12 17.832031 C 11.982150951947158 17.940022437464606 11.982150951947158 18.050211562535395 12 18.158203 L 12 19 L 14 19 L 27 19 C 27.360635916577568 19.005100289545485 27.696081364571608 18.815624703830668 27.877887721486516 18.50412715028567 C 28.059694078401428 18.19262959674067 28.059694078401428 17.80737040325933 27.877887721486516 17.49587284971433 C 27.696081364571608 17.184375296169332 27.360635916577568 16.994899710454515 27 17 L 27 5 C 26.99994478209465 4.447738123791541 26.55226187620846 4.0000552179053495 26 4 L 12 4 z M 6 11 C 4.895 11 4 11.895 4 13 L 4 25.966797 C 4 26.536797 4.4632031 27 5.0332031 27 C 5.5772031 27 6.0284531 26.577156 6.0644531 26.035156 L 6.5019531 19.466797 C 6.5199531 19.204797 6.737 19 7 19 C 7.263 19 7.4800469 19.203844 7.4980469 19.464844 L 7.9355469 26.035156 C 7.9715469 26.578156 8.4227969 27 8.9667969 27 C 9.5367969 27 10 26.536797 10 25.966797 L 10 14 C 10 13.448 10.448 13 11 13 L 16 13 C 16.360635916577568 13.005100289545485 16.696081364571608 12.815624703830668 16.877887721486516 12.504127150285669 C 17.059694078401428 12.192629596740671 17.059694078401428 11.80737040325933 16.877887721486516 11.495872849714331 C 16.696081364571608 11.184375296169332 16.360635916577568 10.994899710454515 16 11 L 12 11 L 6 11 z" stroke-linecap="round" />
            </g>
            </svg>  Prof : {{ $enseignant->nom_enseignant  }} {{ $enseignant->prenom_enseignant }}</h2>
            <div style="text-align: center; margin-left: 0%;" class="form-group">
            <label  style="font-weight: bold; font-size:20px">Infos :</label>
        </div>
            <div class="cadre">

                <div class="form-group">
                    <label style="font-size: 20px" for="admin"><span style="font-weight: bold">CIN : </span>{{ $enseignant->cin_enseignant }}</label>
                </div>
                <div class="form-group">
                    <label style="font-size: 20px" for="admin"><span style="font-weight: bold">Email : </span>{{ $enseignant->email }}</label>
                </div>
                <div class="form-group">
                    <label style="font-size: 20px" for="admin"><span style="font-weight: bold">Date Naissance : </span>{{ $enseignant->date_naissance }}</label>
                </div>
                <div class="form-group">
                    <label style="font-size: 20px" for="admin"><span style="font-weight: bold">Spécialite : </span>{{ $enseignant->specialite }}</label>
                </div>
                <div class="form-group">
                    <label style="font-size: 20px" for="admin"><span style="font-weight: bold">Date Affectation : </span>{{ $enseignant->date_affectation }}</label>
                </div>
                <div class="form-group">
                    <label style="font-size: 20px" for="admin"><span style="font-weight: bold">Situation : </span>{{ $enseignant->situation }}</label>
                </div>
                <div class="form-group">
                    <label style="font-size: 20px" for="admin"><span style="font-weight: bold">Nom Departement : </span>{{ $enseignant->nom_departement }}</label>
                </div>
                <div class="form-group">
                    <label style="font-size: 20px" for="admin"><span style="font-weight: bold">Horaire Totale: </span>{{ $enseignant->horaire_total }}</label>
                </div>
                <div class="form-group">
                    <label style="font-size: 20px" for="admin">
                        <span style="font-weight: bold">Modules  : </span></label>
                </div>
                @foreach ($models as $models)
                <div style="margin-left:10% " class="form-group">
                    <label style="font-size: 20px" for="admin">
                        <li><span style="font-weight: bold">{{ $models->nom_module }} </span></label></li>
                </div>
                @endforeach
            </div>


            </div>
        </div>


    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
