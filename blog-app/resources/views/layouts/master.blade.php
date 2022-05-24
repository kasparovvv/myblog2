
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Blog</title>
    <!-- <link rel="icon" href="https://technext.github.io/lifeleck/img/favicon.png"> -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://technext.github.io/lifeleck/css/bootstrap.min.css">
    <!-- animate CSS -->
    <link rel="stylesheet" href="https://technext.github.io/lifeleck/css/animate.css">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="https://technext.github.io/lifeleck/css/owl.carousel.min.css">
    <!-- themify CSS -->
    <link rel="stylesheet" href="https://technext.github.io/lifeleck/css/themify-icons.css">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="https://technext.github.io/lifeleck/css/liner_icon.css">
    <link rel="stylesheet" href="https://technext.github.io/lifeleck/css/search.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="https://technext.github.io/lifeleck/css/style.css">
</head>

<body>
    <!--::header part start::-->
    @include('layouts/header')  
    <!-- Header part end-->


    @yield('content')

    
   
   

     <!-- footer part start-->
     @include('layouts/footer')  
    <!-- footer part end-->
    <!-- jquery -->
    <script src="https://technext.github.io/lifeleck/js/jquery-1.12.1.min.js"></script>
    <!-- popper js -->
    <script src="https://technext.github.io/lifeleck/js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="https://technext.github.io/lifeleck/js/bootstrap.min.js"></script>
    <!-- custom js -->
    <script src="https://technext.github.io/lifeleck/js/custom.js"></script>
</body>

</html>