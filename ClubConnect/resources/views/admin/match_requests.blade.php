<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Match Requests</title>
  <link rel="shortcut icon" type="image/png" href="../admin/assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="../admin/assets/css/styles.min.css" />
  <style>
    
    .container {
      max-width: 1000px;
      margin: 0 auto;
      padding: 20px;
    }
    
    .title {
      text-align: center;
      font-size: 28px;
      margin-bottom: 20px;
    }
    
    
    label {
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
    }
    
   
    .alert-dismissible {
      position: relative;
      display: flex;
      align-items: center;
      justify-content: flex-end;
    }

    .alert-dismissible .close {
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

    .alert-dismissible .close:hover {
      opacity: 1;
    }

    .alert {
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
    }

    .alert .close {
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
      <div class="container-fluid">


        <!--  START  -->

        <!-- Your existing HTML code -->

<div class="container">
  <h1 class="title">Match Requests</h1>
  @if(session('message'))
    <div class="alert alert-success alert-dismissible">
      {{ session('message') }}
      <button class="close" type="button" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  @endif

  <table class="table">
    <thead>
      <tr>
        <th>Club</th>
        <th>Team 2</th>
        <th>Match Date and Time</th>
        <th>Stadium</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($matchRequests as $request)
        <tr>
          <td>{{ $request->club->club_name }}</td>
          <td>{{ $request->team2->club_name }}</td>
          <td>{{ $request->match_datetime }}</td>
          <td>{{ $request->stadium }}</td>
          <td>{{ ucfirst($request->status) }}</td>
          <td>
            @if ($request->status === 'pending')
              <form action="{{ route('admin.approve_match_request', $request->id) }}" method="POST" class="d-inline-block">
                @csrf
                <button type="submit" class="btn btn-success">Approve</button>
              </form>
              <form action="{{ route('admin.decline_match_request', $request->id) }}" method="POST" class="d-inline-block">
                @csrf
                <button type="submit" class="btn btn-danger">Decline</button>
              </form>
            @endif
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script>
      // Close 
      $(document).ready(function() {
        $(".alert-dismissible .close").click(function() {
          $(this).closest(".alert-dismissible").fadeOut();
        });
      });
    </script>

<!-- Your existing HTML code -->

        
        <!--  END  -->
        

  
  <!--  Header Start -->
      @include('admin.javascript')
      <!--  Header End -->
</body>

</html>