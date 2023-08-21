@extends('layouts.organization')
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
                            <div class="col-lg-6  ">
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
                                        class="font-20  text-primary text-start bold c4 ml-4">{{ $building->building_type }}</span>
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
                                <!-- birth_data -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4">تاريخ تاسيس المبني</span>
                                    <span
                                        class="font-20  text-primary text-start bold c4 ml-4">{{ $building->birth_data }}</span>
                                </div>
                                <!-- latitude /longtude -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4"> العنوان </span>
                                    <span
                                        class="font-20  text-primary text-start bold c4 ml-4">{{ $building->latitude . '-' . $building->longtude }}</span>
                                </div>
                                <!-- building_photos -->
                                <div class="review-list mb-20 row">
                                    <span class="font-14 bold c4 ml-4"> صور المبني قبل الترميم </span>
                                    @foreach ($building->building_photos as $photo)
                                        <img src="{{ $photo->getUrl('preview') }}" width="150px" height="150px">
                                    @endforeach
                                </div>
                                <!-- management_statuses -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4"> حالة الطلب</span>
                                    <span
                                        class="font-20  text-primary text-start bold c4 ml-4">{{ $building->management_statuses }}</span>
                                </div>
                                <!-- stages -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4"> مرحلة الطلب</span>
                                    <span
                                        class="font-20  text-primary text-start bold c4 ml-4">{{ $building->stages }}</span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <!-- Form Group -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4">الوحدة</span>
                                    <span class="font-20  text-primary text-start bold c4 ml-4">الوحدة </span>
                                </div>
                                <!-- End Form Group -->
                                <!-- Form Group -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4">الاحتياج</span>
                                    <span class="font-20  text-primary text-start bold c4 ml-4">الاحتياج</span>
                                </div>
                                <!-- End Form Group -->
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <button class="btn sw-btn-next col-3" type="button">تعديل</button>
                        </div>
                    </div>
                    <!-- End Building data-->
                </div>
            </div>
            <!------End Building info Section ------>
            <!------Beneificary info Section ------>
            <div class="col-md-12">
                <div class="card mb-30">
                    <div class="card-body p-30">
                        <div class="container  w-25  p-2 border-success border-bottom">
                            <h4 class=" m-auto font-25  text-primary text-start mb-20 text-center">بيانات المستفيد</h4>
                        </div>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>{{trans('cruds.beneficiary.fields.name')}}</th>
                                    <th>{{trans('cruds.beneficiary.fields.birth_date')}}</th>
                                    <th>{{trans('cruds.beneficiary.fields.identity_number')}}</th>
                                    <th>{{trans('cruds.beneficiary.fields.identity_photo')}}</th>
                                    <th>{{trans('cruds.beneficiary.fields.qualifications')}}</th>
                                    <th>{{trans('cruds.beneficiary.fields.job_status')}}</th>
                                    <th>{{trans('cruds.beneficiary.fields.job_title')}}</th>
                                    <th>{{trans('cruds.beneficiary.fields.job_salary')}}</th>
                                    <th>{{trans('cruds.beneficiary.fields.marital_status')}}</th>
                                    <th>{{trans('cruds.beneficiary.fields.address')}}</th>
                                    <th>{{trans('cruds.beneficiary.fields.illness_status')}}</th>
                                    <th>{{trans('cruds.beneficiary.fields.illness_type')}}</th>
                                </tr>
                            </thead>
                                <tbody>
                                    @foreach ($building->buildingBeneficiaries->where('building_id',$building->id) as $beneficiary )
                                        <tr>
                                            <td>{{$beneficiary->name}}</td>
                                            <td>{{$beneficiary->birth_date}}</td>
                                            <td>{{$beneficiary->identity_number}}</td>
                                            <td><img src="{{$beneficiary->identity_photo[0]->getUrl('preview')}}" alt=""></td>
                                            <td>{{$beneficiary->qualifications}}</td>
                                            <td>{{$beneficiary->job_status}}</td>
                                            <td>{{$beneficiary->job_title}}</td>
                                            <td>{{$beneficiary->job_salary}}</td>
                                            <td>{{$beneficiary->marital_status}}</td>
                                            <td>{{$beneficiary->address}}</td>
                                            <td>{{$beneficiary->illness_type->name}}</td>
                                            <td>{{$beneficiary->illness_status}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                        </table>
                        <div class="row justify-content-center">
                            <button class="btn sw-btn-next col-3" type="button">تعديل</button>
                        </div>
                    </div>
                    <!-- Beneificary data-->
                </div>
            </div>
            <!------End Beneificary info Section ------>
            <!------Start Family info Section ------>
            <div class="col-md-12">
                <div class="card mb-30">
                    <div class="card-body p-30">
                        <div class="container  w-25  p-2 border-success border-bottom">
                            <h4 class=" m-auto font-25  text-primary text-start mb-20 text-center">بيانات الأسرة</h4>
                        </div>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>{{trans('cruds.beneficiaryFamily.fields.name')}}</th>
                                    <th>{{trans('cruds.beneficiaryFamily.fields.birth_date')}}</th>
                                    <th>{{trans('cruds.beneficiaryFamily.fields.identity_number')}}</th>
                                    <th>{{trans('cruds.beneficiaryFamily.fields.qualifications')}}</th>
                                    <th>{{trans('cruds.beneficiaryFamily.fields.marital_status')}}</th>
                                    <th>{{trans('cruds.beneficiaryFamily.fields.illness_status')}}</th>
                                    <th>{{trans('cruds.beneficiaryFamily.fields.illness_type')}}</th>
                                    <th>{{trans('cruds.beneficiaryFamily.fields.job_status')}}</th>
                                    <th>{{trans('cruds.beneficiaryFamily.fields.job_salary')}}</th>
                                    <th>{{trans('cruds.beneficiaryFamily.fields.familyrelation')}}</th>
                                </tr>
                            </thead>
                                <tbody>
                                    @foreach ($building->buildingBeneficiaries->where('building_id',$building->id) as $beneficiary )
                                        @foreach ( $beneficiary->beneficiaryBeneficiaryFamilies->where('beneficiary_id',$beneficiary->id) as $person )
                                            <tr>
                                                <td>{{$person->name}}</td>
                                                <td>{{$person->birth_date}}</td>
                                                <td>{{$person->identity_number}}</td>
                                                <td>{{$person->qualifications}}</td>
                                                <td>{{$person->marital_status}}</td>
                                                <td>{{$person->illness_status}}</td>
                                                <td>{{$person->illness_type->name}}</td>
                                                <td>{{$person->job_status}}</td>
                                                <td>{{$person->job_salary}}</td>
                                                <td>{{$person->familyrelation->name}}</td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                </tbody>
                        </table>
                        {{-- <div class="row mt-4">
                            <div class="col-lg-6">
                                <!-- Form Group -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4">الاسم</span>
                                    <span class="font-20  text-primary text-start bold c4 ml-4">محمد محمود</span>
                                </div>
                                <!-- End Form Group -->

                                <!-- Form Group -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4">المبنى</span>
                                    <span class="font-20  text-primary text-start bold c4 ml-4">1</span>
                                </div>
                                <!-- End Form Group -->

                                <!-- Form Group -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4">تاريخ الميلاد</span>
                                    <span class="font-20  text-primary text-start bold c4 ml-4">5/9/987</span>
                                </div>
                                <!-- End Form Group -->

                                <!-- Form Group -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4">الحالة الوظيفية </span>
                                    <span class="font-20  text-primary text-start bold c4 ml-4">موظف</span>
                                </div>
                                <!-- End Form Group -->

                                <!-- Form Group -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4"> المرتب</span>
                                    <span class="font-20  text-primary text-start bold c4 ml-4">المرتب</span>
                                </div>
                                <!-- End Form Group -->

                                <!-- Form Group -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4">الوظيفة </span>
                                    <span class="font-20  text-primary text-start bold c4 ml-4">الوظيفة</span>
                                </div>
                                <!-- End Form Group -->

                            </div>

                            <div class="col-lg-6">
                                <!-- Form Group -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4">رقم الهوية</span>
                                    <span class="font-20  text-primary text-start bold c4 ml-4">877777811222</span>
                                </div>
                                <!-- End Form Group -->

                                <!-- Form Group -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4">صورة الهوية</span>
                                    <span class="font-20  text-primary text-start bold c4 ml-4">1</span>
                                </div>
                                <!-- End Form Group -->

                                <!-- Form Group -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4">المؤهل</span>
                                    <span class="font-20  text-primary text-start bold c4 ml-4">بكالريوس</span>
                                </div>
                                <!-- End Form Group -->

                                <!-- Form Group -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4">الحالة الصحية</span>
                                    <span class="font-20  text-primary text-start bold c4 ml-4">مريض </span>
                                </div>
                                <!-- End Form Group -->

                                <!-- Form Group -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4">نوع المرض </span>
                                    <span class="font-20  text-primary text-start bold c4 ml-4">قلب </span>
                                </div>
                                <!-- End Form Group -->


                                <!-- Form Group -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4">الوضع الإجتماعي </span>
                                    <span class="font-20  text-primary text-start bold c4 ml-4">متزوج </span>
                                </div>
                                <!-- End Form Group -->

                                <!-- Form Group -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4">تاريخ </span>
                                    <span class="font-20  text-primary text-start bold c4 ml-4">8/788 </span>
                                </div>
                                <!-- End Form Group -->


                            </div>
                        </div> --}}
                        <div class="row justify-content-center">
                            <button class="btn sw-btn-next col-3" type="button">تعديل</button>
                        </div>
                    </div>
                </div>

            </div>

            <!------End Family info Section ------>
        </div>
    </div>
@endsection
@section('scripts')
    <!-- ======= BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS ======= -->
    <script src="{{ asset('frontend/plugins/apex/apexcharts.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/apex/custom-apexcharts.js') }}"></script>
    <!-- ======= End BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS ======= -->
@endsection
