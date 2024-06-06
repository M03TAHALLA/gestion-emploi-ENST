<style>
    body {
        margin-top: 0;
        font-family: Arial, sans-serif; /* Ensure a web-safe font for consistency */
    }
    .schedule-table table {
        width: 100%;
        border-collapse: collapse; /* Ensure there are no gaps between table cells */
    }
    .schedule-table table thead tr {
        background: #8c969a;
    }
    .schedule-table table thead th {
        padding: 5px; /* Reduced padding to fit the content */
        color: #000000;
        text-align: center;
        font-size: 12px; /* Adjusted font size for better fit */
        font-weight: 800;
        position: relative;
        border: 1;
    }
    .schedule-table table thead th:before {
        content: "";
        width: 3px;
        height: 35px;
        background: rgba(255, 255, 255, 0.2);
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
        border: 2px solid #000000;
        font-weight: 500;
        padding: 5px; /* Reduced padding to fit the content */
        text-align: center;
        font-size: 50px; /* Adjusted font size for better fit */
    }
    .schedule-table table tbody td.day {
        font-size: 14px;
        font-weight: 600;
        background: #f0f1f3;
        border: 2px solid #000000;
        position: relative;
        transition: all 0.3s linear 0s;
        min-width: 130px; /* Reduced minimum width */
    }
    .schedule-table table tbody td.active {
        position: relative;
        z-index: 10;
        transition: all 0.3s linear 0s;
        min-width: 130px; /* Reduced minimum width */
    }
    .schedule-table table tbody td.active h4 {
        font-weight: 700;
        color: #000;
        font-size: 14px;
        margin-bottom: 5px;
    }
    .schedule-table table tbody td.active p {
        font-size: 12px;
        line-height: normal;
        margin-bottom: 0;
    }
    .schedule-table table tbody td .hover h4 {
        font-weight: 700;
        font-size: 14px;
        color: #ffffff;
        margin-bottom: 5px;
    }
    .schedule-table table tbody td .hover p {
        font-size: 12px;
        margin-bottom: 5px;
        color: #ffffff;
        line-height: normal;
    }
    .schedule-table table tbody td .hover span {
        color: #ffffff;
        font-weight: 600;
        font-size: 12px;
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
        width: 100%;
        height: 100%;
        transform: translate(-50%, -50%) scale(0.8);
        z-index: 99;
        background: #86d4f5;
        border-radius: 0.25rem;
        padding: 5px 0;
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
        border: 2px solid #000000;
    }
    @media screen and (max-width: 1199px) {
        .schedule-table {
            display: block;
            width: 100%;
            overflow-x: auto;
        }
        .schedule-table table thead th {
            padding: 10px 20px;
        }
        .schedule-table table tbody td {
            padding: 10px;
        }
        .schedule-table table tbody td.active h4 {
            font-size: 14px;
        }
        .schedule-table table tbody td.active p {
            font-size: 12px;
        }
        .schedule-table table tbody td.day {
            font-size: 16px;
        }
        .schedule-table table tbody td .hover {
            padding: 10px 0;
        }
        .schedule-table table tbody td .hover span {
            font-size: 14px;
        }
    }
    @media screen and (max-width: 991px) {
        .schedule-table table thead th {
            font-size: 14px;
            padding: 10px;
        }
        .schedule-table table tbody td.day {
            font-size: 16px;
        }
        .schedule-table table tbody td.active h4 {
            font-size: 14px;
        }
    }
    @media screen and (max-width: 767px) {
        .schedule-table table thead th {
            padding: 5px;
        }
        .schedule-table table tbody td {
            padding: 5px;
        }
        .schedule-table table tbody td.active h4 {
            font-size: 12px;
        }
        .schedule-table table tbody td.active p {
            font-size: 10px;
        }
        .schedule-table table tbody td .hover {
            padding: 5px 0;
        }
        .schedule-table table tbody td.day {
            font-size: 14px;
        }
        .schedule-table table tbody td .hover span {
            font-size: 12px;
        }
    }
    @media screen and (max-width: 575px) {
        .schedule-table table tbody td.day {
            min-width: 110px; /* Further reduced minimum width */
        }
    }
    /* Ensure table rows do not break across pages */
    tr {
        page-break-inside: avoid;
    }
</style>
<title>Emploi Temps - {{ $nomFiliere }} Semestre {{ $semestre }}</title>
<div class="container">
   <div class="w-95 w-md-75 w-lg-60 w-xl-55 mx-auto mb-6 text-center">
    <img style="width: 10%;margin-left:45%" src="images/ENStet.png" alt="">
<div style="line-height: 10px">
<p style="text-align: center">Université Abdelmalek Essaâdi</p>
<p style="text-align: center">Ecole Normale Supérieure</p>
<p style="text-align: center ;font-weight:bold">{{ $nomFiliere }} (Semestre {{ $semestre }}) (Groupe {{ $groupe }})  2024/2025</p>

</div>



   </div>
   <div class="row">
       <div class="col-md-12">
           <div class="schedule-table">
            <table class="table bg-white">
                <thead>
                    <tr>
                        <th><sup> Groupe {{ $resultats->groupe }}</sup></th>
                        @for ($i = 0; $i < $countHoraire; $i++)
                        <th>{{ substr($Horaire[$i]->heure_debut, 0, 5) }}h - {{ substr($Horaire[$i]->heure_fin, 0, 5) }}h</th>
                    @endfor
                    </tr>
                </thead>
                <tbody>
                <tr>
                        <td class="day">Lundi </td>
                        @for ($l = 0; $l < $countHoraire; $l++)
                        @php
                        $count = 0;
                      @endphp
                    <td class="active">
                      @while ($count < $nombreSeances)
                            @if ($seances[$count]->jour == "Lundi")
                            <div style="line-height: 1px">
                                    @if (substr($seances[$count]->heure_debut,0,5) == substr($Horaire[$l]->heure_debut, 0, 5) && substr($seances[$count]->heure_fin,0,5) == substr($Horaire[$l]->heure_fin, 0, 5))
                                    <h4>{{ $seances[$count]->module->nom_module }} - {{$seances[$count]->type_seances}} </h4>
                                    <p>Prof . {{$seances[$count]->enseignant->nom_enseignant}} {{ $seances[$count]->enseignant->prenom_enseignant }}</p>
                                    <p>Salle {{ $seances[$count]->num_salle }} - {{ $seances[$count]->salle->type_salle }}</p>
                            </div>
                                    @endif
                            @endif
                            @php
                            $count = $count+1;
                          @endphp
                        @endwhile
                      </td>
                    @endfor
              </tr>
              <tr>
                <td class="day">Mardi </td>
                @for ($l = 0; $l < $countHoraire; $l++)
                @php
                $count = 0;
              @endphp
            <td class="active">
              @while ($count < $nombreSeances)
                    @if ($seances[$count]->jour == "Mardi")
                            @if (substr($seances[$count]->heure_debut,0,5) == substr($Horaire[$l]->heure_debut, 0, 5) && substr($seances[$count]->heure_fin,0,5) == substr($Horaire[$l]->heure_fin, 0, 5))
                            <div style="line-height: 1px">

                            <h4>{{ $seances[$count]->module->nom_module }} - {{$seances[$count]->type_seances}} </h4>
                            <p>Prof . {{$seances[$count]->enseignant->nom_enseignant}} {{ $seances[$count]->enseignant->prenom_enseignant }}</p>
                            <p>Salle {{ $seances[$count]->num_salle }} - {{ $seances[$count]->salle->type_salle }}</p>
                            </div>

                            @endif
                    @endif
                    @php
                    $count = $count+1;
                  @endphp
                @endwhile
              </td>
            @endfor
      </tr>
      <tr>
        <td class="day">Mercredi </td>
        @for ($l = 0; $l < $countHoraire; $l++)
        @php
        $count = 0;
      @endphp
    <td class="active">
      @while ($count < $nombreSeances)
            @if ($seances[$count]->jour == "Mercredi")
                    @if (substr($seances[$count]->heure_debut,0,5) == substr($Horaire[$l]->heure_debut, 0, 5) && substr($seances[$count]->heure_fin,0,5) == substr($Horaire[$l]->heure_fin, 0, 5))
                    <div style="line-height: 1px">
                    <h4>{{ $seances[$count]->module->nom_module }} - {{$seances[$count]->type_seances}} </h4>
                    <p>Prof . {{$seances[$count]->enseignant->nom_enseignant}} {{ $seances[$count]->enseignant->prenom_enseignant }}</p>
                    <p>Salle {{ $seances[$count]->num_salle }} - {{ $seances[$count]->salle->type_salle }}</p>
                    </div>
                    @endif
            @endif
            @php
            $count = $count+1;
          @endphp
        @endwhile
      </td>
    @endfor
  </tr>
  <tr>
    <td class="day">Jeudi </td>
    @for ($l = 0; $l < $countHoraire; $l++)
    @php
    $count = 0;
  @endphp
  <td class="active">
  @while ($count < $nombreSeances)
        @if ($seances[$count]->jour == "Jeudi")
                @if (substr($seances[$count]->heure_debut,0,5) == substr($Horaire[$l]->heure_debut, 0, 5) && substr($seances[$count]->heure_fin,0,5) == substr($Horaire[$l]->heure_fin, 0, 5))
                <div style="line-height: 1px">
                <h4>{{ $seances[$count]->module->nom_module }} - {{$seances[$count]->type_seances}} </h4>
                <p>Prof . {{$seances[$count]->enseignant->nom_enseignant}} {{ $seances[$count]->enseignant->prenom_enseignant }}</p>
                <p>Salle {{ $seances[$count]->num_salle }} - {{ $seances[$count]->salle->type_salle }}</p>
                </div>
                @endif
        @endif
        @php
        $count = $count+1;
      @endphp
    @endwhile
  </td>
  @endfor
  </tr>
  <tr>
    <td class="day">Vendredi </td>
    @for ($l = 0; $l < $countHoraire; $l++)
    @php
    $count = 0;
  @endphp
  <td class="active">
  @while ($count < $nombreSeances)
        @if ($seances[$count]->jour == "Vendredi")
                @if (substr($seances[$count]->heure_debut,0,5) == substr($Horaire[$l]->heure_debut, 0, 5) && substr($seances[$count]->heure_fin,0,5) == substr($Horaire[$l]->heure_fin, 0, 5))
                <div style="line-height: 1px">
                <h4>{{ $seances[$count]->module->nom_module }} - {{$seances[$count]->type_seances}} </h4>
                <p>Prof . {{$seances[$count]->enseignant->nom_enseignant}} {{ $seances[$count]->enseignant->prenom_enseignant }}</p>
                <p>Salle {{ $seances[$count]->num_salle }} - {{ $seances[$count]->salle->type_salle }}</p>
                </div>
                @endif
        @endif
        @php
        $count = $count+1;
      @endphp
    @endwhile
  </td>
  @endfor
  </tr>
  <tr>
    <td class="day">Samedi </td>
    @for ($l = 0; $l < $countHoraire; $l++)
    @php
    $count = 0;
  @endphp
  <td class="active">
  @while ($count < $nombreSeances)
        @if ($seances[$count]->jour == "Samedi")
                @if (substr($seances[$count]->heure_debut,0,5) == substr($Horaire[$l]->heure_debut, 0, 5) && substr($seances[$count]->heure_fin,0,5) == substr($Horaire[$l]->heure_fin, 0, 5))
                <div style="line-height: 1px">
                <h4>{{ $seances[$count]->module->nom_module }} - {{$seances[$count]->type_seances}} </h4>
                <p>Prof . {{$seances[$count]->enseignant->nom_enseignant}} {{ $seances[$count]->enseignant->prenom_enseignant }}</p>
                <p>Salle {{ $seances[$count]->num_salle }} - {{ $seances[$count]->salle->type_salle }}</p>
                </div>
                @endif
        @endif
        @php
        $count = $count+1;
      @endphp
    @endwhile
  </td>
  @endfor
  </tr>


                </tbody>
            </table>
               </table>
           </div>
       </div>
   </div>
</div>
