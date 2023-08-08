<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edit Club</title>
  <link rel="shortcut icon" type="image/png" href="../admin/assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="../admin/assets/css/styles.min.css" />
  <style>
    .container {
      max-width: 600px;
      margin: 0 auto;
      padding: 20px;
    }
    
    .form-group {
      margin-bottom: 20px;
    }
    
    label {
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
    }
    
    .form-control {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
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
  </style>
</head>

<body>
  <!-- Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">

    <!-- Sidebar Start -->
    @include('club.sidebar')
    <!-- Sidebar End -->

    <!-- Main wrapper -->
    <div class="body-wrapper">

      <!-- Header Start -->
      @include('club.header')
      <!-- Header End -->
      <div class="container-fluid">


        <!-- START -->
        <div class="container">
            <h1>Edit Club</h1>
            <form action="{{ route('update_club', $club->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="club_name">Club Name:</label>
                    <input type="text" name="club_name" id="club_name" class="form-control" value="{{ $club->club_name }}" required>
                </div>
                <div class="form-group">
                    <label for="club_location">Club Location:</label>
                    <input type="text" name="club_location" id="club_location" class="form-control" value="{{ $club->club_location }}" required>
                </div>
                <div class="form-group">
                    <label for="club_logo">Club Logo:</label>
                    <input type="file" name="club_logo" id="club_logo">
                </div>
                <button type="submit" class="btn btn-primary">Update Club</button>
            </form>
        </div>
        <!-- END -->
        

  
  <!-- Header Start -->
      @include('club.javascript')
      <!-- Header End -->
</body>

</html>
