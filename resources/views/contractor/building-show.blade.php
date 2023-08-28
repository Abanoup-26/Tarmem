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
                                    class="font-20  text-primary text-start bold c4 ml-4">{{  \App\Models\Building::BUILDING_TYPE_SELECT[$building->building_type] }}</span>
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
                                    <span
                                        class="font-20  text-primary text-start bold c4 ml-4">
                                        <a target="_blanc" href="https://www.google.com/maps/place/{{$building->latitude}},{{$building->longtude}}">
                                            عرض في الخريطة
                                        </a> 
                                    </span>
                                </div> 
                                @php
                                    $buildingContractor = $building->buildingBuildingContractors->first();
                                @endphp
                                @if($buildingContractor && $buildingContractor->stages != 'pending')
                                    <div class="review-list mb-20">
                                        <span class="font-14 bold c4 ml-4">السعر بالمواد</span>
                                        <span
                                            class="font-20  text-primary text-start bold c4 ml-4">{{ $buildingContractor->quotation_with_materials ?? ''  }}</span>
                                    </div>
                                    <div class="review-list mb-20">
                                        <span class="font-14 bold c4 ml-4">السعر بدون المواد</span>
                                        <span
                                            class="font-20  text-primary text-start bold c4 ml-4">{{ $buildingContractor->quotation_without_materials  ?? '' }}</span>
                                    </div>
                                    <div class="review-list mb-20">
                                        <span class="font-14 bold c4 ml-4">الحالة</span>
                                        <span
                                            class="font-20  text-primary text-start bold c4 ml-4">{{ \App\Models\BuildingContractor::STAGES_2_SELECT[$buildingContractor->stages] }}</span>
                                    </div>
                                @endif
                            </div>
                            <div class="col-lg-4">
                                <!-- birth_data -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4">تاريخ تاسيس المبني</span>
                                    <span
                                        class="font-20  text-primary text-start bold c4 ml-4">{{ $building->birth_data }}</span>
                                </div>
                                <!-- building_photos -->
                                <div class="review-list mb-20 row">
                                    <span class="font-14 bold c4 ml-4"> صور المبني قبل الترميم </span>
                                    @foreach ($building->building_photos as $photo)
                                        <img src="{{ $photo->getUrl('preview') }}" width="150px" height="150px">
                                    @endforeach
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
