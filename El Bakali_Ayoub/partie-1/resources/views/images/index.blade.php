<!DOCTYPE html>
<html>
<head>
    <title>Images Motivation</title>
    <style>
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 8px; border: 1px solid #ddd; }
        img { max-width: 150px; }
    </style>
</head>
<body>
    <h1>Images de Motivation</h1>
    
    <table>
        <thead>
            <tr>
                <th>Image</th>
                <th>Employé</th>
                <th>Vues Image</th>
                <th>Messages de Soutien</th>
                <th>Types de Motivation</th>
            </tr>
        </thead>
        <tbody>
            @foreach($images as $image)
            <tr>
                <td>
                    <img src="{{ asset('storage/' . $image->url) }}" alt="Image motivation">
                </td>
                <td>{{ $image->employe->name }}</td>
                <td>{{ $image->views }}</td>
                <td>
                    <ul>
                        @foreach($image->supportMotivations as $support)
                        <li>
                            {{ $support->content }}<br>
                            Vues: {{ $support->views }} | 
                            Réactions: {{ $support->reactions }}
                        </li>
                        @endforeach
                    </ul>
                </td>
                <td>
                    @foreach($image->supportMotivations as $support)
                        <strong>Message:</strong> {{ $support->content }}<br>
                        Types: 
                        @foreach($support->typeMotivations as $type)
                            {{ $type->name }}@if(!$loop->last), @endif
                        @endforeach
                        <hr>
                    @endforeach
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>