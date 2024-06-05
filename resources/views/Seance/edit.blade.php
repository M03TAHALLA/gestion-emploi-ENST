<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Seance | Modification</title>
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
                    <h2 style="margin-bottom: 5%; text-align: center;">Modification Seance : {{ $nomModule->nom_module }}</h2>
                    @if($errors->any())
                    <div id="error" class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                            <p>{{ $error }}</p>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action="{{ route('Seance.update', $seance->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <!-- Hidden inputs -->
                        <input type="hidden" name="id_filiere" value="{{ $seance->id_filiere }}">
                        <input type="hidden" name="nom_groupe" value="{{ $seance->nom_groupe }}">
                        <input type="hidden" name="semestre" value="{{ $seance->semestre }}">
                        <div class="formbold-input-flex">
                            <div style="margin-top: 2%" class="formbold-input-group">
                                <label for="">Filliere</label>
                                <input type="text" value="{{ $nomFiliere->nom_filiere }}" class="formbold-form-input" disabled />
                            </div>
                            <div style="margin-top: 2%" class="formbold-input-group">
                                <label for="">Semestre</label>
                                <input type="text" value="{{  $seance->semestre  }}" class="formbold-form-input" disabled />
                            </div>
                            <div style="margin-top: 2%" class="formbold-input-group">
                                <label for="">Groupe</label>
                                <input type="text" value="{{$seance->nom_groupe }}" class="formbold-form-input" disabled />
                            </div>
                        </div>
                        <div>
                            <label class="formbold-form-label">Jour</label>
                            <select class="formbold-form-select" name="jour" id="jourSelect">
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
                                @foreach ($modules as $module)
                                    <option value="{{ $module->id }}"@if (old('id_module', $seance->id_module) == $module->id) selected @endif>{{ $module->nom_module }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="formbold-form-label">Type Seances</label>
                            <select class="formbold-form-select" name="type_seances" id="type_seance">
                                <option value="">Select Type Seance</option>
                                <option value="COURS"  @if (isset($seance->type_seances ) && $seance->type_seances === 'COURS') selected @endif>COURS</option>
                                <option value="TD" @if (isset($seance->type_seances ) && $seance->type_seances === 'TD') selected @endif>TD</option>
                                <option value="TP" @if (isset($seance->type_seances ) && $seance->type_seances === 'TP') selected @endif>TP</option>
                            </select>
                        </div>


                        <div class="flex flex-wrap formbold--mx-3">
                            <div class="w-full sm:w-half formbold-px-3">
                                <div class="formbold-mb-5 w-full">
                                    <label for="HeurDebut" class="formbold-form-label">Heur Debut Seance</label>
                                    <input type="time" name="heure_debut" value="{{ substr($seance->heure_debut,0,5) }}" id="HeurDebut" class="formbold-form-input" required />
                                </div>
                            </div>
                            <div class="w-full sm:w-half formbold-px-3">
                                <div class="formbold-mb-5">
                                    <label for="HeurFin" class="formbold-form-label">Heur Fin Seance</label>
                                    <input type="time" name="heure_fin" value="{{ substr($seance->heure_fin,0,5) }}" id="HeurFin" class="formbold-form-input" required />
                                </div>
                            </div>
                        </div>
                        <div>
                            <label class="formbold-form-label">Num Salle</label>
                            <select class="formbold-form-select" name="num_salle" id="NumSalle">
                                <option value="">Selecter Votre Salle</option>
                                @foreach ($salles as $salles)
                                <option value="{{ $salles->num_salle }}" @if (isset($seance->num_salle ) && $seance->num_salle === $salles->num_salle) selected @endif>Num : {{ $salles->num_salle }} - {{ $salles->type_salle }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="formbold-form-label">Nom Complete Enseignant</label>
                                <select class="formbold-form-select" name="cin_enseignant" id="nom_enseignant">
                                    <option value="{{ $enseignant->cin_enseignant }}">{{ $enseignant->nom_enseignant }} {{ $enseignant->prenom_enseignant }}</option>
                                    <!-- Options will be populated dynamically -->
                                </select>
                        </div>

                        <button type="submit" class="formbold-btn">Modifier Seance Dans Emploi Temps</button>
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
            const idFiliere = '{{ $seance->id_filiere }}';
            const groupe = '{{ $seance->nom_groupe }}';
            const semestre = '{{ $seance->semestre }}';
            const seance = '{{ $seance->id }}';

            window.location.href = `/seancesedit/${idFiliere}/${groupe}/${semestre}/${seance}?jour=${jour}`;
        });

        setTimeout(function () {
            var messageElement = document.getElementById('error');
            if (messageElement) {
                messageElement.style.transition = 'opacity 1s';
                messageElement.style.opacity = '0';
                setTimeout(function () {
                    messageElement.style.display = 'none';
                }, 2000);
            }
        }, 3000);

        document.getElementById('NomModule').addEventListener('change', function () {
    const moduleId = this.value;
    const filiereId = '{{ $seance->id_filiere }}';
    const semestre = '{{ $seance->semestre }}';

    if (moduleId) {
        fetch(`/get-enseignants/${moduleId}/${filiereId}/${semestre}`)
            .then(response => response.json())
            .then(data => {
                const enseignantSelect = document.getElementById('nom_enseignant');
                enseignantSelect.innerHTML = '<option value="">Selecter Votre Prof</option>';
                data.forEach(enseignant => {
                    const option = document.createElement('option');
                    option.value = enseignant.cin_enseignant;
                    option.textContent = `${enseignant.nom_enseignant} ${enseignant.prenom_enseignant}`;
                    enseignantSelect.appendChild(option);
                });
            })
            .catch(error => console.error('Error fetching enseignants:', error));
    } else {
        document.getElementById('nom_enseignant').innerHTML = '<option value="">Selecter Votre Prof</option>';
    }
});


    </script>
    <!-- End custom js for this page-->

</body>

</html>
