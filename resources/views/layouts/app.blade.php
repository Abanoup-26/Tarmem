<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

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
    <link rel="stylesheet" href="{{ asset('frontend/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/fonts/icofont/icofont.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/plugins/perfect-scrollbar/perfect-scrollbar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard_offline/css/dropzone.min.css') }}">
    <!-- ======= END BEGIN GLOBAL MANDATORY STYLES ======= -->
    @include('sweetalert::alert')
    <!-- ======= MAIN STYLES ======= -->
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <!-- ======= END MAIN STYLES ======= -->
    <link rel="stylesheet" href="{{ asset('dashboard_offline/css/select.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard_offline/css/select2.min.css') }}">

    <style>
        .select2 {
            max-width: 100%;
            width: 100% !important;
            background-color: #F0F0F0;
        }

        .select2-selection__rendered {
            padding-bottom: 5px !important;
            background-color: #F0F0F0;
        }
    </style>
</head>

<body class="main_grediant_bg">

    @yield('content')

    <!-- Footer -->
    <footer class="footer style--two ">
        <span>Created By &nbsp; <a href=""> &nbsp; Integerated visions © 2023</a> </span>
    </footer>
    <!-- End Footer -->

    <!-- ======= BEGIN GLOBAL MANDATORY SCRIPTS ======= -->
    <script src=" {{ asset('frontend/js/jquery.min.js') }}"></script>
    <script src=" {{ asset('frontend/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src=" {{ asset('frontend/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src=" {{ asset('frontend/js/script.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
    <!-- ======= BEGIN GLOBAL MANDATORY SCRIPTS ======= -->

    <script src="{{ asset('dashboard_offline/js/select2.full.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('.select-all').click(function() {
                let $select2 = $(this).parent().siblings('.select2')
                $select2.find('option').prop('selected', 'selected')
                $select2.trigger('change')
            })
            $('.deselect-all').click(function() {
                let $select2 = $(this).parent().siblings('.select2')
                $select2.find('option').prop('selected', '')
                $select2.trigger('change')
            })

            $('.select2').select2()
        });
    </script>
    @yield('scripts')
</body>

</html>
