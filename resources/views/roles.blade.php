<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roles</title>
</head>
<body>
    <div class="sidebar">
        <h3>Roles</h3>
        <ul>
            @foreach($roles as $role)
                <li>{{ $role->nom_role }}</li>
            @endforeach
        </ul>
    </div>
</body>
</html>
