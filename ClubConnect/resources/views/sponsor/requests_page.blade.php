<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sponsor Club</title>
  <link rel="shortcut icon" type="image/png" href="../admin/assets/images/logos/favicon.png">
  <link rel="stylesheet" href="../admin/assets/css/styles.min.css">

  <style>
    /* Internal CSS for the specified section */
    .match-box {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 20px;
      margin-top: 30px;
    }

    .match-box .sponsorship-request {
      
      border-radius: 10px;
      padding: 20px;
      text-align: center;
      box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
    }

    .match-box img {
      max-width: 150px;
      height: auto;
      border-radius: 10px;
    }

    .sponsorship-request p {
      font-weight: bold;
      margin: 10px 0;
    }

    .team-names {
      font-size: 18px;
      font-weight: bold;
    }

    /* Rest of your existing styles */
  </style>
</head>

<body>
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">

    @include('sponsor.sidebar')

    <div class="body-wrapper">
      @include('sponsor.header')
      <div class="container-fluid">
        <h4 style="text-align: center;">Sponsor Page</h4>
        <div class="match-box">
          @foreach ($matches as $match)
            <div class="sponsorship-request">
              <div class="team-names">
                {{ $match->match->team1->club_name}} Vs {{ $match->match->team2->club_name}}
              </div>
              <p>Status: <span>{{ $match->status }}</span></p>
              <p>Desired Value: <span>{{ $match->value }}</span></p>
              <div class="sponsorship-request">
                <img src="{{ asset('sponsor_image/' . $match->image_path) }}" alt="Sponsorship Image">
              </div>
            </div>
          @endforeach
        </div>
        <!-- Header Start -->
        @include('sponsor.javascript')
      </div>
    </div>
  </div>
</body>
</html>
