<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>My Club </title>
  <link rel="shortcut icon" type="image/png" href="../admin/assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="../admin/assets/css/styles.min.css" />
  <style>
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
      <div class="container">
                <!-- START -->
                <h1 class="title">Club Information</h1>
                @if(session()->has('message'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {{ session()->get('message') }}
                </div>
                @endif

                @if($club)
                <!-- Display the club information and edit option -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $club->club_name }}</h5>
                        <p class="card-text"><strong>Location:</strong> {{ $club->club_location }}</p>
                        @if($club->club_logo)
                        <img src="{{ asset('club_images/' . $club->club_logo) }}" alt="Club Logo" style="max-width: 200px;">
                        @endif
                        <a href="{{ url('/edit_club_page') }}" class="btn btn-primary">Edit Club</a>
                    </div>
                </div>
                @else
                <!-- Display the create club option -->
                <p>No club created yet.</p>
                <a href="{{ url('/create_club_page') }}" class="btn btn-primary">Create Club</a>
                @endif

                

                <!-- END -->
            </div>
        </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script>
      // Close the alert message when the close button is clicked
      $(document).ready(function() {
        $(".alert-dismissible .close").click(function() {
          $(this).closest(".alert-dismissible").fadeOut();
        });
      });
    </script>

        <!-- Footer and scripts -->
        @include('club.javascript')
</body>

</html>
