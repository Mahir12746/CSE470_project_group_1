
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Report Generate</title>
  <link rel="shortcut icon" type="image/png" href="../admin/assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="../admin/assets/css/styles.min.css" />
  <style>
    /* Internal CSS */
    
    .container-fluid {
      margin-top: 90px;
      text-align: center;
    }
    
    .btn-wrapper {
      margin-top: 90px;
    }
    
    .btn {
      padding:20px;
      font-size: 16px;
      background-color: #007bff;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }
    
    .btn:hover {
      background-color: #0056b3;
    }
  </style>
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


        <!--  START  -->
        <div class="btn-wrapper">
        @php
            $userId = app('App\Http\Controllers\ClubController')->getCurrentUserId();
        @endphp
        <a href="{{ url('print_pdf', $userId) }}" class="btn btn-secondary">Print PDF</a>
        </div>
        
        
        <!--  END  -->
        

  
  <!--  Header Start -->
      @include('club.javascript')
      <!--  Header End -->
</body>

</html>
