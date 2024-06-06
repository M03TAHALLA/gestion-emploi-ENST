<!-- resources/views/pdf/etudiants.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Liste des étudiants - {{ $filiereName }} - Groupe {{ $groupIndex }}</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>{{ $filiereName }} - Groupe {{ $groupIndex }}</h1>
    <table>
        <thead>
            <tr>
                <th>CIN</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($etudiants as $etudiant)
                <tr>
                    <td>{{ $etudiant->cin_etudiant }}</td>
                    <td>{{ $etudiant->nom_etudiant }}</td>
                    <td>{{ $etudiant->prenom_etudiant }}</td>
                    <td>{{ $etudiant->email }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
