<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Club Connect Admin Panel</title>
  <link rel="shortcut icon" type="image/png" href="../admin/assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="../admin/assets/css/styles.min.css" />

  <style>
    .team-names {
    font-weight: bold;
    font-size: 1.2rem;
    }
    .status-text{
    font-weight: bold;
    font-size: 1rem;
    }
    .btn-primary {
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
    width: 100px;
    }

    .btn-primary:hover {
        background-color: #0069d9;
    }

    .sponsorship-request {
        margin-top: 20px;
        padding: 20px;
        border: 1px solid #e0e0e0;
        border-radius: 10px;
    }

    .container-fluid {
        margin-top: 50px;
        padding: 20px 50px;
    }

    
    .btn-container {
        display: flex;
        justify-content: center; 
        align-items: center; 
        margin-top: 9px; 
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
        @foreach ($requests as $request)
        
          <div class="sponsorship-request" style="text-align: center;">
            <img src="{{ asset('sponsor_image/' . $request->image_path ) }}" alt="Sponsorship Image" style="max-width: 200px;">
            <div class="team-names">
                {{ $request->match->team1->club_name}} Vs {{ $request->match->team2->club_name}}
              
            <p>Desired Value: {{ $request->value }}</p>
            </div>

            
            @if ($request->status === 'approved')
            <div class="status-text"> <p>Status: Approved</p> </div>
            @elseif ($request->status === 'rejected')
            <div class="status-text"> <p>Status: Rejected</p> </div>
            @else
             
              <form action="{{ route('admin.approve_sponsorship', ['id' => $request->id]) }}" method="post">
                @csrf
                <div class="btn-container">
                  <button type="submit" class="btn btn-primary">Approve</button>
                </div>
              </form>
              <form action="{{ route('admin.decline_sponsorship', ['id' => $request->id]) }}" method="post">
                @csrf
                <div class="btn-container">
                  <button type="submit" class="btn btn-primary">Decline</button>
                </div>
              </form>
            @endif
          </div>
        @endforeach
        <!--  END  -->

      </div>
    </div>
  </div>

  <!--  Header Start -->
  @include('admin.javascript')
  <!--  Header End -->
</body>
</html>
