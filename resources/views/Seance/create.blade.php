<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Gestion Emploi Temps | Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="/vendors/feather/feather.css">
    <link rel="stylesheet" href="/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <link rel="stylesheet" href="/../../vendors/mdi/css/materialdesignicons.min.css">
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="/js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="/css/vertical-layout-light/dashboard.css">
    <link rel="stylesheet" href="/../../vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="/css/AjouterEmploi/EmploiTempsStyle.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="/images/logo.png" />
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

        .container {
            display: flex;
            justify-content: space-between;
        }

        .formbold-form-wrapper {
            width: 70%;
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 8px;
            margin-left: 10%;
        }

        .list-wrapper {
            margin-left: 1%;
            width: 35%;
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 8px;
            margin-top: 30%;
        }

        .list-wrapper ul {
            list-style-type: none;
            padding: 0;
        }

        .list-wrapper ul li {
            margin-bottom: 10px;
            background-color: #f9f9f9;
            padding: 10px;
            border-radius: 4px;
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        @include('Layout.navbar')
        <!-- partial -->
        <!-- partial:partials/_sidebar.html -->
        @include('Layout.sidebar')

        <div class="formbold-main-wrapper">
            <div class="container">
                <div class="formbold-form-wrapper">
                    <h2 style="margin-bottom: 5%; text-align: center;">Emploi Temps</h2>
                    @if($errors->any())
                    <div id="error" class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                            <p>{{ $error }}</p>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action="{{ route('Seance.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id_filiere" value="{{ $id_filiere }}">
                        <input type="hidden" name="nom_groupe" value="{{ $groupe }}">
                        <input type="hidden" name="semestre" value="{{ $semestre }}">
                        <div class="formbold-input-flex">
                            <div style="margin-top: 2%" class="formbold-input-group">
                                <label for="">Filliere</label>
                                <input type="text" value="{{ $nomfiliere->nom_filiere }}" class="formbold-form-input" disabled />
                            </div>
                            <div style="margin-top: 2%" class="formbold-input-group">
                                <label for="">Semestre</label>
                                <input type="text" value="{{ $semestre }}" class="formbold-form-input" disabled />
                            </div>
                            <div style="margin-top: 2%" class="formbold-input-group">
                                <label for="">Groupe</label>
                                <input type="text" value="{{ $groupe }}" class="formbold-form-input" disabled />
                            </div>
                        </div>
                        <div>
                            <label class="formbold-form-label">Jour</label>
                            <select class="formbold-form-select" name="jour" id="jourSelect">
                                <option value="">Selecter Jour</option>
                                <option value="Lundi" @if (isset($jour) && $jour === 'Lundi') selected @endif>Lundi</option>
                                <option value="Mardi" @if (isset($jour) && $jour === 'Mardi') selected @endif>Mardi</option>
                                <option value="Mercredi" @if (isset($jour) && $jour === 'Mercredi') selected @endif>Mercredi</option>
                                <option value="Jeudi" @if (isset($jour) && $jour === 'Jeudi') selected @endif>Jeudi</option>
                                <option value="Vendredi" @if (isset($jour) && $jour === 'Vendredi') selected @endif>Vendredi</option>
                                <option value="Samedi" @if (isset($jour) && $jour === 'Samedi') selected @endif>Samedi</option>
                            </select>
                        </div>
                        
                        <div>
                            <label class="formbold-form-label">Nom Module</label>
                            <select class="formbold-form-select" name="id_module" id="NomModule">
                                <option value="">Select Nom Module</option>
                                @foreach ($modules as $modules)
                                <option value="{{ $modules->id }}">{{ $modules->nom_module }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex flex-wrap formbold--mx-3">
                            <div class="w-full sm:w-half formbold-px-3">
                                <div class="formbold-mb-5 w-full">
                                    <label for="HeurDebut" class="formbold-form-label">Heur Debut Seance</label>
                                    <input type="time" name="heure_debut" id="HeurDebut" class="formbold-form-input" required />
                                </div>
                            </div>
                            <div class="w-full sm:w-half formbold-px-3">
                                <div class="formbold-mb-5">
                                    <label for="HeurFin" class="formbold-form-label">Heur Fin Seance</label>
                                    <input type="time" name="heure_fin" id="HeurFin" class="formbold-form-input" required />
                                </div>
                            </div>
                        </div>
                        <div>
                            <label class="formbold-form-label">Num Salle</label>
                            <select class="formbold-form-select" name="num_salle" id="NumSalle">
                                <option value="">Selecter Votre Salle</option>
                                @foreach ($salles as $salles)
                                <option value="{{ $salles->num_salle }}">Num : {{ $salles->num_salle }} - {{ $salles->type_salle }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="formbold-form-label">Nom Complete Enseignant</label>
                            <select class="formbold-form-select" name="cin_enseignant" id="nom_enseignant">
                                <option value="">Selecter Votre Prof</option>
                                @foreach ($enseignant as $enseignant)
                                <option value="{{ $enseignant->cin_enseignant }}">{{ $enseignant->nom_enseignant }} {{ $enseignant->prenom_enseignant }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="formbold-btn">Ajouter Dans Emploi Temps</button>
                    </form>
                </div>

                <div class="list-wrapper">
                    <h2 style="margin-bottom: 5%; text-align: center;">Horaires <span style="font-size: 20px" id="selectedJour">{{ $jour ?? 'Aucun' }}</span> </h2>
                    @for ($l = 0; $l < $countHoraires; $l++)
                    @php
                    $count = 0;
                    $barrerHoraire = false;
                    @endphp

                    <li>
                        @while ($count < count($horairesIndispo))
                            @if (substr($horairesIndispo[$count]->heure_debut, 0, 5) == substr($Horaires[$l]->heure_debut, 0, 5) && substr($horairesIndispo[$count]->heure_fin, 0, 5) == substr($Horaires[$l]->heure_fin, 0, 5))
                                Seances {{ $l + 1 }} : <span style="font-weight: bold; text-decoration: line-through;">{{ substr($Horaires[$l]->heure_debut, 0, 5) }} - {{ substr($Horaires[$l]->heure_fin, 0, 5) }}</span>
                                @php
                                $barrerHoraire = true;
                                @endphp
                            @endif
                            @php
                            $count++;
                            @endphp
                        @endwhile

                        @if (!$barrerHoraire)
                            Seances {{ $l + 1 }} : {{ substr($Horaires[$l]->heure_debut, 0, 5) }} - {{ substr($Horaires[$l]->heure_fin, 0, 5) }}
                        @endif
                    </li>
                @endfor

                </div>
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
        document.getElementById('jourSelect').addEventListener('change', function () {
            const jour = this.value;
            const idFiliere = '{{ $id_filiere }}';
            const groupe = '{{ $groupe }}';
            const semestre = '{{ $semestre }}';

            window.location.href = `/seances/${idFiliere}/${groupe}/${semestre}?jour=${jour}`;
        });

        setTimeout(function () {
            var messageElement = document.getElementById('error');
            if (messageElement) {
                messageElement.style.transition = 'opacity 0.5s';
                messageElement.style.opacity = '0';
                setTimeout(function () {
                    messageElement.style.display = 'none';
                }, 2000);
            }
        }, 3000);
    </script>
    <!-- End custom js for this page-->
</body>

</html>
