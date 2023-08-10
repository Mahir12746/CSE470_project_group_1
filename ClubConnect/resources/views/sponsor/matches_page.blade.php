<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sponsor Match</title>
  <link rel="shortcut icon" type="image/png" href="../admin/assets/images/logos/favicon.png">
  <link rel="stylesheet" href="../admin/assets/css/styles.min.css">
  <style>
    
    form {
      margin-top: 20px;
    }

    select, input[type="file"], input[type="text"] {
      margin-bottom: 10px;
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 4px;
      width: 100%;
    }

    button[type="submit"] {
      background-color: #007bff;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    h4 {
      font-size: 24px;
      margin-bottom: 20px;
    }
  </style>
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">

    <!-- Sidebar Start -->
    @include('sponsor.sidebar')
    <!--  Sidebar End -->

    <!--  Main wrapper -->
    <div class="body-wrapper">

      <!--  Header Start -->
      @include('sponsor.header')
      <!--  Header End -->
      <div class="container-fluid">

        <!-- START -->
        <h4>Match Sponsor Page</h4>

        <form action="{{ route('send_sponsorship_request', ['id' => 'MATCH_ID']) }}" method="post" enctype="multipart/form-data">
          @csrf
          <select name="match_id">
            @foreach ($matches as $match)
            <option value="{{ $match->id }}">{{ $match->team1_name }} vs {{ $match->team2_name }}</option>
            @endforeach
          </select>
          <input type="file" name="image">
          <input type="text" name="value" placeholder="Desired Value">
          <button type="submit">Submit Sponsorship</button>
        </form>
        <!-- END -->
      </div>
    </div>
  </div>

  <!--  Header Start -->
  @include('sponsor.javascript')
      <!--  Header End -->

</body>
</html>
