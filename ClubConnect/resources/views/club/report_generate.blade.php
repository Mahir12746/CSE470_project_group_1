<!DOCTYPE html>
<html>
<head>
    <title>Centered Button Example</title>
    <style>
        /* Center the button horizontally and vertically */
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        /* Optional: Add some space around the button */
        .btn-wrapper {
            padding: 20px;
        }
    </style>
</head>
<body>
    <!-- Wrapper div to center the button -->
    <div class="btn-wrapper">
        @php
            $userId = app('App\Http\Controllers\ClubController')->getCurrentUserId();
        @endphp
        <a href="{{ url('print_pdf', $userId) }}" class="btn btn-secondary">Print PDF</a>
    </div>
</body>
</html>
