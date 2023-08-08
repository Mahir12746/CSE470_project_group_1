<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ranking</title>
  <link rel="shortcut icon" type="image/png" href="../admin/assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="../admin/assets/css/styles.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

  <style>
    /* Internal CSS for card styling */
    .card {
      border: none;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease;
    }

    .card:hover {
      transform: translateY(-5px);
    }

    .card-img-top {
      max-height: 200px;
      object-fit: cover;
    }

    .card-title {
      margin-bottom: 0.5rem;
      font-size: 1.25rem;
    }

    .card-title i {
      margin-right: 5px; /* Add space between the star and text */
    }

    .rank-text {
      font-weight: bold;
      font-size: 1.2rem;
      margin-bottom: 0.5rem;
      display: block;
    }

    .card-text {
      font-size: 0.9rem;
    }

    /* Flex layout for 3 cards in a row */
    .row {
      display: flex;
      flex-wrap: wrap;
      margin: 0 -15px;
    }

    .col-lg-4 {
      flex: 0 0 calc(33.3333% - 30px);
      max-width: calc(33.3333% - 30px);
      padding: 0 15px;
      margin-bottom: 30px;
    }
  </style>
</head>

<body>
  <!-- Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">

    <!-- Sidebar Start -->
    @include('admin.sidebar')
    <!-- Sidebar End -->

    <!-- Main wrapper -->
    <div class="body-wrapper">

      <!-- Header Start -->
      @include('admin.header')
      <!-- Header End -->

      <div class="container-fluid">
        <!-- START -->
        <div class="row">
          @foreach($players as $player)
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
              <div class="card">
                <img src="/player_images/{{ $player->pimage }}" class="card-img-top" alt="{{ $player->name }} Image">
                <div class="card-body">
                  <h5 class="card-title">
                    <strong class="rank-text"><i class="fas fa-star text-warning"></i> Rank {{ $player->rank }}</strong>
                    <span class="player-name">{{ $player->name }}</span>
                  </h5>
                  <p class="card-text"><strong>Club:</strong> {{ $player->club }}</p>
                  <p class="card-text"><strong>Age:</strong> {{ $player->age }}</p>
                  <p class="card-text"><strong>Position:</strong> {{ $player->position }}</p>
                  <p class="card-text"><strong>Goals:</strong> {{ $player->goals }}</p>
                  <p class="card-text"><strong>Assists:</strong> {{ $player->assists }}</p>
                  <p class="card-text"><strong>Minutes Played:</strong> {{ $player->minsplayed }}</p>
                </div>
              </div>
            </div>
          @endforeach
        </div>
        <!-- END -->
      </div>

      <!-- Footer Start -->
      @include('admin.javascript')
      <!-- Footer End -->
    </div>
  </div>
</body>
</html>
