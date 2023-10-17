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
                        <table class="table table-striped table-bordered border-primary  dh-table">
                            <thead class="text_color-bg text-white">
                                <tr>
                                    <th>#</th>
                                    <th>أسم المستفيد</th>
                                    <th>الحالة الوظيفية</th>
                                    <th class="text-center">الإحتياجات</th>
                                    <th>المرحلة</th>
                                    <th>المبنى</th>
                                    <th>عدد أفراد الأسرة</th>
                                    <th>التفاصيل</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($beneficiaries as $beneficiary)
                                    <tr>
                                        <td>{{ $beneficiary->id }}</td>
                                        <td>{{ $beneficiary->name }}</td>
                                        <td>{{ $beneficiary->job_status ? \App\Models\Beneficiary::JOB_STATUS_RADIO[$beneficiary->job_status] : '' }}
                                        </td>
                                        <td class="border border-3 table-success">
                                            <div class="row" dir="ltr">
                                                @foreach ($beneficiary->beneficiaryBeneficiaryNeeds as $item)
                                                    <div class="col-6"><span class="bold"><span
                                                                class="bold">Description|</span>{{ $item->description }}</span>
                                                    </div>
                                                    <div class="col-3"><span
                                                            class="bold">Unit|</span>{{ $item->unit->name }}</div>
                                                    <div class="col-3"><span
                                                            class="bold">Tarmem|</span>{{ $item->trmem_type }}</div>
                                                @endforeach
                                            </div>
                                        </td>
                                        <td>{{ $beneficiary->building ? \App\Models\Building::STAGES_SELECT[$beneficiary->building->stages] : '' }}
                                        </td>
                                        <td>{{ $beneficiary->building->building_number ?? '' }}</td>
                                        <td>{{ $beneficiary->familyMembers->count() }}
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <!-- Equal row sizes -->
                                                <a href="{{ route('organization.beneficiary.edit', $beneficiary->id) }}"
                                                    style="display: inline-block; padding: 5px 10px; background-color: #3535dc; color: white; font-size: 12px; border-radius: 4px; text-decoration: none;">تعديل</a>
                                                <button class="deleteBeneficiary"
                                                    style="display: inline-block; padding: 5px 10px; background-color: #d51919; color: white; font-size: 12px; border-radius: 4px; text-decoration: none;"
                                                    data-beneficiary-id={{ $beneficiary->id }}
                                                    data-delete-url="{{ route('organization.beneficiary.destroy', $beneficiary->id) }}">حذف</button>
                                                <a href="{{ route('organization.beneficiary.show', $beneficiary->id) }}"
                                                    style="display: inline-block; padding: 5px 10px; background-color: #3B9B89; color: white; font-size: 12px; border-radius: 4px; text-decoration: none;">عرض
                                                    التفاصيل <i class="icofont-arrow-left ml-1"></i></a>
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
    <script>
        $("#birth_date").datepicker({
            format: 'DD/MM/YYYY',
            locale: 'en',
            icons: {
                up: 'fas fa-chevron-up',
                down: 'fas fa-chevron-down',
                previous: 'fas fa-chevron-left',
                next: 'fas fa-chevron-right'
            }
        });
    </script>
    {{-- delette beneficiary --}}
    <script>
        $(document).ready(function() {
            $(".deleteBeneficiary").click(function() {
                var beneficiary = $(this).data('beneficiary-id');
                var deleteUrl = $(this).data('delete-url');
                var self = this; // Store a reference to the outer 'this'

                if (confirm("Are you sure you want to delete this family member?")) {
                    $.ajax({
                        type: "POST",
                        url: deleteUrl,
                        data: {
                            beneficiary_id: beneficiary,
                            _token: "{{ csrf_token() }}" // Include the CSRF token
                        },
                        success: function(response) {
                            // Handle success response (e.g., remove the table row)
                            console.log(response);
                            $(self).closest('tr').remove();
                        },
                        error: function(xhr, status, error) {
                            // Handle error response (e.g., show an error message)
                            console.error(error);
                        }
                    });
                }
            });
        });
    </script>
@endsection
