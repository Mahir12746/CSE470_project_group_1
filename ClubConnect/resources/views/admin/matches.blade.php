<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>All Matches</title>
  <link rel="shortcut icon" type="image/png" href="../admin/assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="../admin/assets/css/styles.min.css" />
  <style>
    /* Custom CSS Styles */
    .container {
      max-width: 600px;
      margin: 0 auto;
      padding: 20px;
    }

    .title {
      text-align: center;
      font-size: 28px;
      margin-bottom: 20px;
    }

    .match-box {
      border: 1px solid #ccc;
      border-radius: 4px;
      padding: 15px;
      margin-bottom: 30px;
    }

    .team-names {
      font-size: 18px;
      font-weight: bold;
    }

    .match-info {
      font-size: 16px;
    }

    .btn-primary {
      background-color: #007bff;
      color: #fff;
      border: none;
      padding: 10px 20px;
      border-radius: 4px;
      font-size: 16px;
      cursor: pointer;
    }

    .btn-primary:hover {
      background-color: #0069d9;
    }

    /* Custom Changes */
    .match-box a.btn-primary {
      background-color: #007bff;
      margin-top: 10px;
    }

    .match-box .match-info span {
      font-weight: bold;
      font-size: 20px;
    }

    .match-box .btn-primary {
      font-size: 14px;
      padding: 5px 10px;
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

      <!--  START  -->
      <div class="container">
        <h1 class="title">Matches</h1>
        @foreach ($matches as $match)
        <div class="match-box">
          <div class="team-names">
            {{ $match->team1_name }} VS {{ $match->team2_name }}
          </div>
          <div class="match-info">
            <span>Time:</span> {{ $match->match_datetime }}
            <br>
            <span>Stadium:</span> {{ $match->stadium }}
          </div>
          @if ($match->match_status === null)
            <a href="{{ route('admin.end_match', ['id' => $match->id]) }}" class="btn btn-primary">End Match</a>
          @else
            <!-- Show match scores here -->
            <div style="font-size: 24px; font-weight: bold; margin-top: 10px;">
              Score {{ $match->team1_score }}-{{ $match->team2_score }}
            </div>
            <div class="match-info">
            @if ($match->sponsor_picture)
            <span>Sponsored By: </span>
            <img src="{{ asset('sponsor_image/' . $match->sponsor_picture) }}" alt="Sponsorship Image" style="max-width: 200px;">
            @endif
            </div>
            <!-- Add option to update individual player scores -->
            <a href="{{url('/track_performance_page')}}" class="btn btn-primary">Update Player Scores</a>
          @endif
        </div>
        @endforeach
      </div>
      <!--  END  -->

      <!--  Footer Start -->
      @include('admin.javascript')
      <!--  Footer End -->
    </div>
  </div>

</body>
</html>