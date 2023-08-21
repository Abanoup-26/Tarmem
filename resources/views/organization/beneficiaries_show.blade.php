@extends('layouts.organization')
@section('styles')
    <!-- ======= BEGIN PAGE LEVEL PLUGINS STYLES ======= -->
    <link rel="stylesheet" href="{{ asset('frontend/plugins/apex/apexcharts.css') }}">
    <!-- ======= END BEGIN PAGE LEVEL PLUGINS STYLES ======= -->
@endsection
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <!------Beneficiary------>
        <div class="row justify-content-center">
            <!------Beneficiary info Section ------>
            <div class="col-12">
                <div class="card mb-30">
                    <!-- Main Review-->
                    <!-- Beneificary data -->
                    <div class="card-body p-30">
                        <div class="container  w-25  p-2 border-success border-bottom">
                            <h2 class=" m-auto   text-primary text-start mb-20 text-center">بيانات المستفيد</h2>
                        </div>
                        <div class="row mt-4">
                            <div class="col-lg-4">
                                <!-- name -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4">الاسم</span>
                                    <span class="font-20  text-primary text-start bold c4 ml-4">{{$beneficiary->name}}</span>
                                </div>
                                <!-- End name -->
                                <!-- birth_date -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4">تاريخ الميلاد </span>
                                    <span class="font-20  text-primary text-start bold c4 ml-4">{{$beneficiary->birth_date}}</span>
                                </div>
                                <!-- End birth_date -->
                                <!-- identity_number -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4">  رقم بطاقة الهويه</span>
                                    <span class="font-20  text-primary text-start bold c4 ml-4">{{$beneficiary->identity_number}}</span>
                                </div>
                                <!-- End identity_number -->
                                <!-- identity_photo -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4"> صور الهويه </span>
                                    <span class=" ml-4">
                                        @foreach ( $beneficiary->identity_photo as $key => $media )
                                        <div class="row justifiy-content-between  ">
                                            <img src="{{$media->getUrl()}}" alt="identity photos"  class="w-50">
                                        </div>
                                        <br>
                                        @endforeach
                                    </span>
                                </div>
                                <!-- End identity_photo -->
                            </div>
                            <div class="col-lg-4">
                                <!-- qualifications -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4"> المؤهل الدراسي </span>
                                    <span class="font-20  text-primary text-start bold c4 ml-4">{{$beneficiary->qualifications}}</span>
                                </div>
                                <!-- End qualifications -->
                                <!-- job_status -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4">الحالة الوظيفيه </span>
                                    <span class="font-20  text-primary text-start bold c4 ml-4">{{$beneficiary->job_status}}</span>
                                </div>
                                <!-- End job_status -->
                                <!-- job_title -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4"> الوظيفه</span>
                                    <span class="font-20  text-primary text-start bold c4 ml-4">{{$beneficiary->job_title}}</span>
                                </div>
                                <!-- End job_title -->

                                <!-- job_salary -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4">الراتب </span>
                                    <span class="font-20  text-primary text-start bold c4 ml-4">{{$beneficiary->job_salary}}</span>
                                </div>
                                <!-- End job_salary -->
                            </div>
                            <div class="col-lg-4">
                                <!-- marital_status -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4">الحاله الاجتماعيه</span>
                                    <span class="font-20  text-primary text-start bold c4 ml-4">{{$beneficiary->marital_status}}</span>
                                </div>
                                <!-- End marital_status -->

                                <!-- address -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4">العنوان </span>
                                    <span class="font-20  text-primary text-start bold c4 ml-4">{{$beneficiary->address}} </span>
                                </div>
                                <!-- End address -->

                                <!-- illness_type + illness_status  -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4">الحاله الصحيه - نوع المرض </span>
                                    <span class="font-20  text-primary text-start bold c4 ml-4"> {{$beneficiary->illness_status}} - {{$beneficiary->illness_type->name}}</span>
                                </div>
                                <!-- End illness -->
                            </div>
                        </div>
                    </div>
                    <!-- End Main Review -->
                </div>
            </div>
        </div>
        <!--- beneficiary needs  -->
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card mb-30">
                    @foreach ($beneficiary->beneficiaryBeneficiaryNeeds->where('beneficiary_id', $beneficiary->id) as $Needs )
                    <!-- Needs-->
                    <div class="card-body p-30">
                        <div class="container  w-25  p-2 border-success border-bottom">
                            <h2 class=" m-auto  text-primary text-start mb-20 text-center">بيانات المبنى</h2>
                        </div>
                        <div class="row m-5">
                                <!-- Unit -->
                                <div class="review-list mb-20 col-4">
                                    <span class="font-14 bold c4 ml-4"> الوحده</span>
                                    <span class="font-20  text-primary text-start bold c4 ml-4">{{$Needs->unit->name}}</span>
                                </div>
                                <!-- End Unit -->

                                <!-- Tarmem-type -->
                                <div class="review-list mb-20 col-4">
                                    <span class="font-14 bold c4 ml-4"> الاحتياج اللازم من جمعية ترميم </span>
                                    <span class="font-20  text-primary text-start bold c4 ml-4">{{$Needs->trmem_type}}</span>
                                </div>
                                <!-- End Tarmem-type -->
                            
                                <!-- Description -->
                                <div class="review-list mb-20 col-4">
                                    <span class="font-14 bold c4 ml-4"> التفاصيل كامله</span>
                                    <span class="font-20  text-primary text-start bold c4 ml-4">{{$Needs->description}}</span>
                                </div>
                                <!-- End Description -->
                            
                        </div>
                        <div class=" row m-auto  ">
                            <!-- photos before -->
                            <div class="  review-list mb-20 ">
                                <h3 class="font-18 bold c4 ms-4 text-center mb-5 "> صور قبل الترميم</h3>
                                <span class="font-20 bold c4 ml-4">
                                    <div class="  row justify-content-center ">
                                        @foreach ($Needs->photos_before as $key => $media )
                                        <div class="col-4">
                                            <img src="{{$media->getUrl()}}" alt="Building Photos before Tarmem" class="w-75">
                                        </div>
                                        @endforeach
                                    </div>
                                    
                                </span>
                            </div>
                            <!-- End photos before -->
                        </div>
                    </div>
                    <!-- End Needs -->
                    @endforeach
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
