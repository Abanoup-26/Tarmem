@extends('layouts.organization')
@section('styles')
    <!-- ======= BEGIN PAGE LEVEL PLUGINS STYLES ======= -->
    <link rel="stylesheet" href="{{ asset('frontend/plugins/apex/apexcharts.css') }}">
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

                                    <td><a href="{{route('organization.beneficiary.show')}}" class="details-btn">عرض التفاصيل<i
                                                class="icofont-arrow-left"></i></a></td>
                                </tr>
                                <tr>
                                    <td>أسم المستفيد</td>
                                    <td>الحالة الوظيفية </td>
                                    <td>الإحتياجات</td>
                                    <td>المرحلة</td>
                                    <td>المبنى</td>
                                    <td>5</td>
                                    <td><a href="{{route('organization.beneficiary.show')}}" class="details-btn">عرض التفاصيل<i
                                                class="icofont-arrow-left"></i></a></td>
                                </tr>
                                <tr>
                                    <td>أسم المستفيد</td>
                                    <td>الحالة الوظيفية </td>
                                    <td>الإحتياجات</td>
                                    <td>المرحلة</td>
                                    <td>المبنى</td>
                                    <td>5</td>

                                    <td><a href="{{route('organization.beneficiary.show')}}" class="details-btn">عرض التفاصيل<i
                                                class="icofont-arrow-left"></i></a></td>
                                </tr>
                                <tr>
                                    <td>أسم المستفيد</td>
                                    <td>الحالة الوظيفية </td>
                                    <td>الإحتياجات</td>
                                    <td>المرحلة</td>
                                    <td>المبنى</td>
                                    <td>5</td>

                                    <td><a href="{{route('organization.beneficiary.show')}}" class="details-btn">عرض التفاصيل<i
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
    <script src="{{ asset('frontend/plugins/apex/apexcharts.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/apex/custom-apexcharts.js') }}"></script>
    <!-- ======= End BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS ======= -->
@endsection
