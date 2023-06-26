<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Track Performance</title>
  <link rel="shortcut icon" type="image/png" href="../admin/assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="../admin/assets/css/styles.min.css" />

  <style>
    .card-title {
      text-align: center;
      font-weight: bold;
    }
    .table-wrapper {
      overflow-x: auto;
    }

    .table {
      width: 100%;
      border-collapse: collapse;
      background-color: #fff;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    }

    .table thead th {
      padding: 12px 15px;
      background-color: #f8f9fa;
      border-bottom: 1px solid #e9ecef;
      text-align: center;
      font-weight: bold;
      color: #333;
    }

    .table tbody td {
      padding: 10px 15px;
      border-bottom: 1px solid #e9ecef;
      text-align: center;
    }

    .table tbody tr:last-child td {
      border-bottom: none;
    }

    .table tbody tr:nth-child(even) {
      background-color: #f8f9fa;
    }

    .table tbody tr:hover {
      background-color: #f2f2f2;
    }

    .btn-update {
      padding: 4px 8px;
      font-size: 14px;
    }

    /* Custom CSS for action column */
    .action-column {
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .action-column input {
      margin-bottom: 5px;
    }

    .action-column .action-buttons {
      margin-top: 5px;
    }
    .form-group.action-buttons {
    margin-top: 0.5px;
  }
  </style>
</head>

<body>
  <!-- Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">

    <!-- Sidebar Start -->
    @include('admin.sidebar')
    <!-- Sidebar End -->

    <!-- Main wrapper -->
    <div class="body-wrapper">

      <!-- Header Start -->
      @include('admin.header')
      <!-- Header End -->
      <div class="container-fluid">

        <!-- START -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Track Performance</h4>
                <div class="table-wrapper">
                  <table class="table table-striped table-bordered" id="performanceTable">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Height</th>
                        <th>Weight</th>
                        <th>Position</th>
                        <th>Goals</th>
                        <th>Assists</th>
                        <th>Minutes Played</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($players as $player)
                      <tr>
                        <td>{{ $player->name }}</td>
                        <td>{{ $player->age }}</td>
                        <td>{{ $player->height }}</td>
                        <td>{{ $player->weight }}</td>
                        <td>{{ $player->position }}</td>
                        <td>{{ $player->goals }}</td>
                        <td>{{ $player->assists }}</td>
                        <td>{{ $player->minsplayed }}</td>
                        <td class="action-column">
                          <form action="{{ route('update_performance', $player->id) }}" method="POST">
                            @csrf
                            <div class="form-group action-buttons">
                              <input type="number" name="goals" class="form-control" placeholder="Goals" required>
                              <input type="number" name="assists" class="form-control" placeholder="Assists" required>
                              <input type="number" name="minsplayed" class="form-control" placeholder="Minutes Played" required>
                              <button type="submit" class="btn btn-primary btn-update">Update</button>
                            </div>
                          </form>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- END -->
      </div>

      <!-- Footer Start -->
      @include('admin.javascript')
      <!-- Footer End -->
    </div>
    <!-- End Main wrapper -->
  </div>
  <!-- End Page wrapper  -->
</body>
</html>
