<div class="container">
    <div class="card">
        <div class="card-header">{{ $sousAdmin->nom }} {{ $sousAdmin->prenom }}</div>

        <div class="card-body">
            <p><strong>CIN:</strong> {{ $sousAdmin->cin }}</p>
            <p><strong>Matricule:</strong> {{ $sousAdmin->matricule }}</p>
            <p><strong>Email:</strong> {{ $sousAdmin->email }}</p>
            <!-- Display other Sous Admin details as needed -->

            <h4>Assigned Roles:</h4>
            <ul>
                @foreach($sousAdmin->roles as $role)
                    <li>{{ $role->nom_role }}</li>
                @endforeach
            </ul>

            <h4>Assign Roles:</h4>
            <form action="{{ route('sous_admins.assignRoles', $sousAdmin->id) }}" method="POST">
                @csrf
                @foreach($roles as $role)
                    <div class="form-check">
                        <input type="checkbox" name="roles[]" value="{{ $role->id }}" id="role_{{ $role->id }}">
                        <label for="role_{{ $role->id }}">{{ $role->nom_role }}</label>
                    </div>
                @endforeach
                <button type="submit" class="btn btn-primary">Assign Roles</button>
            </form>
        </div>
    </div>
</div>