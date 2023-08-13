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
        <div class="row">


            <div class="col-12">
                <div class="card mb-30">

                    <!-- Review-->
                    <div class="card-body p-30">
                        <h4 class="font-20 mb-20">بيانات المستفيد</h4>

                        <div class="row">
                            <div class="col-lg-6">
                                <!-- Form Group -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4">الاسم</span>
                                    <span class="black">محمد محمود</span>
                                </div>
                                <!-- End Form Group -->

                                <!-- Form Group -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4">المبنى</span>
                                    <span class="black">1</span>
                                </div>
                                <!-- End Form Group -->

                                <!-- Form Group -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4">تاريخ الميلاد</span>
                                    <span class="black">5/9/987</span>
                                </div>
                                <!-- End Form Group -->

                                <!-- Form Group -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4">الحالة الوظيفية </span>
                                    <span class="black">موظف</span>
                                </div>
                                <!-- End Form Group -->

                                <!-- Form Group -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4"> المرتب</span>
                                    <span class="black">المرتب</span>
                                </div>
                                <!-- End Form Group -->

                                <!-- Form Group -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4">الوظيفة </span>
                                    <span class="black">الوظيفة</span>
                                </div>
                                <!-- End Form Group -->

                            </div>

                            <div class="col-lg-6">
                                <!-- Form Group -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4">رقم الهوية</span>
                                    <span class="black">877777811222</span>
                                </div>
                                <!-- End Form Group -->

                                <!-- Form Group -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4">صورة الهوية</span>
                                    <span class="black">1</span>
                                </div>
                                <!-- End Form Group -->

                                <!-- Form Group -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4">المؤهل</span>
                                    <span class="black">بكالريوس</span>
                                </div>
                                <!-- End Form Group -->

                                <!-- Form Group -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4">الحالة الصحية</span>
                                    <span class="black">مريض </span>
                                </div>
                                <!-- End Form Group -->

                                <!-- Form Group -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4">نوع المرض </span>
                                    <span class="black">قلب </span>
                                </div>
                                <!-- End Form Group -->


                                <!-- Form Group -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4">الوضع الإجتماعي </span>
                                    <span class="black">متزوج </span>
                                </div>
                                <!-- End Form Group -->

                                <!-- Form Group -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4">تاريخ </span>
                                    <span class="black">8/788 </span>
                                </div>
                                <!-- End Form Group -->


                            </div>
                        </div>
                        <div class="row">
                            <button class="btn sw-btn-next" type="button">تعديل</button>
                        </div>
                    </div>
                    <!-- End Review -->




                </div>

            </div>

        </div>




        <div class="row">
            <div class="col-12">
                <div class="card mb-30">

                    <!-- Review-->
                    <div class="card-body p-30">
                        <h4 class="font-20 mb-20">بيانات المبنى</h4>

                        <div class="row">
                            <div class="col-lg-6">
                                <!-- Form Group -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4">الوحدة</span>
                                    <span class="black">الوحدة </span>
                                </div>
                                <!-- End Form Group -->

                                <!-- Form Group -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4">الاحتياج</span>
                                    <span class="black">الاحتياج</span>
                                </div>
                                <!-- End Form Group -->
                            </div>

                            <div class="col-lg-6">
                                <!-- Form Group -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4">صور قبل التاسيس </span>
                                    <span class="black">877777811222</span>
                                </div>
                                <!-- End Form Group -->


                                <!-- Form Group -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4">بيانات إضافية </span>
                                    <span class="black">1112225 </span>
                                </div>
                                <!-- End Form Group -->


                            </div>
                        </div>
                        <div class="row">
                            <button class="btn sw-btn-next" type="button">تعديل</button>
                        </div>
                    </div>
                    <!-- End Review -->




                </div>

            </div>

        </div>

        <div class="row">


            <div class="col-12">
                <div class="card mb-30">

                    <!-- Review-->
                    <div class="card-body p-30">
                        <h4 class="font-20 mb-20">بيانات الأسرة</h4>

                        <div class="row">
                            <div class="col-lg-6">
                                <!-- Form Group -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4">الاسم</span>
                                    <span class="black">محمد محمود</span>
                                </div>
                                <!-- End Form Group -->

                                <!-- Form Group -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4">المبنى</span>
                                    <span class="black">1</span>
                                </div>
                                <!-- End Form Group -->

                                <!-- Form Group -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4">تاريخ الميلاد</span>
                                    <span class="black">5/9/987</span>
                                </div>
                                <!-- End Form Group -->

                                <!-- Form Group -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4">الحالة الوظيفية </span>
                                    <span class="black">موظف</span>
                                </div>
                                <!-- End Form Group -->

                                <!-- Form Group -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4"> المرتب</span>
                                    <span class="black">المرتب</span>
                                </div>
                                <!-- End Form Group -->

                                <!-- Form Group -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4">الوظيفة </span>
                                    <span class="black">الوظيفة</span>
                                </div>
                                <!-- End Form Group -->

                            </div>

                            <div class="col-lg-6">
                                <!-- Form Group -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4">رقم الهوية</span>
                                    <span class="black">877777811222</span>
                                </div>
                                <!-- End Form Group -->

                                <!-- Form Group -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4">صورة الهوية</span>
                                    <span class="black">1</span>
                                </div>
                                <!-- End Form Group -->

                                <!-- Form Group -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4">المؤهل</span>
                                    <span class="black">بكالريوس</span>
                                </div>
                                <!-- End Form Group -->

                                <!-- Form Group -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4">الحالة الصحية</span>
                                    <span class="black">مريض </span>
                                </div>
                                <!-- End Form Group -->

                                <!-- Form Group -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4">نوع المرض </span>
                                    <span class="black">قلب </span>
                                </div>
                                <!-- End Form Group -->


                                <!-- Form Group -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4">الوضع الإجتماعي </span>
                                    <span class="black">متزوج </span>
                                </div>
                                <!-- End Form Group -->

                                <!-- Form Group -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4">تاريخ </span>
                                    <span class="black">8/788 </span>
                                </div>
                                <!-- End Form Group -->


                            </div>
                        </div>
                        <div class="row">
                            <button class="btn sw-btn-next" type="button">تعديل</button>
                        </div>
                    </div>
                    <!-- End Review -->




                </div>

            </div>

        </div>

    </div>


</div>
@endsection