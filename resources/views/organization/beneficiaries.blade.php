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
                        <table class=" table table-striped border text-nowrap dh-table">
                            <thead class="text_color-bg text-white">
                                <tr>
                                    <th>أسم المستفيد</th>
                                    <th> الحالة الوظيفية</th>
                                    <th class="text-center">الإحتياجات </th>
                                    <th>المرحلة</th>
                                    <th>المبنى </th>
                                    <th>عدد أفراد الأسرة</th>
                                    <th> التفاصيل</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($beneficiaries as $beneficiary)
                                    <tr>
                                        <td>{{ $beneficiary->name }}</td>
                                        <td>{{ $beneficiary->job_status }} </td>
                                        <td>
                                            <table class="table table-striped border">
                                                <thead class="text-center">
                                                    @foreach ($beneficiary->beneficiaryBeneficiaryNeeds as $item)
                                                        <tr class="text-center table-success" >
                                                            <td>{{ $item->unit->name }} | {{ $item->trmem_type }} | <span class="">{{ $item->description }}</span></td>
                                                        </tr>
                                                    @endforeach
                                                </thead>
                                            </table>
                                        </td>
                                        <td>{{$beneficiary->building->stages}}</td>
                                        <td>{{$beneficiary->building->id}}</td>
                                        <td>{{$beneficiary->beneficiaryBeneficiaryFamilies->where('beneficiary_id',$beneficiary->id)->count() + 1 }}</td>
                                        <td>
                                            <div class="container">
                                                <a   class="btn" href="{{ route('organization.beneficiary.edit' ,$beneficiary->id) }}" class="details-btn">تعديل
                                                </a>
                                                <a class="btn" href="{{ route('organization.beneficiary.show' ,$beneficiary->id) }}" class="details-btn">عرض
                                                    التفاصيل<i class="icofont-arrow-left"></i></a>
                                                
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

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
