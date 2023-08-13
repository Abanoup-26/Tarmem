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
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <!-- Base Control -->
                    <div class="form-element base-control mb-30">
                        <h4 class="font-20 mb-4">إضافة مبني </h4>

                        <!-- Form -->
                        <form action="#" method="POST">

                            <!-- Form Group -->
                            <div class="form-group mb-4">
                                <label for="numb" class="mb-2 black bold">رقم الصك </label>
                                <input type="numb" class="theme-input-style" id="numb" placeholder="رقم الصك">
                            </div>
                            <!-- End Form Group -->



                            <!-- Form Group -->
                            <div class="form-group mb-4">
                                <label for="exampleSelect1" class="mb-2 black bold d-block">نوع المبنى </label>
                                <div class="custom-select style--two">
                                    <select class="theme-input-style" id="exampleSelect1">
                                        <option value="01">01</option>
                                        <option value="02">02</option>
                                        <option value="03">03</option>
                                        <option value="04">04</option>
                                        <option value="05">05</option>
                                    </select>
                                </div>
                            </div>
                            <!-- End Form Group -->




                            <!-- Form Group -->
                            <div class="form-group mb-4">
                                <label class="mb-2 black bold">تاريخ المبنى</label>

                                <!-- Date Picker -->
                                <div class="dashboard-date style--three">
                                    <span class="input-group-addon">
                                        <img src="{{asset('frontend/img/svg/calender.svg')}}" alt="" class="svg">
                                    </span>

                                    <input type="text" id="default-date" placeholder="28 October 2023">
                                </div>
                                <!-- End Date Picker -->
                            </div>
                            <!-- End Form Group -->

                            <!-- Form Group -->
                            <div class="form-group mb-4">
                                <label for="numb" class="mb-2 black bold">عدد الشقق </label>
                                <input type="numb" class="theme-input-style" id="numb" placeholder=" عدد الشقق ">
                            </div>
                            <!-- End Form Group -->


                            <!-- Form Group -->
                            <div class="form-group mb-4">
                                <label for="numb" class="mb-2 black bold"> عدد الأدوار </label>
                                <input type="numb" class="theme-input-style" id="numb" placeholder=" عدد الادوار">
                            </div>
                            <!-- End Form Group -->




                            <div class="form-group mb-4">
                                <label for="myfile" class="mb-2 font-14 bold black">صور المبنى من الخارج </label>
                                <input type="file" id="myfile" name="myfile" class="btn style--two ">
                            </div>




                            <!-- Form Group -->
                            <div class="form-group mb-4">
                                <label for="exampleSelect1" class="mb-2 black bold d-block"> المدينة </label>
                                <div class="custom-select style--two">
                                    <select class="theme-input-style" id="exampleSelect1">
                                        <option value="01">01</option>
                                        <option value="02">02</option>
                                        <option value="03">03</option>
                                        <option value="04">04</option>
                                        <option value="05">05</option>
                                    </select>
                                </div>
                            </div>
                            <!-- End Form Group -->


                            <!-- Form Group -->
                            <div class="form-group mb-4">
                                <label for="exampleSelect1" class="mb-2 black bold d-block">الحي </label>
                                <div class="custom-select style--two">
                                    <select class="theme-input-style" id="exampleSelect1">
                                        <option value="01">01</option>
                                        <option value="02">02</option>
                                        <option value="03">03</option>
                                        <option value="04">04</option>
                                        <option value="05">05</option>
                                    </select>
                                </div>
                            </div>
                            <!-- End Form Group -->
                            <!-- Button Group -->
                            <div class="button-group pt-1">
                                <button type="reset" class="btn long">إضافة</button>
                                <button type="reset" class="link-btn bg-transparent mr-3 soft-pink">إلغاء</button>
                            </div>
                            <!-- End Button Group -->
                        </form>
                        <!-- End Form -->
                    </div>
                    <!-- End Base Control -->


                </div>
            </div>
        </div>
    </div>
    <!-- End Main Content -->
</div>
<!-- End Main Wrapper -->
@endsection