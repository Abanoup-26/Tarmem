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

                    <div class="table-responsive">
                        <!-- Invoice List Table -->
                        <table class="text-nowrap dh-table">
                            <thead class="text_color-bg text-white">
                                <tr>
                                    <th>أسم المستفيد</th>
                                    <th> الحالة الوظيفية</th>
                                    <th>الإحتياجات </th>
                                    <th>المرحلة</th>
                                    <th>المبنى </th>
                                    <th>عدد أفراض الأسرة</th>
                                    <th> التفاصيل</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>أسم المستفيد</td>
                                    <td>الحالة الوظيفية </td>
                                    <td>الإحتياجات</td>
                                    <td>المرحلة</td>
                                    <td>المبنى</td>
                                    <td>5</td>

                                    <td><a href="beneficiaries_show.html" class="details-btn">عرض التفاصيل<i
                                                class="icofont-arrow-left"></i></a></td>
                                </tr>
                                <tr>
                                    <td>أسم المستفيد</td>
                                    <td>الحالة الوظيفية </td>
                                    <td>الإحتياجات</td>
                                    <td>المرحلة</td>
                                    <td>المبنى</td>
                                    <td>5</td>

                                    <td><a href="beneficiaries_show.html" class="details-btn">عرض التفاصيل<i
                                                class="icofont-arrow-left"></i></a></td>
                                </tr>
                                <tr>
                                    <td>أسم المستفيد</td>
                                    <td>الحالة الوظيفية </td>
                                    <td>الإحتياجات</td>
                                    <td>المرحلة</td>
                                    <td>المبنى</td>
                                    <td>5</td>

                                    <td><a href="beneficiaries_show.html" class="details-btn">عرض التفاصيل<i
                                                class="icofont-arrow-left"></i></a></td>
                                </tr>
                                <tr>
                                    <td>أسم المستفيد</td>
                                    <td>الحالة الوظيفية </td>
                                    <td>الإحتياجات</td>
                                    <td>المرحلة</td>
                                    <td>المبنى</td>
                                    <td>5</td>

                                    <td><a href="beneficiaries_show.html" class="details-btn">عرض التفاصيل<i
                                                class="icofont-arrow-left"></i></a></td>
                                </tr>
                            </tbody>
                        </table>
                        <!-- End Invoice List Table -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main Content -->
</div>
<!-- End Main Wrapper -->
@endsection