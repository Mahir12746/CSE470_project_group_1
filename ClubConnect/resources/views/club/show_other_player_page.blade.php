<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Players</title>
  <link rel="shortcut icon" type="image/png" href="../admin/assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="../admin/assets/css/styles.min.css" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">

    <!-- Sidebar Start -->
    @include('club.sidebar')
    <!--  Sidebar End -->

    <!--  Main wrapper -->
    <div class="body-wrapper">

      <!--  Header Start -->
      @include('club.header')
      <!--  Header End -->
      <div class="container-fluid">

        <!-- Display Players -->
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Players</h5>
            <div class="table-responsive">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Height</th>
                    <th>Weight</th>
                    <th>Contact</th>
                    <th>Address</th>
                    <th>Position</th>
                    <th>Experience</th>
                    <th>Goals</th>
                    <th>Assists</th>
                    <th>Mins Played</th>
                    <th>Club</th>
                    <th>Action</th> <!-- Add an action column -->
                  </tr>
                </thead>
                <tbody>
                  @foreach ($players as $player)
                  <tr>
                    <td>{{ $player->name }}</td>
                    <td>{{ $player->age }}</td>
                    <td>{{ $player->height }}</td>
                    <td>{{ $player->weight }}</td>
                    <td>{{ $player->contact }}</td>
                    <td>{{ $player->address }}</td>
                    <td>{{ $player->position }}</td>
                    <td>{{ $player->expeirence }}</td>
                    <td>{{ $player->goals }}</td>
                    <td>{{ $player->assists }}</td>
                    <td>{{ $player->minsplayed }}</td>
                    <td>{{ $player->club }}</td>
                    <td><form action="{{ route('submitBid', $player->id)}}" method="POST">
                      @csrf
                      <input type="number" name="bid_number" placeholder="Place Bid" required>
                      <button type="submit">Submit Bid</button>
                  </form></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- End Display Players -->

      </div>
    </div>
  </div>
  <!--  Header Start -->
  @include('club.javascript')
  <!--  Header End -->
</body>
</html>
