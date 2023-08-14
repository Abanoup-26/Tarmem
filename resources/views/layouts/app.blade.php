<!DOCTYPE html>
<html lang="{{str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Page Title -->
    <title>Tarmem System</title>

    <!-- Meta Data -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicon -->
    <link rel="shortcut icon" href=" assets/img/favicon.png">

    <!-- Web Fonts -->
    <link href="https://fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&display=swap" rel="stylesheet">

    <!-- ======= BEGIN GLOBAL MANDATORY STYLES ======= -->
    <link rel="stylesheet" href="{{asset('frontend/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/fonts/icofont/icofont.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/plugins/perfect-scrollbar/perfect-scrollbar.min.css')}}">
    <link rel="stylesheet" href="{{ asset('dashboard_offline/css/dropzone.min.css') }}">
    <!-- ======= END BEGIN GLOBAL MANDATORY STYLES ======= -->

    <!-- ======= MAIN STYLES ======= -->
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
    <!-- ======= END MAIN STYLES ======= -->


</head>

<body class="main_grediant_bg">

    @yield('content')

    <!-- Footer -->
    <footer class="footer style--two ">
        Tarmem system © 2023 created by <a href=""> Integerated visions</a>
    </footer>
    <!-- End Footer -->

    <!-- ======= BEGIN GLOBAL MANDATORY SCRIPTS ======= -->
    <script src=" {{asset('frontend/js/jquery.min.js')}}"></script>
    <script src=" {{asset('frontend/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src=" {{asset('frontend/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src=" {{asset('frontend/js/script.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
    <!-- ======= BEGIN GLOBAL MANDATORY SCRIPTS ======= -->
    @yield('scripts')
</body>

</html>