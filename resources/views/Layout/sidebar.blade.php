<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('Emploitemps.create') }}">
                <i class="mdi mdi-calendar-plus menu-icon" style="font-size: 22px;"></i>
              <span class="menu-title">Saisie Emploi Temps</span>
            </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('Emploitemps.index') }}">
          <i class="mdi mdi-calendar menu-icon"  style="font-size: 22px;"></i>
          <span class="menu-title">Gestion Emploi Temps</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="">
            <i class="mdi mdi-calendar-multiple menu-icon" style="font-size: 22px;"></i>
          <span class="menu-title">Gestion TP's</span>
        </a>
    </li>
      <li class="nav-item">
        <a class="nav-link"  href="{{ route('dashboard.ressources') }}" >
            <i class="mdi mdi-google-circles-extended menu-icon" style="font-size: 22px;"></i>
          <span class="menu-title">Gestion Ressources</span>
        </a>
      </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('departements.index') }}">
            <i class="mdi mdi-home-modern menu-icon" style="font-size: 22px;"></i>
          <span class="menu-title">Gestion Departement</span>
        </a>
  </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('fillieres.index') }}">
            <i class="mdi mdi-plus-network menu-icon" style="font-size: 22px;"></i>
          <span class="menu-title">Gestion Fillieres</span>
        </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('modules.index') }}">
        <i class="mdi mdi-view-module menu-icon" style="font-size: 22px;"></i>
      <span class="menu-title">Gestion Modules</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{ route('salles.index') }}">
        <i class="mdi mdi-home-variant menu-icon" style="font-size: 22px;"></i>
      <span class="menu-title">Gestion Salles</span>
    </a>
</li>
  <li class="nav-item">
    <a class="nav-link" href="">
        <i class="mdi mdi-school menu-icon" style="font-size: 22px;"></i>
      <span class="menu-title">Gestion Etudiants</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="">
        <i class="mdi mdi-account-star menu-icon" style="font-size: 22px;"></i>
      <span class="menu-title">Gestion Enseignants</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="">
        <i class="mdi mdi-comment-text-outline menu-icon" style="font-size: 22px;"></i>
      <span class="menu-title">Demandes Annulation</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link"  href="{{ route('sous_admin') }}" >
        <i class="mdi mdi-account-network menu-icon" style="font-size: 22px;"></i>
      <span class="menu-title">Gestion Sous Admin's </span>
    </a>
  </li>
<li class="nav-item">
    <a class="nav-link" href="">
        <i class="mdi mdi-account-key menu-icon" style="font-size: 22px;"></i>
      <span class="menu-title">Gestion Utilisateurs</span>
    </a>
</li>
    </ul>
  </nav>
