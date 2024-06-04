<div class="sidebar">
    <ul>
        @if(session('user_type') == 'sous_admin')
            @foreach(session('roles') as $role)
                <li>{{ $role }}</li>
            @endforeach
        @else
            <!-- Autres éléments de la sidebar pour les super admin -->
        @endif
    </ul>
</div>
