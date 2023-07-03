<!doctype html>
<html lang="en">
<head>
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


  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Club Connect Admin Panel</title>
  <link rel="shortcut icon" type="image/png" href="../admin/assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="../admin/assets/css/styles.min.css" />
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

        @if(session()->has('message'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                {{ session()->get('message') }}
            </div>
            @endif
        
        @if(session()->has('error'))
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            {{ session()->get('error') }}
        </div>
        @endif


      <div class="container">


  <h1 class="title">Generate Rating</h1>
  
  <form action="{{ url('/find_player_ranking') }}" method="post" enctype="multipart/form-data" class="form">
    @csrf
    
    <div class="form-group">
      <label for="name">Name</label>
      <input class="form-control" type="text" name="name" id="name" placeholder="Enter player's Name" required>
    </div>

    <div class="form-group">
      <label for="name">Age</label>
      <input class="form-control" type="number" name="age" id="age" placeholder="Enter player's age" required>
    </div>
    
    <div class="form-group">
      <label for="age">Height</label>
      <input class="form-control" type="number" name="height" id="height" placeholder="Enter player's height" required>
    </div>
    
    <div class="form-group">
      <label for="height">Weight</label>
      <input class="form-control" type="number" name="weight" id="weight" placeholder="Enter player's weight in kg" required>
    </div>
    
    <div class="form-group">
      <label for="weight">Playing Position</label>
      <input class="form-control" type="text" name="playing_position" id="playing_position" placeholder="Enter player's playing position" required>
    </div>
    
    <div class="form-group">
      <label for="contact">Experience</label>
      <input class="form-control" type="number" name="experience" id="experience" placeholder="Enter player's experience" required>
    </div>
    
    <div class="form-group">
      <label for="address">Goals</label>
      <input class="form-control" type="number" name="goals" id="goals" placeholder="Enter player's number of goals" required>
    </div>
    
    <div class="form-group">
      <label for="position">Assist</label>
      <input class="form-control" type="number" name="assist" id="assist" placeholder="Enter player's number of assist" required>
    </div>
    
    <div class="form-group">
      <label for="experience">Minutes Played</label>
      <input class="form-control" type="number" name="minutes_played" id="minutes_played" placeholder="Enter player's number of minutes played" required>
    </div>
      
      <div class="form-group">
        <button type="submit" class="btn btn-primary">Find Rating</button>
      </div>

  </form>
</div>
        
        <!--  END  -->
        

  
  <!--  Header Start -->
      @include('admin.javascript')



      <!-- Your HTML code -->

      <!-- Include the Bootstrap JavaScript file (jQuery is required) -->
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


      <!--  Header End -->
</body>

</html>