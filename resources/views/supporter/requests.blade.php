@extends('layouts.supporter')
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
                                    <th>رقم الصك</th>
                                    <th>نوع المبنى</th>
                                    <th>عدد الوحدات</th> 
                                    <th>موعد الزيارة</th>
                                    <th>عرض</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($buildings as $building )
                                <tr>
                                    <td>{{$building->building_number}}</td>
                                    <td> {{ $building->building_type ? \App\Models\Building::BUILDING_TYPE_SELECT[$building->building_type] : '' }}</td>
                                    <td>{{$building->apartments_count}}</td> 
                                    <td> {{ $building->buildingBuildingContractors->first()->visit_date }}</td>
                                    <td>
                                        <div class="container"> 
                                            <a href="{{route('supporter.building.show',[$building->id])}}"
                                                style="display: inline-block; padding: 5px 10px; background-color: #3B9B89; color: white; font-size: 12px; border-radius: 4px; text-decoration: none;">عرض
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
