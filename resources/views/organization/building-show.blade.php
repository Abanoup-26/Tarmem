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
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card mb-30">
                    <!-- Review-->
                    <div class="card-body p-30">
                        <h4 class="font-20 mb-20 text-center">بيانات المبنى</h4>
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
                                <!-- building_number -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4">رقم المبني </span>
                                    <span class="black">{{$building->building_number}}</span>
                                </div>
                                <!-- building_type -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4"> نوع المبني   </span>
                                    <span class="black">{{$building->building_type}}</span>
                                </div>
                                <!-- floor_count -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4"> عدد الادوار </span>
                                    <span class="black">{{$building->floor_count}}</span>
                                </div>
                                <!-- apartments_count -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4"> عدد الشقة فى الدور  </span>
                                    <span class="black">{{$building->apartments_count}}</span>
                                </div>
                                <!-- birth_data -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4">تاريخ تاسيس المبني</span>
                                    <span class="black">{{$building->birth_data}}</span>
                                </div>
                                <!-- latitude /longtude -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4"> العنوان </span>
                                    <span class="black">{{$building->latitude .'-'.$building->longtude}}</span>
                                </div>
                                <!-- building_photos -->
                                <div class="review-list mb-20 row">
                                    <span class="font-14 bold c4 ml-4"> صور المبني قبل الترميم </span>
                                    @foreach ($building->building_photos as $photo )
                                        <img class="black" src="{{$photo->getUrl()}}" width="250px" height="250px">
                                    @endforeach
                                </div>
                                <!-- management_statuses -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4"> حالة الطلب</span>
                                    <span class="black">{{$building->management_statuses}}</span>
                                </div>
                                <!-- stages -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4"> مرحلة الطلب</span>
                                    <span class="black">{{$building->stages}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <button class="btn sw-btn-next col-3" type="button">تعديل</button>
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
