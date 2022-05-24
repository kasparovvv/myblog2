<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

  <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/fontawesome-free/css/all.min.css">

  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

  <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

  <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

  <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/jqvmap/jqvmap.min.css">

  <link rel="stylesheet" href="https://adminlte.io/themes/v3/dist/css/adminlte.min.css?v=3.2.0">

  <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

  <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/daterangepicker/daterangepicker.css">

  <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/summernote/summernote-bs4.min.css">


  @yield('css')




<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

  @include('layouts/header')  

  @include('layouts/sidebar')  

    

    <div class="content-wrapper">

      <!-- <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Dashboard</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard v1</li>
              </ol>
            </div>
          </div>
        </div>
      </div> -->

    
      <section class="content">
        <div class="container-fluid">

          @yield('content')

        </div>
      </section>

      

    </div>

    <!-- <footer class="main-footer">
      <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.2.0
      </div>
    </footer> -->

    <aside class="control-sidebar control-sidebar-dark">

    </aside>

  </div>


  <script src="https://adminlte.io/themes/v3/plugins/jquery/jquery.min.js"></script>
  
  <script src="https://adminlte.io/themes/v3/plugins/jquery-ui/jquery-ui.min.js"></script>

  <script src="https://adminlte.io/themes/v3/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script src="https://adminlte.io/themes/v3/plugins/jquery-knob/jquery.knob.min.js"></script>

  <!-- <script src="https://adminlte.io/themes/v3/plugins/moment/moment.min.js"></script>
  <script src="https://adminlte.io/themes/v3/plugins/daterangepicker/daterangepicker.js"></script> -->



  <script src="https://adminlte.io/themes/v3/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

  <script src="https://adminlte.io/themes/v3/dist/js/adminlte.js?v=3.2.0"></script>
  






 
 

  @yield('scripts')

</body>

</html>