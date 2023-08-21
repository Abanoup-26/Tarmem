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
    {{-- <link rel="shortcut icon" href="{{ asset('frontend/img/favicon.png') }}"> --}}

    <!-- Web Fonts -->
    <link href="https://fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&display=swap" rel="stylesheet">

    <!-- ======= BEGIN GLOBAL MANDATORY STYLES ======= -->
    <script src="{{ asset('dashboard_offline/js/jquery.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('frontend/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/fonts/icofont/icofont.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/plugins/perfect-scrollbar/perfect-scrollbar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard_offline/css/dropzone.min.css') }}">
    <!-- ======= END BEGIN GLOBAL MANDATORY STYLES ======= -->


    <!-- ======= MAIN STYLES ======= -->
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <!-- ======= END MAIN STYLES ======= -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
    @yield('styles')
</head>

<body>

    <!-- Offcanval Overlay -->
    <div class="offcanvas-overlay"></div>
    <!-- Offcanval Overlay -->

    <div class="wrapper">
        <!-- Header -->
        <header class="header white-bg fixed-top d-flex align-content-center flex-wrap">
            <!-- Logo -->
            <div class="logo">
                <a href="#" class="default-logo"><img src="{{ asset('frontend/img/logo.png') }}"
                        alt=""></a>
                <a href="#" class="mobile-logo"><img src="{{ asset('frontend/img/logo.png') }}"
                        alt=""></a>
            </div>
            <!-- End Logo -->

            <!-- Main Header -->
            <div class="main-header">
                <div class="container-fluid">
                    <div class="row justify-content-between">
                        <div class="col-3 col-lg-1 col-xl-4">
                            <!-- Header Left -->
                            <div class="main-header-left h-100 d-flex align-items-center">
                                @auth

                                    <!-- Main Header User -->
                                    <div class="main-header-user">
                                        <a href="#" class="d-flex align-items-center" data-toggle="dropdown">
                                            <div class="menu-icon">
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="user-profile d-xl-flex align-items-center d-none">
                                                <!-- User Avatar -->
                                                <div class="user-avatar">
                                                    <img src="{{ asset('frontend/img/img-placeholder.png') }}"
                                                        alt="">
                                                </div>
                                                <!-- End User Avatar -->

                                                <!-- User Info -->
                                                <div class="user-info">
                                                    <h4 class="user-name">{{ auth()->user()->name }}</h4>
                                                    <p class="user-email">{{ auth()->user()->email }}</p>
                                                </div>
                                                <!-- End User Info -->
                                            </div>
                                        </a>
                                        <div class="dropdown-menu">
                                            <a href="#">الملف الشخصي</a>
                                            <a href="#">الإعدادات</a>
                                            <a href="#"
                                                onclick="event.preventDefault(); document.getElementById('logoutform').submit();">تسجيل
                                                الخروج</a>
                                        </div>
                                    </div>
                                    <!-- End Main Header User -->
                                @endauth
                                <!-- Main Header Menu -->
                                <div class="main-header-menu d-block d-lg-none">
                                    <div class="header-toogle-menu">
                                        <i class="icofont-navigation-menu"></i>
                                        <img src="{{ asset('frontend/img/menu.png') }}" alt="">
                                    </div>
                                </div>
                                <!-- End Main Header Menu -->
                            </div>
                            <!-- End Header Left -->
                        </div>
                        <div class="col-9 col-lg-11 col-xl-8">
                            <!-- Header Right -->
                            <div class="main-header-right d-flex justify-content-end">
                                <ul class="nav">
                                    <li class="ml-0 d-none d-lg-flex">
                                        <!-- Main Header Print -->
                                        <div class="main-header-print">
                                            <a href="#">
                                                <img src="{{ asset('frontend/img/svg/print-icon.svg') }}"
                                                    alt="">
                                            </a>
                                        </div>
                                        <!-- End Main Header Print -->
                                    </li>
                                    <li class="d-none d-lg-flex">
                                        <!-- Main Header Time -->
                                        <div class="main-header-date-time text-right">
                                            <h3 class="time">
                                                <span id="hours">21</span>
                                                <span id="point">:</span>
                                                <span id="min">06</span>
                                            </h3>
                                            <span class="date"><span id="date">Tue, 12 October 2019</span></span>
                                        </div>
                                        <!-- End Main Header Time -->
                                    </li>
                                    <li class="order-2 order-sm-0">
                                        <!-- Main Header Search -->
                                        <div class="main-header-search">
                                            <form action="#" class="search-form">
                                                <div class="theme-input-group header-search">
                                                    <input type="text" class="theme-input-style"
                                                        placeholder="Search Here">
                                                    <button type="submit"><img
                                                            src="{{ asset('frontend/img/svg/search-icon.svg') }}"
                                                            alt="" class="svg"></button>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- End Main Header Search -->
                                    </li>
                                    <li>
                                        <!-- Main Header Notification -->
                                        <div class="main-header-notification">
                                            <a href="#" class="header-icon notification-icon"
                                                data-toggle="dropdown">
                                                <span class="count"
                                                    data-bg-img="{{ asset('frontend/img/count-bg.png') }}">22</span>
                                                <img src="{{ asset('frontend/img/svg/notification-icon.svg') }}"
                                                    alt="" class="svg">
                                            </a>
                                            <div class="dropdown-menu style--two">
                                                <!-- Dropdown Header -->
                                                <div
                                                    class="dropdown-header d-flex align-items-center justify-content-between">
                                                    <h5>5 New notifications</h5>
                                                    <a href="#" class="text-mute d-inline-block">Clear all</a>
                                                </div>
                                                <!-- End Dropdown Header -->
                                                <!-- Dropdown Body -->
                                                <div class="dropdown-body">
                                                    <!-- Item Single -->
                                                    <a href="#" class="item-single d-flex align-items-center">
                                                        <div class="content">
                                                            <div class="mb-2">
                                                                <p class="time">2 min ago</p>
                                                            </div>
                                                            <p class="main-text">Donec dapibus mauris id odio ornare
                                                                tempus amet.</p>
                                                        </div>
                                                    </a>
                                                    <!-- End Item Single -->
                                                    <!-- Item Single -->
                                                    <a href="#" class="item-single d-flex align-items-center">
                                                        <div class="content">
                                                            <div class="mb-2">
                                                                <p class="time">2 min ago</p>
                                                            </div>
                                                            <p class="main-text">Donec dapibus mauris id odio ornare
                                                                tempus. Duis sit
                                                                amet accumsan justo.</p>
                                                        </div>
                                                    </a>
                                                    <!-- End Item Single -->
                                                    <!-- Item Single -->
                                                    <a href="#" class="item-single d-flex align-items-center">
                                                        <div class="content">
                                                            <div class="mb-2">
                                                                <p class="time">2 min ago</p>
                                                            </div>
                                                            <p class="main-text">Donec dapibus mauris id odio ornare
                                                                tempus. Duis sit
                                                                amet accumsan justo.</p>
                                                        </div>
                                                    </a>
                                                    <!-- End Item Single -->
                                                    <!-- Item Single -->
                                                    <a href="#" class="item-single d-flex align-items-center">
                                                        <div class="content">
                                                            <div class="mb-2">
                                                                <p class="time">2 min ago</p>
                                                            </div>
                                                            <p class="main-text">Donec dapibus mauris id odio ornare
                                                                tempus. Duis sit
                                                                amet accumsan justo.</p>
                                                        </div>
                                                    </a>
                                                    <!-- End Item Single -->
                                                </div>
                                                <!-- End Dropdown Body -->
                                            </div>
                                        </div>
                                        <!-- End Main Header Notification -->
                                    </li>
                                </ul>
                            </div>
                            <!-- End Header Right -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Main Header -->
        </header>
        <!-- End Header -->
        <!-- Main Wrapper -->
        <div class="main-wrapper">
            <!-- Sidebar -->
            <nav class="sidebar" data-trigger="scrollbar">
                <!-- Sidebar Header -->
                <div class="sidebar-header d-none d-lg-block">
                    <!-- Sidebar Toggle Pin Button -->
                    <div class="sidebar-toogle-pin">
                        <i class="icofont-tack-pin"></i>
                    </div>
                    <!-- End Sidebar Toggle Pin Button -->
                </div>
                <!-- End Sidebar Header -->

                <!-- Sidebar Body -->
                <div class="sidebar-body">
                    <!-- Nav -->
                    <ul class="nav">
                        <li class="active">
                            <a href="{{ route('organization.dashboard') }}">
                                <i class="icofont-pie-chart"></i>
                                <span class="link-title">الرئيسية</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="icofont-building-alt"></i>
                                <span class="link-title">قائمة المباني</span>
                            </a>

                            <!-- Sub Menu -->
                            <ul class="nav sub-menu">
                                <li><a href="{{ route('organization.building.create') }}">إضافة مبني</a></li>
                                <li><a href="{{ route('organization.building.index') }}">المباني</a></li>

                            </ul>
                            <!-- End Sub Menu -->
                        </li>

                        <li>
                            <a href="#">
                                <i class="icofont-users-alt-1"></i>
                                <span class="link-title">قائمة المستفيدين </span>
                            </a>

                            <!-- Sub Menu -->
                            <ul class="nav sub-menu">
                                <li><a href="{{ route('organization.beneficiary.create') }}"> إضافة مستفيد</a></li>
                                <li><a href="{{ route('organization.beneficiary.index') }}">المستفيدين</a></li>

                            </ul>
                            <!-- End Sub Menu -->
                        </li>

                        <li>
                            <a href="donors.html">
                                <i class="icofont-heart-alt"></i>
                                <span class="link-title">المانحين</span>
                            </a>
                        </li>


                        <li>
                            <a href="requests.html">
                                <i class="icofont-files-stack"></i>
                                <span class="link-title">الطلبات</span>
                            </a>
                        </li>
                    </ul>
                    <!-- End Nav -->
                </div>
                <!-- End Sidebar Body -->
            </nav>

            @yield('content')
        </div>

        <!-- Footer -->
        <footer class="footer style--two ">
            Tarmem system © 2023 created by <a href=""> Integerated visions</a>
        </footer>
        <!-- End Footer -->
    </div>



    <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>

    <!-- ======= BEGIN GLOBAL MANDATORY SCRIPTS ======= -->
    <script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('frontend/js/script.js') }}"></script>
    <!-- ======= BEGIN GLOBAL MANDATORY SCRIPTS ======= -->
    <script src="{{ asset('dashboard_offline/js/dropzone.min.js') }}"></script>
    <script src="//code.jquery.com/jquery-1.12.4.js"></script>
    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    @include('sweetalert::alert')
    @yield('scripts')
</body>
