<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Club Connect Admin Panel</title>
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
      margin-bottom: 15px;
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

    .alert {
      position: relative;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
    }

    .alert .close {
      position: absolute;
      top: 50%;
      right: 0;
      transform: translateY(-50%);
      font-size: 1rem;
      line-height: 1;
      padding: 0.25rem 0.5rem;
      color: #000;
      opacity: 0.5;
      border: none;
      background: transparent;
      outline: none;
      cursor: pointer;
    }

    .alert .close:hover {
      opacity: 1;
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
            {{ $match->team1->club_name }} VS {{ $match->team2->club_name }}
          </div>
          <div class="match-info">
            Time: {{ $match->match_datetime }}
            <br>
            Stadium: {{ $match->stadium }}
          </div>
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
