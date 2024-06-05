
@if(session()->has('user_roles'))
    <div class="sidebar">
        <nav>
        <ul class="nav">
            @foreach(session('user_roles') as $role)
                @if ($role === 'gestion emplois temps')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('Emploitemps.index') }}">
                            <i class="mdi mdi-calendar menu-icon" style="font-size: 22px;"></i>
                            <span class="menu-title">{{ $role }}</span>
                        </a>
                    </li>
                @elseif($role === 'gestion filieres')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('fillieres.index') }}">
                        <i class="mdi mdi-plus-network  menu-icon" style="font-size: 22px;"></i>
                        <span class="menu-title">{{ $role }}</span>
                    </a>
                </li >
                @elseif($role === 'gestion modules')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('modules.index') }}">
                        <i class="mdi mdi-view-module menu-icon" style="font-size: 22px;"></i>
                        <span class="menu-title">{{ $role }}</span>
                    </a>
                </li>
                @elseif($role === 'gestion departements')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('departements.index') }}">
                        <i class="mdi mdi-home-modern menu-icon" style="font-size: 22px;"></i>
                        <span class="menu-title">{{ $role }}</span>
                    </a>
                </li>
                @elseif($role === 'gestion etudiants')
                <li class="nav-item">
                    <a class="nav-link" href="">
                        <i class="mdi mdi-school menu-icon" style="font-size: 22px;"></i>
                        <span class="menu-title">{{ $role }}</span>
                    </a>
                </li>
                @elseif($role === 'gestion enseignants')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('enseignant.index') }}">
                        <i class="mdi mdi-account-star menu-icon" style="font-size: 22px;"></i>
                        <span class="menu-title">{{ $role }}</span>
                    </a>
                </li>
                @elseif($role === 'demandes annulation')
                <li class="nav-item">
                    <a class="nav-link" href="">
                        <i class="mdi mdi-comment-text-outline menu-icon" style="font-size: 22px;"></i>
                        <span class="menu-title">{{ $role }}</span>
                    </a>
                </li>
                @elseif($role === 'gestion salles')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('salles.index') }}">
                        <i class="mdi mdi mdi-information-outline menu-icon" style="font-size: 22px;"></i>
                        <span class="menu-title">{{ $role }}</span>
                    </a>
                </li>
                @endif
            @endforeach
            
        </ul>
        
    </nav>
    </div>
@endif
<style>
    ul{
        list-style: none;
    }
</style>