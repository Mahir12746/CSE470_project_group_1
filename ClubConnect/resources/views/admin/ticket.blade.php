<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ticket System</title>
  <link rel="shortcut icon" type="image/png" href="../admin/assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="../admin/assets/css/styles.min.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    
    .matches-container {
      margin-top: 20px;
    }
    .matches-container .nav-link {
      cursor: pointer;
    }

    .matches-container .tab-pane {
      padding: 20px;
    }
    .matches-container h3 {
      margin-bottom: 10px;
    }
    .matches-container p {
      margin-bottom: 5px;
    }
    .matches-container form {
      margin-bottom: 15px;
    }
    .matches-container button {
      background-color: #007bff;
      color: #fff;
      border: none;
      padding: 5px 10px;
      cursor: pointer;
    }
    .matches-container button:hover {
      background-color: #0056b3;
    }
    .matches-container ul {
      list-style: none;
      margin: 0;
      padding: 0;
    }
    .matches-container ul li {
      display: inline-block;
      margin-right: 10px;
    }
    /* Additional styling for available seats */
    .available-seats {
      display: flex;
      flex-wrap: wrap;
    }
    .seat-box {
      width: 30px;
      height: 30px;
      border: 1px solid #ccc;
      margin: 5px;
      display: flex;
      justify-content: center;
      align-items: center;
      cursor: pointer;
    }
  </style>
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">

    <!-- Sidebar Start -->
    @include('admin.sidebar')
    <!--  Sidebar End -->

    <!--  Main wrapper -->
    <div class="body-wrapper">

      <!--  Header Start -->
      @include('admin.header')
      <!--  Header End -->
      <div class="container-fluid">

        <!-- START -->
        <h2>Ticket System</h2>

        <div class="matches-container">
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            @foreach($approvedMatches as $match)
            <li class="nav-item">
              <a class="nav-link" id="match-tab-{{ $match->id }}" data-toggle="tab" href="#match-{{ $match->id }}"
                role="tab" aria-controls="match-{{ $match->id }}" aria-selected="false">
                Match: {{ $match->id }}
              </a>
            </li>
            @endforeach
          </ul>

          <div class="tab-content" id="myTabContent">
            @foreach($approvedMatches as $match)
            <div class="tab-pane fade" id="match-{{ $match->id }}" role="tabpanel"
              aria-labelledby="match-tab-{{ $match->id }}">
              <h3>Match Details:</h3>
              <p>Team 1: {{ $match->team1->club_name }}</p>
              <p>Team 2: {{ $match->team2->club_name }}</p>
              <p>Stadium: {{ $match->stadium }}</p>
              <p>Match Date and Time: {{ $match->match_datetime }}</p>

              <form action="{{ route('matches.tickets.create', ['match' => $match->id]) }}" method="post">
                @csrf
                <div class="form-group">
                  <label for="seats">Number of Seats:</label>
                  <input type="number" name="seats" id="seats" class="form-control" min="1" required>
                </div>
                <button type="submit" class="btn btn-primary">Create Tickets</button>
              </form>
              <h3>Available Seats:</h3>
              @if($match->tickets->isEmpty())
              <p>No tickets available for this match.</p>
              @else
              <div class="available-seats">
                @foreach($match->tickets as $ticket)
                <div class="seat-box">{{ $ticket->seat_number }}</div>
                @endforeach
              </div>
              @endif
            </div>
            @endforeach
          </div>
        </div>

        <!-- END -->

        <!--  Header Start -->
        @include('admin.javascript')
        <!--  Header End -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      </div>
</body>
</html>
