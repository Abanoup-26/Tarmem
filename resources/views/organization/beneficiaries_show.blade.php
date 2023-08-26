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
                                        class="font-20  text-primary text-start bold c4 ml-4">{{ $beneficiary->job_status }}</span>
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
                                        class="font-20  text-primary text-start bold c4 ml-4">{{ $beneficiary->marital_status }}</span>
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
                                        {{ $beneficiary->illness_status }} - {{ $beneficiary->illness_type->name }}</span>
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
                    @foreach ($beneficiary->beneficiaryBeneficiaryNeeds->where('beneficiary_id', $beneficiary->id) as $Needs)
                        <!-- Needs-->
                        <div class="card-body p-30">
                            <div class="container  w-25  p-2 border-success border-bottom">
                                <h2 class=" m-auto  text-primary text-start mb-20 text-center">بيانات المبنى</h2>
                            </div>
                            <div class="row m-5">
                                <!-- Unit -->
                                <div class="review-list mb-20 col-4">
                                    <span class="font-14 bold c4 ml-4"> الوحده</span>
                                    <span
                                        class="font-20  text-primary text-start bold c4 ml-4">{{ $Needs->unit->name }}</span>
                                </div>
                                <!-- End Unit -->

                                <!-- Tarmem-type -->
                                <div class="review-list mb-20 col-4">
                                    <span class="font-14 bold c4 ml-4"> الاحتياج اللازم من جمعية ترميم </span>
                                    <span
                                        class="font-20  text-primary text-start bold c4 ml-4">{{ $Needs->trmem_type }}</span>
                                </div>
                                <!-- End Tarmem-type -->

                                <!-- Description -->
                                <div class="review-list mb-20 col-4">
                                    <span class="font-14 bold c4 ml-4"> التفاصيل كامله</span>
                                    <span
                                        class="font-20  text-primary text-start bold c4 ml-4">{{ $Needs->description }}</span>
                                </div>
                                <!-- End Description -->

                            </div>
                            <div class=" row m-auto  ">
                                <!-- photos before -->
                                <div class="  review-list mb-20 ">
                                    <h3 class="font-18 bold c4 ms-4 text-center mb-5 "> صور قبل الترميم</h3>
                                    <span class="font-20 bold c4 ml-4">
                                        <div class="  row justify-content-center ">
                                            @foreach ($Needs->photos_before as $key => $media)
                                                <div class="col-4">
                                                    <img src="{{ $media->getUrl() }}" alt="Building Photos before Tarmem"
                                                        class="w-75">
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
        <!---  beneficiaryy Family  -->
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card mb30">
                    <div class="card-body mb-30">
                        <div class="container  w-25  p-2 border-success border-bottom">
                            <h2 class=" m-auto  text-primary text-start mb-20 text-center">بيانات الاسره </h2>
                        </div>
                        {{-- <div class="row mt-4">
                                <div class="col-lg-4">
                                    <!-- name -->
                                    <div class="review-list mb-20">
                                        <span class="font-14 bold c4 ml-4">الاسم</span>
                                        <span class="font-20  text-primary text-start bold c4 ml-4"> {{$person->name}}</span>
                                    </div>
                                    <!-- End name -->

                                    <!-- birth_date -->
                                    <div class="review-list mb-20">
                                        <span class="font-14 bold c4 ml-4">تاريخ انشاء المبني</span>
                                        <span class="font-20  text-primary text-start bold c4 ml-4">{{$person->birth_date}}</span>
                                    </div>
                                    <!-- End birth_date -->

                                    <!-- identity_number -->
                                    <div class="review-list mb-20">
                                        <span class="font-14 bold c4 ml-4">رقم الهويه</span>
                                        <span class="font-20  text-primary text-start bold c4 ml-4">{{$person->identity_number}}<span>
                                    </div>
                                    <!-- End identity_number -->

                                    <!-- qualifications -->
                                    <div class="review-list mb-20">
                                        <span class="font-14 bold c4 ml-4">المؤهل الدراسي </span>
                                        <span class="font-20  text-primary text-start bold c4 ml-4">{{$person->qualifications}}</span>
                                    </div>
                                    <!-- End qualifications -->



                                </div>
                                <div class="col-lg-4">
                                    <!-- marital_status -->
                                    <div class="review-list mb-20">
                                        <span class="font-14 bold c4 ml-4"> الحاله الاجتماعيه</span>
                                        <span class="font-20  text-primary text-start bold c4 ml-4">{{$person->marital_status}}</span>
                                    </div>
                                    <!-- End marital_status -->

                                    <!-- illness_status -->
                                    <div class="review-list mb-20">
                                        <span class="font-14 bold c4 ml-4">الحاله الصحيه  </span>
                                        <span class="font-20  text-primary text-start bold c4 ml-4">{{$person->illness_status}}</span>
                                    </div>
                                    <!-- End illness_status -->
                                    <!-- illness_type -->
                                    <div class="review-list mb-20">
                                        <span class="font-14 bold c4 ml-4">نوع المرض  </span>
                                        <span class="font-20  text-primary text-start bold c4 ml-4">{{$person->illness_type->name}}</span>
                                    </div>
                                    <!-- End illness_type -->
                                </div>
                                <div class="col-lg-4">


                                    <!-- job_status -->
                                    <div class="review-list mb-20">
                                        <span class="font-14 bold c4 ml-4">الحالة الوظيفيه </span>
                                        <span class="font-20  text-primary text-start bold c4 ml-4">{{$person->job_status}}</span>
                                    </div>
                                    <!-- End job_status -->

                                    <!-- job_salary -->
                                    <div class="review-list mb-20">
                                        <span class="font-14 bold c4 ml-4">الراتب </span>
                                        <span class="font-20  text-primary text-start bold c4 ml-4">{{$person->job_salary}}</span>
                                    </div>
                                    <!-- End job_salary -->

                                    <!-- familyrelation -->
                                    <div class="review-list mb-20">
                                        <span class="font-14 bold c4 ml-4">صلة القرابه  </span>
                                        <span class="font-20  text-primary text-start bold c4 ml-4"> {{$person->familyrelation->name}}</span>
                                    </div>
                                    <!-- End familyrelation -->
                                </div>
                            </div> --}}
                        {{-- <a class="justify-content-end" href="exampleModal"
                           >اضافة
                            فرد لاسرة المستفيد
                        </a> --}}
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
@endsection
