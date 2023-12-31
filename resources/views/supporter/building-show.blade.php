@extends('layouts.supporter')
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
                                <!-- management_statuses -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4"> حالة الطلب</span>
                                    <span
                                        class="font-20  text-primary text-start bold c4 ml-4">{{ \App\Models\Building::MANAGEMENT_STATUSES_SELECT[$building->management_statuses]}}</span>
                                </div>
                                <!-- stages -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4"> مرحلة الطلب</span>
                                    <span
                                        class="font-20  text-primary text-start bold c4 ml-4">{{ \App\Models\Building::STAGES_SELECT[$building->stages] }}</span>
                                </div>
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
                                    <span class="font-14 bold c4 ml-4"> صور المبني </span>
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
                                    <th>{{ trans('cruds.beneficiary.fields.name') }}</th>
                                    <th>{{ trans('cruds.beneficiary.fields.birth_date') }}</th>
                                    <th>{{ trans('cruds.beneficiary.fields.identity_number') }}</th>
                                    <th>{{ trans('cruds.beneficiary.fields.identity_photo') }}</th>
                                    <th>{{ trans('cruds.beneficiary.fields.qualifications') }}</th>
                                    <th>{{ trans('cruds.beneficiary.fields.job_status') }}</th>
                                    <th>{{ trans('cruds.beneficiary.fields.job_title') }}</th>
                                    <th>{{ trans('cruds.beneficiary.fields.job_salary') }}</th>
                                    <th>{{ trans('cruds.beneficiary.fields.marital_status') }}</th>
                                    <th>{{ trans('cruds.beneficiary.fields.address') }}</th>
                                    <th>{{ trans('cruds.beneficiary.fields.illness_status') }}</th>
                                    <th>{{ trans('cruds.beneficiary.fields.illness_type') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($building->buildingBeneficiaries()->with('illness_type')->where('building_id', $building->id)->get() as $beneficiary)
                                    <tr>
                                        <td>{{ $beneficiary->name }}</td>
                                        <td>{{ $beneficiary->birth_date }}</td>
                                        <td>{{ $beneficiary->identity_number }}</td>
                                        <td>
                                            <div class="container">
                                                @foreach ($beneficiary->identity_photo as $key => $media)
                                                    <img src="{{ $media->getUrl('thumb') }}" alt="identity photos ">
                                                @endforeach
                                            </div>

                                        </td>
                                        <td>{{ $beneficiary->qualifications }}</td>
                                        <td>{{ $beneficiary->job_status ? \App\Models\Beneficiary::JOB_STATUS_RADIO[$beneficiary->job_status] : '' }}</td>
                                        <td>{{ $beneficiary->job_title }}</td>
                                        <td>{{ $beneficiary->job_salary }}</td>
                                        <td>{{ $beneficiary->marital_status ? \App\Models\Beneficiary::MARITAL_STATUS_SELECT[$beneficiary->marital_status] : '' }}</td>
                                        <td>{{ $beneficiary->address }}</td>
                                        <td>{{ $beneficiary->illness_type->name }}</td>
                                        <td>{{ $beneficiary->illness_status ? \App\Models\Beneficiary::ILLNESS_STATUS_RADIO[$beneficiary->illness_status] : '' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- Beneificary data-->
                </div>
            </div>
            <!------End Beneificary info Section ------>
            <!------Start Family info Section ------>
            {{-- <div class="col-md-12">
                <div class="card mb-30">
                    <div class="card-body p-30">
                        <div class="container  w-25  p-2 border-success border-bottom">
                            <h4 class=" m-auto font-25  text-primary text-start mb-20 text-center">بيانات الأسرة</h4>
                        </div>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>{{ trans('cruds.beneficiaryFamily.fields.name') }}</th>
                                    <th>{{ trans('cruds.beneficiaryFamily.fields.birth_date') }}</th>
                                    <th>{{ trans('cruds.beneficiaryFamily.fields.identity_number') }}</th>
                                    <th>{{ trans('cruds.beneficiaryFamily.fields.qualifications') }}</th>
                                    <th>{{ trans('cruds.beneficiaryFamily.fields.marital_status') }}</th>
                                    <th>{{ trans('cruds.beneficiaryFamily.fields.illness_status') }}</th>
                                    <th>{{ trans('cruds.beneficiaryFamily.fields.illness_type') }}</th>
                                    <th>{{ trans('cruds.beneficiaryFamily.fields.job_status') }}</th>
                                    <th>{{ trans('cruds.beneficiaryFamily.fields.job_salary') }}</th>
                                    <th>{{ trans('cruds.beneficiaryFamily.fields.familyrelation') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($building->buildingBeneficiaries->where('building_id', $building->id) as $beneficiary)
                                    @foreach ($beneficiary->beneficiaryBeneficiaryFamilies->where('beneficiary_id', $beneficiary->id) as $person)
                                        <tr>
                                            <td>{{ $person->name }}</td>
                                            <td>{{ $person->birth_date }}</td>
                                            <td>{{ $person->identity_number }}</td>
                                            <td>{{ $person->qualifications }}</td>
                                            <td>{{ $person->marital_status }}</td>
                                            <td>{{ $person->illness_status }}</td>
                                            <td>{{ $person->illness_type->name }}</td>
                                            <td>{{ $person->job_status }}</td>
                                            <td>{{ $person->job_salary }}</td>
                                            <td>{{ $person->familyrelation->name }}</td>
                                        </tr>
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> --}}
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
