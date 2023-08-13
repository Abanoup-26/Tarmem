@extends('layouts.frontend')
@section('content')
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
                    <a href="index.html">
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
                        <li><a href="Add_building.html">إضافة مبني</a></li>
                        <li><a href="building.html">المباني</a></li>

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
                        <li><a href="Add_beneficiary.html"> إضافة مستفيد</a></li>
                        <li><a href="beneficiaries.html">المستفيدين</a></li>

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
    <!-- End Sidebar -->

    <!-- Main Content -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-4 col-md-8">
                    <!-- Card -->
                    <div class="card mb-30">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="increase">
                                    <div class="card-title d-flex align-items-end mb-2">
                                        <h2>86<sup>%</sup></h2>
                                        <p class="font-14">Increased</p>
                                    </div>
                                    <h3 class="card-subtitle mb-2">Congratulation!</h3>
                                    <p class="font-16">You've finished all of your tasks for this week.</p>
                                </div>
                                <div class="congratulation-img">
                                    <img src="{{asset('frontend/img/media/congratulation-img.png')}}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Card -->
                </div>

                <div class="col-xl-2 col-md-4 col-sm-6">
                    <!-- Card -->
                    <div class="card area-chart-box mb-30">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="">
                                    <h4 class="mb-1">Income</h4>
                                    <p class="font-14 c3">Increase in Average</p>
                                </div>
                                <div class="">
                                    <h2>50<sup>%</sup></h2>
                                </div>
                            </div>
                        </div>
                        <div id="apex_area-chart" class="chart"></div>
                    </div>
                    <!-- End Card -->
                </div>

                <div class="col-xl-2 col-md-4 col-sm-6">
                    <!-- Card -->
                    <div class="card area-chart-box mb-30">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="">
                                    <h4 class="mb-1">Profit Report</h4>
                                    <p class="font-14 soft-pink">Decrease in Average</p>
                                </div>
                                <div class="">
                                    <h2>15<sup>%</sup></h2>
                                </div>
                            </div>
                        </div>
                        <div id="apex_area2-chart" class="chart"></div>
                    </div>
                    <!-- End Card -->
                </div>

                <div class="col-xl-2 col-md-4 col-sm-6">
                    <!-- Card -->
                    <div class="card area-chart-box mb-30">
                        <div class="card-body">
                            <div class="">
                                <h4 class="mb-1">Impression</h4>
                                <p class="font-14 text_color">Hover to see detail</p>
                            </div>
                        </div>
                        <div id="apex_area3-chart" class="chart"></div>
                    </div>
                    <!-- End Card -->
                </div>

                <div class="col-xl-2 col-md-4 col-sm-6">
                    <!-- Card -->
                    <div class="card area-chart-box mb-30">
                        <div class="card-body">
                            <div class="">
                                <h4 class="mb-1">Activity</h4>
                                <p class="font-14 text_color">Hover to see detail</p>
                            </div>
                        </div>
                        <div id="apex_area4-chart" class="chart"></div>
                    </div>
                    <!-- End Card -->
                </div>
            </div>



            <div class="row">



                <div class="col-xl-12">
                    <!-- Card -->
                    <div class="card">
                        <div class="card-body">
                            <div
                                class="d-flex justify-content-start justify-content-sm-between align-items-start align-items-sm-center flex-column flex-sm-row mb-sm-n3">
                                <div class="title-content mb-4 mb-sm-0">
                                    <h4 class="mb-2">Sale Reports</h4>
                                    <p>Solicitude announcing as to sufficient my</p>
                                </div>
                                <div class="">
                                    <ul class="list-inline list-button m-0">
                                        <li>2015</li>
                                        <li>2016</li>
                                        <li>2017</li>
                                        <li>2018</li>
                                        <li class="active">2019</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div id="apex_line3-chart" class="chart"></div>
                    </div>
                    <!-- End Card -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Main Content -->
</div>
<!-- End Main Wrapper -->
@endsection