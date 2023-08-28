@extends('layouts.organization')
@section('styles')
    <!-- ======= BEGIN PAGE LEVEL PLUGINS STYLES ======= -->
    <link rel="stylesheet" href="{{ asset('frontend/plugins/apex/apexcharts.css') }}">
    <!-- ======= END BEGIN PAGE LEVEL PLUGINS STYLES ======= -->
    <link rel="stylesheet" href="{{ asset('dashboard_offline/css/dropzone.min.css') }}">
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
                                    <span
                                        class="font-20  text-primary text-start bold c4 ml-4">{{ $beneficiary->name }}</span>
                                </div>
                                <!-- End name -->
                                <!-- birth_date -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4">تاريخ الميلاد </span>
                                    <span
                                        class="font-20  text-primary text-start bold c4 ml-4">{{ $beneficiary->birth_date }}</span>
                                </div>
                                <!-- End birth_date -->
                                <!-- identity_number -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4"> رقم بطاقة الهويه</span>
                                    <span
                                        class="font-20  text-primary text-start bold c4 ml-4">{{ $beneficiary->identity_number }}</span>
                                </div>
                                <!-- End identity_number -->
                                <!-- identity_photo -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4"> صور الهويه </span>
                                    <span class=" ml-4">
                                        @foreach ($beneficiary->identity_photo as $key => $media)
                                            <div class="row justifiy-content-between  ">
                                                <img src="{{ $media->getUrl() }}" alt="identity photos" class="w-50">
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
                                    <span
                                        class="font-20  text-primary text-start bold c4 ml-4">{{ $beneficiary->qualifications }}</span>
                                </div>
                                <!-- End qualifications -->
                                <!-- job_status -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4">الحالة الوظيفيه </span>
                                    <span
                                        class="font-20  text-primary text-start bold c4 ml-4">{{ \App\Models\Beneficiary::JOB_STATUS_RADIO[$beneficiary->job_status] }}</span>
                                </div>
                                <!-- End job_status -->
                                <!-- job_title -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4"> الوظيفه</span>
                                    <span
                                        class="font-20  text-primary text-start bold c4 ml-4">{{ $beneficiary->job_title }}</span>
                                </div>
                                <!-- End job_title -->

                                <!-- job_salary -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4">الراتب </span>
                                    <span
                                        class="font-20  text-primary text-start bold c4 ml-4">{{ $beneficiary->job_salary }}</span>
                                </div>
                                <!-- End job_salary -->
                            </div>
                            <div class="col-lg-4">
                                <!-- marital_status -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4">الحاله الاجتماعيه</span>
                                    <span
                                        class="font-20  text-primary text-start bold c4 ml-4">{{ $beneficiary->marital_status ? \App\Models\Beneficiary::MARITAL_STATUS_SELECT[$beneficiary->marital_status] : '' }}</span>
                                </div>
                                <!-- End marital_status -->

                                <!-- address -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4">العنوان </span>
                                    <span class="font-20  text-primary text-start bold c4 ml-4">{{ $beneficiary->address }}
                                    </span>
                                </div>
                                <!-- End address -->

                                <!-- illness_type + illness_status  -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4">الحاله الصحيه - نوع المرض </span>
                                    <span class="font-20  text-primary text-start bold c4 ml-4">
                                        {{ $beneficiary->illness_status ? \App\Models\Beneficiary::ILLNESS_STATUS_RADIO[$beneficiary->illness_status] : '' }} - {{ $beneficiary->illness_type->name }}</span>
                                </div>
                                <!-- End illness -->
                            </div>
                        </div>
                    </div>
                    <!-- End Main Review -->
                </div>
            </div>
        </div>
        <!------Building------>
        <div class="row justify-content-center">
            <!------Beneficiary info Section ------>
            <div class="col-12">
                <div class="card mb-30">
                    <!-- Main Review-->
                    <!-- Beneificary data -->
                    <div class="card-body p-30">
                        <div class="container  w-25  p-2 border-success border-bottom">
                            <h2 class=" m-auto   text-primary text-start mb-20 text-center">بيانات المبني</h2>
                        </div>
                        <div class="row mt-4">
                            <div class="col-lg-4">
                                <!-- building_number -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4">رقم المبني</span>
                                    <span
                                        class="font-20  text-primary text-start bold c4 ml-4">{{ $beneficiary->building->building_number ?? '' }}</span>
                                </div>
                                <!-- End building_number -->
                                <!-- floor_count -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4"> عدد الادوار </span>
                                    <span
                                        class="font-20  text-primary text-start bold c4 ml-4">{{ $beneficiary->building->floor_count ?? '' }}</span>
                                </div>
                                <!-- End floor_count -->
                                <!-- apartments_count -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4"> عدد الشقه </span>
                                    <span
                                        class="font-20  text-primary text-start bold c4 ml-4">{{ $beneficiary->building->apartments_count ?? '' }}</span>
                                </div>
                                <!-- End apartments_count -->
                            </div>
                            <div class="col-lg-4">
                                <!-- birth_data -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4"> تاريخ انشاء المبني </span>
                                    <span
                                        class="font-20  text-primary text-start bold c4 ml-4">{{ $beneficiary->building->birth_data ?? '' }}</span>
                                </div>
                                <!-- End birth_data -->
                                <!-- address -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4"> العنوان </span>
                                    <span
                                        class="font-20  text-primary text-start bold c4 ml-4">
                                        <a target="_blanc" href="https://www.google.com/maps/place/{{$beneficiary->building->latitude ?? ''}},{{$beneficiary->building->longtude ?? ''}}">
                                            عرض في الخريطة
                                        </a> 
                                    </span>
                                </div>
                                <!-- End address --> 

                                <!-- management_statuses -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4">الحالة الاداريه للطلب </span>
                                    <span
                                        class="font-20  text-primary text-start bold c4 ml-4">{{ $beneficiary->building ? \App\Models\Building::MANAGEMENT_STATUSES_SELECT[$beneficiary->building->management_statuses] : ''}}</span>
                                </div>
                                <!-- End management_statuses -->
                            </div>
                            <div class="col-lg-4">
                                <!-- stages -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4">المرحله للطلب</span>
                                    <span
                                        class="font-20  text-primary text-start bold c4 ml-4">{{ $beneficiary->building ? \App\Models\Building::STAGES_SELECT[$beneficiary->building->stages] : '' }}</span>
                                </div>
                                <!-- End stages --> 

                                <!-- building_photos -->
                                <div class="review-list mb-20">
                                    <span class="font-14 bold c4 ml-4"> صور المبني </span>
                                    <span class=" ml-4">
                                        @foreach ($beneficiary->building->building_photos as $key => $media)
                                            <div class="row justifiy-content-between  ">
                                                <img src="{{ $media->getUrl() }}" alt="identity photos" class="w-50">
                                            </div>
                                            <br>
                                        @endforeach
                                    </span>
                                </div>
                                <!-- End building_photos -->
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
                    <div class="card-body">
                        <div class="container  w-25  p-2 border-success border-bottom">
                            <h2 class=" m-auto   text-primary text-start mb-20 text-center">بيانات الوحدات</h2>
                        </div>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#needsModel"
                            style="display: inline-block; padding: 5px 10px; margin-bottom:10px; background-color: #3B9B89; color: white; font-size: 12px; border-radius: 4px; text-decoration: none;">
                            اضافة وحده لاحتياجات المستفيد
                        </button>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>{{ trans('cruds.beneficiaryNeed.fields.unit') }}</th>
                                    <th>{{ trans('cruds.beneficiaryNeed.fields.description') }}</th>
                                    <th>{{ trans('cruds.beneficiaryNeed.fields.trmem_type') }}</th>
                                    <th>{{ trans('cruds.beneficiaryNeed.fields.photos_before') }}</th>
                                    <th>{{ trans('cruds.beneficiaryNeed.fields.photos_after') }}</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($beneficiary->beneficiaryBeneficiaryNeeds as $Needs)
                                    <tr>
                                        <td>{{ $Needs->unit->name }}</td>
                                        <td>{{ $Needs->description }}</td>
                                        <td>{{ $Needs->trmem_type }}</td>
                                        <td>
                                            <div class="container">
                                                @foreach ($Needs->photos_before as $key => $media)
                                                    <img src="{{ $media->getUrl('thumb') }}" alt="identity photos ">
                                                @endforeach
                                            </div>
                                        </td>
                                        <td>
                                            <div class="container">
                                                @foreach ($Needs->photos_after as $key => $media)
                                                    <img src="{{ $media->getUrl('thumb') }}" alt="identity photos ">
                                                @endforeach
                                            </div>
                                        </td>
                                        <td>
                                            <button class="btn btn-danger deleteUnit"
                                                data-beneficiary-need-id="{{ $Needs->id }}"
                                                data-delete-need-url="{{ route('organization.beneficiary-needs.delete', $Needs->id) }}">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
        <!---  beneficiaryy Family  -->
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card mb30">
                    <div class="card-body mb-30">
                        <div class="container  w-25  p-2 border-success border-bottom">
                            <h2 class=" m-auto  text-primary text-start mb-20 text-center">بيانات الاسره </h2>
                        </div>

                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#familyModel"
                            style="display: inline-block; padding: 5px 10px; margin-bottom:10px; background-color: #3B9B89; color: white; font-size: 12px; border-radius: 4px; text-decoration: none;">
                            اضافة فرد لاسرة المستفيد
                        </button>
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
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
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
                                        <td>{{ $person->job_sallary }}</td>
                                        <td>{{ $person->familyrelation->name }}</td>
                                        <td>
                                            <button class="btn btn-danger deleteFamilyMember"
                                                data-family-member-id="{{ $person->id }}"
                                                data-beneficiary-id={{ $beneficiary->id }}
                                                data-delete-url="{{ route('organization.beneficiary-families.destroy', $person->id) }}">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('organization.familypopup', ['beneficiary_id' => $beneficiary->id])
    @include('organization.needspopup', ['beneficiary_id' => $beneficiary->id])
@endsection
@section('scripts')
    <!-- ======= BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS ======= -->
    <script src="{{ asset('frontend/plugins/apex/apexcharts.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/apex/custom-apexcharts.js') }}"></script>
    <!-- ======= End BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS ======= -->
    <script>
        var uploadedIdentityPhotosMap = {}
        Dropzone.options.identityPhotosDropzone = {
            url: '{{ route('organization.beneficiary-families.storeMedia') }}',
            maxFilesize: 4, // MB
            acceptedFiles: '.jpeg,.jpg,.png,.gif',
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 4,
                width: 4096,
                height: 4096
            },
            success: function(file, response) {
                $('form').append('<input type="hidden" name="identity_photos[]" value="' + response.name + '">')
                uploadedIdentityPhotosMap[file.name] = response.name
            },
            removedfile: function(file) {
                console.log(file)
                file.previewElement.remove()
                var name = ''
                if (typeof file.file_name !== 'undefined') {
                    name = file.file_name
                } else {
                    name = uploadedIdentityPhotosMap[file.name]
                }
                $('form').find('input[name="identity_photos[]"][value="' + name + '"]').remove()
            },
            init: function() {
                @if (isset($beneficiaryFamily) && $beneficiaryFamily->identity_photos)
                    var files = {!! json_encode($beneficiaryFamily->identity_photos) !!}
                    for (var i in files) {
                        var file = files[i]
                        this.options.addedfile.call(this, file)
                        this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
                        file.previewElement.classList.add('dz-complete')
                        $('form').append('<input type="hidden" name="identity_photos[]" value="' + file.file_name +
                            '">')
                    }
                @endif
            },
            error: function(file, response) {
                if ($.type(response) === 'string') {
                    var message = response //dropzone sends it's own error messages in string
                } else {
                    var message = response.errors.file
                }
                file.previewElement.classList.add('dz-error')
                _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
                _results = []
                for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                    node = _ref[_i]
                    _results.push(node.textContent = message)
                }

                return _results
            }
        }
    </script>
    {{-- delete family member  --}}
    <script>
        $(document).ready(function() {
            $(".deleteFamilyMember").click(function() {
                var familyMemberId = $(this).data('family-member-id');
                var beneficiary = $(this).data('beneficiary-id');
                var deleteUrl = $(this).data('delete-url');
                var self = this; // Store a reference to the outer 'this'

                if (confirm("Are you sure you want to delete this family member?")) {
                    $.ajax({
                        type: "POST",
                        url: deleteUrl,
                        data: {
                            member: familyMemberId,
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
    {{-- delete unit --}}
    <script>
        $(document).ready(function() {
            $(".deleteUnit").click(function() {
                var BeneficiaryNeedId = $(this).data('beneficiary-need-id');
                var deleteUrl = $(this).data('delete-need-url');
                var self = this; // Store a reference to the outer 'this'

                if (confirm("Are you sure you want to delete this family member?")) {
                    $.ajax({
                        type: "POST",
                        url: deleteUrl,
                        data: {
                            beneficiaryNeed_id: BeneficiaryNeedId,
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
    <script>
        var uploadedPhotosBeforeMap = {}
        Dropzone.options.photosBeforeDropzone = {
            url: '{{ route('organization.beneficiary-needs.storeMedia') }}',
            maxFilesize: 2, // MB
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 2
            },
            success: function(file, response) {
                $('form').append('<input type="hidden" name="photos_before[]" value="' + response.name + '">')
                uploadedPhotosBeforeMap[file.name] = response.name
            },
            removedfile: function(file) {
                file.previewElement.remove()
                var name = ''
                if (typeof file.file_name !== 'undefined') {
                    name = file.file_name
                } else {
                    name = uploadedPhotosBeforeMap[file.name]
                }
                $('form').find('input[name="photos_before[]"][value="' + name + '"]').remove()
            },
            init: function() {
                @if (isset($beneficiaryNeed) && $beneficiaryNeed->photos_before)
                    var files =
                        {!! json_encode($beneficiaryNeed->photos_before) !!}
                    for (var i in files) {
                        var file = files[i]
                        this.options.addedfile.call(this, file)
                        file.previewElement.classList.add('dz-complete')
                        $('form').append('<input type="hidden" name="photos_before[]" value="' + file.file_name +
                            '">')
                    }
                @endif
            },
            error: function(file, response) {
                if ($.type(response) === 'string') {
                    var message = response //dropzone sends it's own error messages in string
                } else {
                    var message = response.errors.file
                }
                file.previewElement.classList.add('dz-error')
                _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
                _results = []
                for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                    node = _ref[_i]
                    _results.push(node.textContent = message)
                }

                return _results
            }
        }
    </script>
    <script>
        var uploadedPhotosAfterMap = {}
        Dropzone.options.photosAfterDropzone = {
            url: '{{ route('organization.beneficiary-needs.storeMedia') }}',
            maxFilesize: 2, // MB
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 2
            },
            success: function(file, response) {
                $('form').append('<input type="hidden" name="photos_after[]" value="' + response.name + '">')
                uploadedPhotosAfterMap[file.name] = response.name
            },
            removedfile: function(file) {
                file.previewElement.remove()
                var name = ''
                if (typeof file.file_name !== 'undefined') {
                    name = file.file_name
                } else {
                    name = uploadedPhotosAfterMap[file.name]
                }
                $('form').find('input[name="photos_after[]"][value="' + name + '"]').remove()
            },
            init: function() {
                @if (isset($beneficiaryNeed) && $beneficiaryNeed->photos_after)
                    var files =
                        {!! json_encode($beneficiaryNeed->photos_after) !!}
                    for (var i in files) {
                        var file = files[i]
                        this.options.addedfile.call(this, file)
                        file.previewElement.classList.add('dz-complete')
                        $('form').append('<input type="hidden" name="photos_after[]" value="' + file.file_name +
                            '">')
                    }
                @endif
            },
            error: function(file, response) {
                if ($.type(response) === 'string') {
                    var message = response //dropzone sends it's own error messages in string
                } else {
                    var message = response.errors.file
                }
                file.previewElement.classList.add('dz-error')
                _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
                _results = []
                for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                    node = _ref[_i]
                    _results.push(node.textContent = message)
                }

                return _results
            }
        }
    </script>
@endsection
