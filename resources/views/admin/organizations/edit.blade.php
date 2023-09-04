@extends('layouts.admin')
@section('content')
    <form method="POST" action="{{ route('admin.organizations.update', [$organization->id]) }}" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="row">
            <input type="hidden" name="user_id" value="{{ $organization->user_id }}">
            <div class="col-6">
                {{-- organizaion --}}
                <div class="card">
                    <div class="card-header">
                        بيانات الجهة
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="required"
                                    for="name">{{ trans('cruds.organization.fields.organization_name') }}</label>
                                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text"
                                    name="organization_name" id="organization_name"
                                    value="{{ old('name', $organization->name) }}" required>
                                @if ($errors->has('name'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('name') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.user.fields.name_helper') }}</span>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="required"
                                    for="website">{{ trans('cruds.organization.fields.website') }}</label>
                                <input class="form-control {{ $errors->has('website') ? 'is-invalid' : '' }}" type="text"
                                    name="website" id="website" value="{{ old('website', $organization->website) }}"
                                    required>
                                @if ($errors->has('website'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('website') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.organization.fields.website_helper') }}</span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="mobile_number">{{ trans('cruds.organization.fields.mobile_number') }}</label>
                                <input class="form-control {{ $errors->has('mobile_number') ? 'is-invalid' : '' }}"
                                    type="text" name="mobile_number" id="mobile_number"
                                    value="{{ old('mobile_number', $organization->mobile_number) }}">
                                @if ($errors->has('mobile_number'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('mobile_number') }}
                                    </div>
                                @endif
                                <span
                                    class="help-block">{{ trans('cruds.organization.fields.mobile_number_helper') }}</span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="phone_number">{{ trans('cruds.organization.fields.phone_number') }}</label>
                                <input class="form-control {{ $errors->has('phone_number') ? 'is-invalid' : '' }}"
                                    type="text" name="phone_number" id="phone_number"
                                    value="{{ old('phone_number', $organization->phone_number) }}">
                                @if ($errors->has('phone_number'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('phone_number') }}
                                    </div>
                                @endif
                                <span
                                    class="help-block">{{ trans('cruds.organization.fields.phone_number_helper') }}</span>
                            </div>
                            <div class="form-group col-md-6 mt-5">
                                <label class="required"
                                    for="organization_type_id">{{ trans('cruds.organization.fields.organization_type') }}</label>
                                <select
                                    class="form-control select2 {{ $errors->has('organization_type') ? 'is-invalid' : '' }}"
                                    name="organization_type_id" id="organization_type_id" required>
                                    @foreach ($organization_types as $id => $entry)
                                        <option value="{{ $id }}"
                                            {{ (old('organization_type_id') ? old('organization_type_id') : $organization->organization_type->id ?? '') == $id ? 'selected' : '' }}>
                                            {{ $entry }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('organization_type'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('organization_type') }}
                                    </div>
                                @endif
                                <span
                                    class="help-block">{{ trans('cruds.organization.fields.organization_type_helper') }}</span>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="required"
                                    for="logo">{{ trans('cruds.organization.fields.logo') }}</label>
                                <div class="needsclick dropzone {{ $errors->has('logo') ? 'is-invalid' : '' }}"
                                    id="logo-dropzone">
                                </div>
                                @if ($errors->has('logo'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('logo') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.organization.fields.logo_helper') }}</span>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="required"
                                    for="commercial_record">{{ trans('cruds.organization.fields.commercial_record') }}</label>
                                <div class="needsclick dropzone {{ $errors->has('commercial_record') ? 'is-invalid' : '' }}"
                                    id="commercial_record-dropzone">
                                </div>
                                @if ($errors->has('commercial_record'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('commercial_record') }}
                                    </div>
                                @endif
                                <span
                                    class="help-block">{{ trans('cruds.organization.fields.commercial_record_helper') }}</span>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="required"
                                    for="partnership_agreement">{{ trans('cruds.organization.fields.partnership_agreement') }}</label>
                                <div class="needsclick dropzone {{ $errors->has('partnership_agreement') ? 'is-invalid' : '' }}"
                                    id="partnership_agreement-dropzone">
                                </div>
                                @if ($errors->has('partnership_agreement'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('partnership_agreement') }}
                                    </div>
                                @endif
                                <span
                                    class="help-block">{{ trans('cruds.organization.fields.partnership_agreement_helper') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        بيانات المفوض
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label class="required" for="name">{{ trans('cruds.user.fields.name') }}</label>
                                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text"
                                    name="name" id="name" value="{{ old('name', $organization->user->name) }}"
                                    required>
                                @if ($errors->has('name'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('name') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.user.fields.name_helper') }}</span>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="required" for="email">{{ trans('cruds.user.fields.email') }}</label>
                                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email"
                                    name="email" id="email" value="{{ old('email', $organization->user->email) }}"
                                    required>
                                @if ($errors->has('email'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('email') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.user.fields.email_helper') }}</span>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="required" for="password">{{ trans('cruds.user.fields.password') }}</label>
                                <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                    type="password" name="password" id="password">
                                @if ($errors->has('password'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('password') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.user.fields.password_helper') }}</span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="position">{{ trans('cruds.user.fields.position') }}</label>
                                <input class="form-control {{ $errors->has('position') ? 'is-invalid' : '' }}"
                                    type="text" name="position" id="position"
                                    value="{{ old('position', $organization->user->position) }}">
                                @if ($errors->has('position'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('position') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.user.fields.position_helper') }}</span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="mobile_number">{{ trans('cruds.user.fields.mobile_number') }}</label>
                                <input class="form-control {{ $errors->has('mobile_number') ? 'is-invalid' : '' }}"
                                    type="text" name="mobile_number" id="mobile_number"
                                    value="{{ old('mobile_number', $organization->user->mobile_number) }}">
                                @if ($errors->has('mobile_number'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('mobile_number') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.user.fields.mobile_number_helper') }}</span>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="identity_photos">{{ trans('cruds.user.fields.identity_photos') }}</label>
                                <div class="needsclick dropzone {{ $errors->has('identity_photos') ? 'is-invalid' : '' }}"
                                    id="identity_photos-dropzone">
                                </div>
                                @if ($errors->has('identity_photos'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('identity_photos') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.user.fields.identity_photos_helper') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <button class="btn btn-danger btn-block" type="submit">
                {{ trans('global.save') }}
            </button>
        </div>
    </form>
@endsection

@section('scripts')
    <script>
        Dropzone.options.commercialRecordDropzone = {
            url: '{{ route('admin.organizations.storeMedia') }}',
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
            url: '{{ route('admin.organizations.storeMedia') }}',
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
                    $('form').append('<input type="hidden" name="partnership_agreement" value="' + file.file_name +
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
            url: '{{ route('admin.users.storeMedia') }}',
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
                @if (isset($organization->user) && $organization->user->identity_photos)
                    var files =
                        {!! json_encode($organization->user->identity_photos) !!}
                    for (var i in files) {
                        var file = files[i]
                        this.options.addedfile.call(this, file)
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
        Dropzone.options.logoDropzone = {
            url: '{{ route('admin.organizations.storeMedia') }}',
            maxFilesize: 2, // MB
            acceptedFiles: '.jpeg,.jpg,.png,.gif',
            maxFiles: 1,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 2,
                width: 4096,
                height: 4096
            },
            success: function(file, response) {
                $('form').find('input[name="logo"]').remove()
                $('form').append('<input type="hidden" name="logo" value="' + response.name + '">')
            },
            removedfile: function(file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="logo"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function() {
                @if (isset($organization) && $organization->logo)
                    var file = {!! json_encode($organization->logo) !!}
                    this.options.addedfile.call(this, file)
                    this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input type="hidden" name="logo" value="' + file.file_name + '">')
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
@endsection
