<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Club Player Details</title>
</head>
<body>
    <h1>Club Player Details:</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Name</th>
                <th>Age</th>
                <th>Goals</th>
                <th>Assists</th>
                <th>Minutes Played</th>
            </tr>
        </thead>
        <tbody>
            @foreach($players as $player)
                <tr>
                    <td>{{ $player->name }}</td>
                    <td>{{ $player->age }}</td>
                    <td>{{ $player->goals }}</td>
                    <td>{{ $player->assists }}</td>
                    <td>{{ $player->minsplayed }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
