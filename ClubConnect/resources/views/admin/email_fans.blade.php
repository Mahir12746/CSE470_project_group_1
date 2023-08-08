<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Email Fans</title>
  <link rel="shortcut icon" type="image/png" href="../admin/assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="../admin/assets/css/styles.min.css" />
</head>

<body>
@include('admin.header')
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">

    <!-- Sidebar Start -->
    @include('admin.sidebar')
    <!--  Sidebar End -->

    

    <!--  Main wrapper -->
    <div class="body-wrapper">

        <!--  Header Start -->
        
        <!--  Header End -->
        <div class="container-fluid">
      
          <!-- Display Players -->
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Fans</h5>
              <div class="table-responsive">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Address</th>
                      <th>Send Email</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($fans as $user)
                    <tr>
                      <td>{{ $user->name }}</td>
                      <td>{{ $user->email }}</td>
                      <td>{{ $user->phone }}</td>
                      <td>{{ $user->address }}</td>

                      <td><a href="{{url('send_email', $user->id)}}" class='btn btn-info'>Email</a></td>
                    </tr>
      
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- End Display Players -->
      
        </div>
      </div>
      </div>
        
        <!--  END  -->
        

  
  <!--  Header Start -->
      @include('admin.javascript')
      <!--  Header End -->
</body>

</html>