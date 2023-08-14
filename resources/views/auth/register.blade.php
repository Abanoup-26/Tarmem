@extends('layouts.app')
@section('content')
<div class="mn-vh-100 d-flex align-items-center">
    <div class="container">
        <!-- Card -->
        <div class="card justify-content-center auth-card">
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="logo mb-20"><img src="{{asset('frontend/img/logo.png')}}"></div>
                    @if($errors->count() > 0)
                    <div class="alert alert-danger">
                        <ul class="list-unstyled">
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action="{{route('register')}}" method="post">
                        @csrf
                        <div class="row">
                            <!----Organization data --->
                            <div class="col-md-6">
                                <div class="bg-c2-light profile-widget-header mb-20">
                                    <h4 class="text-center">
                                        بيانات الجهه
                                    </h4>
                                </div>

                                <!-- Organization name -->
                                <div class="form-group mb-20">
                                    <label class="mb-2 font-14 bold black required" for="name">{{
                                        trans('cruds.organization.fields.organization_name')
                                        }}</label>
                                    <input
                                        class="theme-input-style form-control  {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                        type="text" name="organization_name" id="organization_name"
                                        value="{{ old('name', '') }}">
                                    @if ($errors->has('name'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('name') }}
                                    </div>
                                    @endif
                                    <span class="help-block">{{
                                        trans('cruds.organization.fields.organization_name_helper') }}</span>
                                </div>
                                <!-- End Organization name -->

                                <!-- Organization Type -->
                                <div class="form-group mb-4">
                                    <label class="required mb-2 font-14 bold black " for="organization_type_id">{{
                                        trans('cruds.organization.fields.organization_type') }}</label>
                                    <select
                                        class=" theme-input-style form-control select2 {{ $errors->has('organization_type') ? 'is-invalid' : '' }}"
                                        name="organization_type_id" id="organization_type_id" required>
                                        @foreach ($organization_types as $id => $entry)
                                        <option value="{{ $id }}" {{ old('organization_type_id')==$id ? 'selected' : ''
                                            }}>{{ $entry }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('organization_type'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('organization_type') }}
                                    </div>
                                    @endif
                                    <span class="help-block">{{
                                        trans('cruds.organization.fields.organization_type_helper') }}</span>
                                </div>
                                <!-- End Organization Type -->

                                <!-- Website -->
                                <div class="form-group mb-20">
                                    <label class="required mb-2 font-14 bold black" for="website">{{
                                        trans('cruds.organization.fields.website') }}</label>
                                    <input
                                        class=" theme-input-style form-control {{ $errors->has('website') ? 'is-invalid' : '' }}"
                                        type="text" name="website" id="website" value="{{ old('website', '') }}"
                                        required>
                                    @if ($errors->has('website'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('website') }}
                                    </div>
                                    @endif
                                    <span class="help-block">{{
                                        trans('cruds.organization.fields.website_helper') }}</span>
                                </div>
                                <!-- End Website -->

                                <!-- Phone Number -->
                                <div class="form-group mb-20">
                                    <label class="mb-2 font-14 bold black" for="phone_number">{{
                                        trans('cruds.organization.fields.phone_number')
                                        }}</label>
                                    <input
                                        class=" theme-input-style form-control {{ $errors->has('phone_number') ? 'is-invalid' : '' }}"
                                        type="text" name="phone_number" id="phone_number"
                                        value="{{ old('phone_number', '') }}">
                                    @if ($errors->has('phone_number'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('phone_number') }}
                                    </div>
                                    @endif
                                    <span class="help-block">{{
                                        trans('cruds.organization.fields.phone_number_helper') }}</span>
                                </div>
                                <!-- End Phone Number -->

                                <!-- Mobile Number -->
                                <div class="form-group mb-20">
                                    <label class="mb-2 font-14 bold black" for="organization_mobile_number">{{
                                        trans('cruds.organization.fields.mobile_number')
                                        }}</label>
                                    <input class="form-control {{ $errors->has('mobile_number') ? 'is-invalid' : '' }}"
                                        type="text" name="organization_mobile_number" id="organization_mobile_number"
                                        value="{{ old('mobile_number', '') }}">
                                    @if ($errors->has('mobile_number'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('mobile_number') }}
                                    </div>
                                    @endif
                                    <span class="help-block">{{
                                        trans('cruds.organization.fields.mobile_number_helper') }}</span>
                                </div>
                                <!-- End Mobile Number -->

                                <!-- Commercial Record -->
                                <div class="form-group mb-20  ">
                                    <label class="mb-2 font-14 bold black required" for="commercial_record">{{
                                        trans('cruds.organization.fields.commercial_record') }}</label>
                                    <div class="needsclick dropzone style--three {{ $errors->has('commercial_record') ? 'is-invalid' : '' }}"
                                        id="commercial_record-dropzone">
                                    </div>
                                    @if ($errors->has('commercial_record'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('commercial_record') }}
                                    </div>
                                    @endif
                                    <span class="help-block">{{
                                        trans('cruds.organization.fields.commercial_record_helper') }}</span>
                                </div>
                                <!-- End Commercial Record -->

                                <!-- Partnership Agreement -->
                                <div class="form-group mb-20">
                                    <label class="required mb-2 font-14 bold black" for="partnership_agreement">{{
                                        trans('cruds.organization.fields.partnership_agreement') }}</label>
                                    <div class="needsclick dropzone  style--three {{ $errors->has('partnership_agreement') ? 'is-invalid' : '' }}"
                                        id="partnership_agreement-dropzone">
                                    </div>
                                    @if ($errors->has('partnership_agreement'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('partnership_agreement') }}
                                    </div>
                                    @endif
                                    <span class="help-block">{{
                                        trans('cruds.organization.fields.partnership_agreement_helper')
                                        }}</span>
                                    <!-- End Partnership Agreement -->
                                </div>
                            </div>
                            <!---- OrganiztaionUser data --->
                            <div class="col-md-6">
                                <div class="bg-c2-light profile-widget-header mb-20">
                                    <h4 class="text-center">
                                        بيانات المفوض
                                    </h4>
                                </div>
                                <!-- User Name -->
                                <div class="form-group mb-20">
                                    <label class=" mb-2 font-14 bold black required" for="name">{{
                                        trans('cruds.user.fields.name')
                                        }}</label>
                                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                        type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                                    @if ($errors->has('name'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('name') }}
                                    </div>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.user.fields.name_helper')
                                        }}</span>
                                </div>
                                <!-- End User Name -->

                                <!-- User Email -->
                                <div class="form-group mb-20">
                                    <label class=" mb-2 font-14 bold black required" for="email">{{
                                        trans('cruds.user.fields.email')
                                        }}</label>
                                    <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                        type="email" name="email" id="email" value="{{ old('email') }}" required>
                                    @if ($errors->has('email'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('email') }}
                                    </div>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.user.fields.email_helper')
                                        }}</span>
                                </div>
                                <!-- End User Email -->

                                <!--  Password -->
                                <div class="form-group mb-20">
                                    <label class=" mb-2 font-14 bold black required" for="password">{{
                                        trans('cruds.user.fields.password') }}</label>
                                    <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                        type="password" name="password" id="password" required>
                                    @if ($errors->has('password'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('password') }}
                                    </div>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.user.fields.password_helper')
                                        }}</span>
                                </div>
                                <!-- End Password -->

                                <!-- Position -->
                                <div class="form-group mb-20">
                                    <label class="mb-2 font-14 bold black" for="position">{{
                                        trans('cruds.user.fields.position') }}</label>
                                    <input class="form-control {{ $errors->has('position') ? 'is-invalid' : '' }}"
                                        type="text" name="position" id="position" value="{{ old('position', '') }}">
                                    @if ($errors->has('position'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('position') }}
                                    </div>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.user.fields.position_helper')
                                        }}</span>
                                </div>
                                <!-- End Position -->

                                <!-- Mobile Number -->
                                <div class="form-group mb-20">
                                    <label class="mb-2 font-14 bold black" for="mobile_number">{{
                                        trans('cruds.user.fields.mobile_number')
                                        }}</label>
                                    <input class="form-control {{ $errors->has('mobile_number') ? 'is-invalid' : '' }}"
                                        type="text" name="mobile_number" id="mobile_number"
                                        value="{{ old('mobile_number', '') }}">
                                    @if ($errors->has('mobile_number'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('mobile_number') }}
                                    </div>
                                    @endif
                                    <span class="help-block">{{
                                        trans('cruds.user.fields.mobile_number_helper') }}</span>
                                </div>
                                <!-- End Mobile Number -->

                                <!-- Identity photo -->
                                <div class="form-group  mb-20 ">
                                    <label class="mb-2 font-14 bold black" for="identity_photos">{{
                                        trans('cruds.user.fields.identity_photos') }}</label>
                                    <div class="needsclick dropzone style--three {{ $errors->has('identity_photos') ? 'is-invalid' : '' }}"
                                        id="identity_photos-dropzone">
                                    </div>
                                    @if ($errors->has('identity_photos'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('identity_photos') }}
                                    </div>
                                    @endif
                                    <span class="help-block">{{
                                        trans('cruds.user.fields.identity_photos_helper') }}</span>
                                </div>
                                <!-- End Identity photo -->
                            </div>
                        </div>

                        <div class="row justify-content-center pt-4">
                            <button type="submit" class="btn long ml-20 col-4">تسجيل</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Card -->
    </div>
</div>

@endsection

@section('scripts')
<script>
    Dropzone.options.commercialRecordDropzone = {
            url: '{{ route('frontend.organizations.storeMedia') }}',
            maxFilesize: 2, // MB
            maxFiles: 1,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 2
            },
            success: function(file, response) {
                $('form').find('input[name="commercial_record"]').remove()
                $('form').append('<input type="hidden" name="commercial_record" value="' + response.name + '">')
            },
            removedfile: function(file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="commercial_record"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function() {
                @if (isset($organization) && $organization->commercial_record)
                    var file = {!! json_encode($organization->commercial_record) !!}
                    this.options.addedfile.call(this, file)
                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input type="hidden" name="commercial_record" value="' + file.file_name +
                        '">')
                    this.options.maxFiles = this.options.maxFiles - 1
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
    Dropzone.options.partnershipAgreementDropzone = {
            url: '{{ route('frontend.organizations.storeMedia') }}',
            maxFilesize: 2, // MB
            maxFiles: 1,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 2
            },
            success: function(file, response) {
                $('form').find('input[name="partnership_agreement"]').remove()
                $('form').append('<input type="hidden" name="partnership_agreement" value="' + response.name + '">')
            },
            removedfile: function(file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="partnership_agreement"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function() {
                @if (isset($organization) && $organization->partnership_agreement)
                    var file = {!! json_encode($organization->partnership_agreement) !!}
                    this.options.addedfile.call(this, file)
                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input class="btn style--two " type="hidden" name="partnership_agreement" value="' + file.file_name +
                        '">')
                    this.options.maxFiles = this.options.maxFiles - 1
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
    var uploadedIdentityPhotosMap = {}
        Dropzone.options.identityPhotosDropzone = {
            url: '{{ route('frontend.users.storeMedia') }}',
            maxFilesize: 2, // MB
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 2
            },
            success: function(file, response) {
                $('form').append('<input type="hidden" name="identity_photos[]" value="' + response.name + '">')
                uploadedIdentityPhotosMap[file.name] = response.name
            },
            removedfile: function(file) {
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
                @if (isset($user) && $user->identity_photos)
                    var files =
                        {!! json_encode($user->identity_photos) !!}
                    for (var i in files) {
                        var file = files[i]
                        this.options.addedfile.call(this, file)
                        file.previewElement.classList.add('dz-complete')
                        $('form').append('<input class="btn style--two " type="hidden" name="identity_photos[]" value="' + file.file_name +
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