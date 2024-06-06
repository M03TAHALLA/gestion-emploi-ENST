<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exporter les listes d'étudiants</title>
</head>
<body>
    <h1>Exporter les listes d'étudiants</h1>
    
    <form action="{{ url('/exporter-listes-etudiants') }}" method="GET">
        @csrf
        <button type="submit">Exporter</button>
    </form>

    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif
</body>
</html>
