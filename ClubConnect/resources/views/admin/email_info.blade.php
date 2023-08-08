<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Email Info</title>
  <link rel="shortcut icon" type="image/png" href="../admin/assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="../admin/assets/css/styles.min.css" />
  <style type="text/css">
        label
        {
            display: inline-block;
            width: 100px;
            font-size: 17px;
            font-weight: bold;
        }
  </style>
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
            <h1 style="text-align:center; font-size: 25px;">Send Email to {{$fans->email}}</h1>
            <form action="{{url('send_fan_email',$fans->id)}}" method="POST">
                @csrf
                <div style="padding-left: 35%; padding-top: 30px;">
                    <label style="position: relative; top: -17px;">Subject</label>
                    <textarea name="greeting" style="width: 400px;"></textarea>
                </div>

                <div style="padding-left: 35%; padding-top: 30px;">
                    <label style="position: relative; top: -185px;">Email Body</label>
                    <textarea name="body" style="width: 400px; height: 200px;"></textarea>
                </div>
                        
                <div style="padding-left: 35%; padding-top: 30px;">
                    <input type="submit" value="Send Email" class="btn btn-primary">
                </div>

            </form>
        </div>
      </div>
      </div>
        
        <!--  END  -->
        

  
  <!--  Header Start -->
      @include('admin.javascript')
      <!--  Header End -->
</body>

</html>