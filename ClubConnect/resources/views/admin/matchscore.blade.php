<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Update Score </title>
  <link rel="shortcut icon" type="image/png" href="../admin/assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="../admin/assets/css/styles.min.css" />

  <style>
    /* Custom CSS Styles */
    body {
      font-family: Arial, sans-serif;
      background-color: #f5f5f5;
      margin: 0;
      padding: 0;
    }

    .container-fluid {
      padding: 20px;
    }

    .title {
      font-size: 24px;
      margin-bottom: 20px;
    }

    .form-wrapper {
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      padding: 20px;
    }

    .team-names {
      font-size: 20px;
      font-weight: bold;
      color: #333;
      margin-bottom: 10px;
    }

    .vs-container {
      display: flex;
      font-size: 20px;
      color: #333;
      margin-bottom: 20px;
      padding-left: 30px;
    }

    .form-group {
      margin-bottom: 20px;
    }


    label {
      display: block;
      font-size: 16px;
      font-weight: bold;
      margin-bottom: 5px;
    }

    input[type="number"] {
      width: 100px;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      font-size: 16px;
    }

    button {
      background-color: #007bff;
      color: #fff;
      border: none;
      padding: 10px 20px;
      border-radius: 4px;
      font-size: 16px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    button:hover {
      background-color: #0069d9;
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

        <div class="container-fluid">
    <h1 class="title">Update Score Now</h1>

        <div class="form-wrapper">
          <form action="{{ route('admin.update_scores', ['id' => $match->id]) }}" method="post">
            @csrf
            <div class="form-group">
              <label for="team1_score">{{ $match->team1_name }}</label>
              <input type="number" id="team1_score" name="team1_score" value="{{ $match->team1_score }}" required>
            </div>
            <div class="vs-container"> VS </div>
            <div class="form-group">
              <label for="team2_score">{{ $match->team2_name }}</label>
              <input type="number" id="team2_score" name="team2_score" value="{{ $match->team2_score }}" required>
            </div>
            <button type="submit">Update Scores</button>
          </form>
        </div>
      </div>

        
        
        <!--  END  -->
        

  
  <!--  Header Start -->
      @include('admin.javascript')
      <!--  Header End -->
</body>

</html>