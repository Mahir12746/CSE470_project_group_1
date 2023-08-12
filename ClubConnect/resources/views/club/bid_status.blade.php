<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bid Status</title>
</head>
<body>
    <h1>Bid Status</h1>
    @foreach ($bids as $bid)
        <div>
            <p>Bid ID: {{ $bid->id }}</p>
            <p>Player ID: {{ $bid->player_id }}</p>
            <p>Status: {{ $bid->is_accepted ? 'Accepted' : 'Pending' }}</p>
        </div>
    @endforeach
</body>
</html>
