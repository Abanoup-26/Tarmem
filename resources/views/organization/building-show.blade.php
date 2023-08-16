@extends('layouts.organization')
@section('styles')
    <!-- ======= BEGIN PAGE LEVEL PLUGINS STYLES ======= -->
    <link rel="stylesheet" href="{{ asset('frontend/plugins/apex/apexcharts.css') }}">
    <!-- ======= END BEGIN PAGE LEVEL PLUGINS STYLES ======= -->
@endsection
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <!------Building info Section ------>
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
    </div>
@endsection
@section('scripts')
    <!-- ======= BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS ======= -->
    <script src="{{ asset('frontend/plugins/apex/apexcharts.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/apex/custom-apexcharts.js') }}"></script>
    <!-- ======= End BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS ======= -->
@endsection
