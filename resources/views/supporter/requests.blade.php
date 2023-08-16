@extends('layouts.supporter')
@section('styles')
    <!-- ======= BEGIN PAGE LEVEL PLUGINS STYLES ======= -->
    <link rel="stylesheet" href="assets/plugins/apex/apexcharts.css">
    <!-- ======= END BEGIN PAGE LEVEL PLUGINS STYLES ======= -->
@endsection
@section('content')
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
                                    <th>رقم الصك</th>
                                    <th>نوع المبنى</th>
                                    <th>عدد الوحدات</th>
                                    <th>الحالة</th>
                                    <th>موعد الزيارة</th>
                                    <th>عرض</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>نوع المبنى</td>
                                    <td>5</td>
                                    <td>الحالة</td>
                                    <td> 28/8/2023</td>
                                    <td><a href="building_show.html" class="details-btn">عرض التفاصيل<i
                                                class="icofont-arrow-left"></i></a></td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>نوع المبنى</td>
                                    <td>5</td>
                                    <td>الحالة</td>
                                    <td> 28/8/2023</td>
                                    <td><a href="building_show.html" class="details-btn">عرض التفاصيل<i
                                                class="icofont-arrow-left"></i></a></td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>نوع المبنى</td>
                                    <td>5</td>
                                    <td>الحالة</td>
                                    <td> 28/8/2023</td>
                                    <td><a href="building_show.html" class="details-btn">عرض التفاصيل<i
                                                class="icofont-arrow-left"></i></a></td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>نوع المبنى</td>
                                    <td>5</td>
                                    <td>الحالة</td>
                                    <td> 28/8/2023</td>
                                    <td><a href="building_show.html" class="details-btn">عرض التفاصيل<i
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
@endsection
@section('scripts')
    <!-- ======= BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS ======= -->
    <script src="assets/plugins/apex/apexcharts.min.js"></script>
    <script src="assets/plugins/apex/custom-apexcharts.js"></script>
    <!-- ======= End BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS ======= -->
@endsection
