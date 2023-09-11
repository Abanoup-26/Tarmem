@extends('layouts.contractor')
@section('styles')
    <!-- ======= BEGIN PAGE LEVEL PLUGINS STYLES ======= -->
    <link rel="stylesheet" href="{{ asset('frontend/plugins/apex/apexcharts.css') }}">
    <!-- ======= END BEGIN PAGE LEVEL PLUGINS STYLES ======= -->
@endsection
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <div class="row justify-content-center">
            <!------Building info Section ------>
            <div class="col-md-12">
                <div class="card mb-30">
                    <!-- Building data-->
                    <div class="card-body p-30">
                        <div class="container  w-25  p-2 border-success border-bottom   ">
                            <h4 class=" m-auto font-25  text-primary text-start mb-20 text-center">بيانات المبنى</h4>
                        </div>
                        <div class="row mt-4">
                            <div class="col-lg-4  ">
                                <!-- building_name -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4">اسم المبني </span>
                                    <span
                                        class="font-20   text-primary text-start bold c4 ml-4">{{ $building->name }}</span>
                                </div>
                                <!-- building_project_name -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4">اسم المشروع </span>
                                    <span
                                        class="font-20   text-primary text-start bold c4 ml-4">{{ $building->project_name }}</span>
                                </div>
                                <!-- building_number -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4">رقم المبني </span>
                                    <span
                                        class="font-20   text-primary text-start bold c4 ml-4">{{ $building->building_number }}</span>
                                </div>
                                <!-- building_type -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4"> نوع المبني </span>
                                    <span
                                        class="font-20  text-primary text-start bold c4 ml-4">{{ \App\Models\Building::BUILDING_TYPE_SELECT[$building->building_type] }}</span>
                                </div>
                                <!-- floor_count -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4"> عدد الادوار </span>
                                    <span
                                        class="font-20  text-primary text-start bold c4 ml-4">{{ $building->floor_count }}</span>
                                </div>
                                <!-- apartments_count -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4"> عدد الشقة فى الدور </span>
                                    <span
                                        class="font-20  text-primary text-start bold c4 ml-4">{{ $building->apartments_count }}</span>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <!-- latitude /longtude -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4"> العنوان </span>
                                    <span class="font-20  text-primary text-start bold c4 ml-4">
                                        <a target="_blanc"
                                            href="https://www.google.com/maps/place/{{ $building->latitude }},{{ $building->longtude }}">
                                            عرض في الخريطة
                                        </a>
                                    </span>
                                </div>
                                <!-- management_statuses -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4"> حالة الطلب</span>
                                    <span
                                        class="font-20  text-primary text-start bold c4 ml-4">{{ \App\Models\Building::MANAGEMENT_STATUSES_SELECT[$building->management_statuses] }}</span>
                                </div>
                                <!-- stages -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4"> مرحلة الطلب</span>
                                    <span
                                        class="font-20  text-primary text-start bold c4 ml-4">{{ \App\Models\Building::STAGES_SELECT[$building->stages] }}</span>
                                </div>
                                <!-- research_visit-date -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4"> تاريخ الزياره البحثيه </span>
                                    <span
                                        class="font-20  text-primary text-start bold c4 ml-4">{{ $building->research_vist_date }}</span>
                                </div>
                                <!-- engineering_visit-date -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4"> تاريخ الزياره الهندسيه </span>
                                    <span
                                        class="font-20  text-primary text-start bold c4 ml-4">{{ $building->engineering_vist_date }}</span>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <!-- birth_data -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4">تاريخ تاسيس المبني</span>
                                    <span
                                        class="font-20  text-primary text-start bold c4 ml-4">{{ $building->birth_data }}</span>
                                </div>
                                <!-- building_age -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4"> عمر المبني</span>
                                    <span
                                        class="font-20  text-primary text-start bold c4 ml-4">{{ $building->buidling_age }}</span>
                                </div>
                                <!-- building_photos -->
                                <div class="review-list mb-20 ">
                                    <span class="font-14 bold c4 ml-4"> صور المبني </span>
                                    @foreach ($building->building_photos as $photo)
                                        <img src="{{ $photo->getUrl('preview') }}" width="150px" height="150px">
                                    @endforeach
                                </div>
                                <!-- research_visit-result -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4"> نتيجة الزياره البحثيه </span>
                                    @if ($building->research_vist_result)
                                        <span class="font-20  text-primary text-start bold c4 ml-4">
                                            <img src="{{ $building->research_vist_result->getUrl('preview') }}"
                                                width="150px" height="150px">
                                        </span>
                                    @else
                                        <span class="font-20  text-primary text-start bold c4 ml-4"> لم يتم اضافة
                                            نتيجه</span>
                                    @endif

                                </div>
                                <!-- engineering_visit-result -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4"> نتيجة الزياره الهندسيه </span>
                                    @if ($building->engineering_vist_result)
                                        <span class="font-20  text-primary text-start bold c4 ml-4">
                                            <img src="{{ $building->engineering_vist_result->getUrl('preview') }}"
                                                width="150px" height="150px"></span>
                                    @else
                                        <span class="font-20  text-primary text-start bold c4 ml-4"> لم يتم اضافة
                                            نتيجه</span>
                                    @endif

                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- End Building data-->
                </div>
            </div>
            <!------End Building info Section ------>
        </div>
    </div>
@endsection
@section('scripts')
    <!-- ======= BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS ======= -->
    <script src="{{ asset('frontend/plugins/apex/apexcharts.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/apex/custom-apexcharts.js') }}"></script>
    <!-- ======= End BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS ======= -->
@endsection
