<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Create Match</title>
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

      <div class="container">
        <h1 class="title">Create Match</h1>
        @if(session('message'))
          <div class="alert alert-success alert-dismissible">
            {{ session('message') }}
            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        @endif
        <form action="{{ route('admin.store_match') }}" method="POST">
          @csrf
          <div class="form-group">
            <label for="team1">Team 1</label>
            <select name="team1" id="team1" class="form-control" required>
              <option value="">Select Team 1</option>
              @foreach ($clubs as $club)
                <option value="{{ $club->id }}">{{ $club->club_name }}</option>
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <label for="team2">Team 2</label>
            <select name="team2" id="team2" class="form-control" required>
              <option value="">Select Team 2</option>
              @foreach ($clubs as $club)
                <option value="{{ $club->id }}">{{ $club->club_name }}</option>
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <label for="match_datetime">Match Date and Time</label>
            <input type="datetime-local" name="match_datetime" id="match_datetime" class="form-control" required>
          </div>

          <div class="form-group">
            <label for="stadium">Stadium</label>
            <input type="text" name="stadium" id="stadium" class="form-control" required>
          </div>

          <button type="submit" class="btn btn-primary">Create Match</button>
        </form>
      </div>

      <!-- END -->
    </div>

    <!--  Header Start -->
    @include('admin.javascript')
    <!--  Header End -->
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

</body>
</html>
