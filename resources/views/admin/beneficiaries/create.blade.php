@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.beneficiary.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.beneficiaries.store') }}" enctype="multipart/form-data">
                @csrf
                <!--- name-->
                <div class="form-group">
                    <label class="required" for="name">{{ trans('cruds.beneficiary.fields.name') }}</label>
                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name"
                        id="name" value="{{ old('name', '') }}" required>
                    @if ($errors->has('name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.beneficiary.fields.name_helper') }}</span>
                </div>
                <!--- birth_date-->
                <div class="form-group">
                    <label class="required" for="birth_date">{{ trans('cruds.beneficiary.fields.birth_date') }}</label>
                    <input class="form-control date {{ $errors->has('birth_date') ? 'is-invalid' : '' }}" type="text"
                        name="birth_date" id="birth_date" value="{{ old('birth_date') }}" required>
                    @if ($errors->has('birth_date'))
                        <div class="invalid-feedback">
                            {{ $errors->first('birth_date') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.beneficiary.fields.birth_date_helper') }}</span>
                </div>
                <!---  identity_number-->
                <div class="form-group">
                    <label class="required"
                        for="identity_number">{{ trans('cruds.beneficiary.fields.identity_number') }}</label>
                    <input class="form-control {{ $errors->has('identity_number') ? 'is-invalid' : '' }}" type="text"
                        name="identity_number" id="identity_number" value="{{ old('identity_number', '') }}" required>
                    @if ($errors->has('identity_number'))
                        <div class="invalid-feedback">
                            {{ $errors->first('identity_number') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.beneficiary.fields.identity_number_helper') }}</span>
                </div>
                <!---  identity_photo-->
                <div class="form-group">
                    <label class="required"
                        for="identity_photo">{{ trans('cruds.beneficiary.fields.identity_photo') }}</label>
                    <div class="needsclick dropzone {{ $errors->has('identity_photo') ? 'is-invalid' : '' }}"
                        id="identity_photo-dropzone">
                    </div>
                    @if ($errors->has('identity_photo'))
                        <div class="invalid-feedback">
                            {{ $errors->first('identity_photo') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.beneficiary.fields.identity_photo_helper') }}</span>
                </div>
                <!---  qualifications-->
                <div class="form-group">
                    <label class="required"
                        for="qualifications">{{ trans('cruds.beneficiary.fields.qualifications') }}</label>
                    <input class="form-control {{ $errors->has('qualifications') ? 'is-invalid' : '' }}" type="text"
                        name="qualifications" id="qualifications" value="{{ old('qualifications', '') }}" required>
                    @if ($errors->has('qualifications'))
                        <div class="invalid-feedback">
                            {{ $errors->first('qualifications') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.beneficiary.fields.qualifications_helper') }}</span>
                </div>
                <!---  job_status-->
                <div class="form-group">
                    <label class="required">{{ trans('cruds.beneficiary.fields.job_status') }}</label>
                    @foreach (App\Models\Beneficiary::JOB_STATUS_RADIO as $key => $label)
                        <div class="form-check {{ $errors->has('job_status') ? 'is-invalid' : '' }}">
                            <input class="form-check-input" type="radio" id="job_status_{{ $key }}"
                                name="job_status" value="{{ $key }}"
                                {{ old('job_status', '') === (string) $key ? 'checked' : '' }} required>
                            <label class="form-check-label"
                                for="job_status_{{ $key }}">{{ $label }}</label>
                        </div>
                    @endforeach
                    @if ($errors->has('job_status'))
                        <div class="invalid-feedback">
                            {{ $errors->first('job_status') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.beneficiary.fields.job_status_helper') }}</span>
                </div>
                <!---  job_title-->
                <div class="form-group">
                    <label for="job_title">{{ trans('cruds.beneficiary.fields.job_title') }}</label>
                    <input class="form-control {{ $errors->has('job_title') ? 'is-invalid' : '' }}" type="text"
                        name="job_title" id="job_title" value="{{ old('job_title', '') }}">
                    @if ($errors->has('job_title'))
                        <div class="invalid-feedback">
                            {{ $errors->first('job_title') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.beneficiary.fields.job_title_helper') }}</span>
                </div>
                <!---  job_salary-->
                <div class="form-group">
                    <label for="job_salary">{{ trans('cruds.beneficiary.fields.job_salary') }}</label>
                    <input class="form-control {{ $errors->has('job_salary') ? 'is-invalid' : '' }}" type="number"
                        name="job_salary" id="job_salary" value="{{ old('job_salary', '') }}" step="0.01">
                    @if ($errors->has('job_salary'))
                        <div class="invalid-feedback">
                            {{ $errors->first('job_salary') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.beneficiary.fields.job_salary_helper') }}</span>
                </div>
                <!---  marital_status-->
                <div class="form-group">
                    <label class="required">{{ trans('cruds.beneficiary.fields.marital_status') }}</label>
                    <select class="form-control {{ $errors->has('marital_status') ? 'is-invalid' : '' }}"
                        name="marital_status" id="marital_status" required>
                        <option value disabled {{ old('marital_status', null) === null ? 'selected' : '' }}>
                            {{ trans('global.pleaseSelect') }}</option>
                        @foreach (App\Models\Beneficiary::MARITAL_STATUS_SELECT as $key => $label)
                            <option value="{{ $key }}"
                                {{ old('marital_status', '') === (string) $key ? 'selected' : '' }}>{{ $label }}
                            </option>
                        @endforeach
                    </select>
                    @if ($errors->has('marital_status'))
                        <div class="invalid-feedback">
                            {{ $errors->first('marital_status') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.beneficiary.fields.marital_status_helper') }}</span>
                </div>
                <!---  marital_state_date-->
                <div class="form-group">
                    <label for="marital_state_date">{{ trans('cruds.beneficiary.fields.marital_state_date') }}</label>
                    <input class="form-control date {{ $errors->has('marital_state_date') ? 'is-invalid' : '' }}"
                        type="text" name="marital_state_date" id="marital_state_date"
                        value="{{ old('marital_state_date') }}">
                    @if ($errors->has('marital_state_date'))
                        <div class="invalid-feedback">
                            {{ $errors->first('marital_state_date') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.beneficiary.fields.marital_state_date_helper') }}</span>
                </div>
                <!---  address-->
                <div class="form-group">
                    <label for="address">{{ trans('cruds.beneficiary.fields.address') }}</label>
                    <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text"
                        name="address" id="address" value="{{ old('address', '') }}">
                    @if ($errors->has('address'))
                        <div class="invalid-feedback">
                            {{ $errors->first('address') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.beneficiary.fields.address_helper') }}</span>
                </div>
                <!---  illness_status-->
                <div class="form-group">
                    <label class="required">{{ trans('cruds.beneficiary.fields.illness_status') }}</label>
                    @foreach (App\Models\Beneficiary::ILLNESS_STATUS_RADIO as $key => $label)
                        <div class="form-check {{ $errors->has('illness_status') ? 'is-invalid' : '' }}">
                            <input class="form-check-input" type="radio" id="illness_status_{{ $key }}"
                                name="illness_status" value="{{ $key }}"
                                {{ old('illness_status', '') === (string) $key ? 'checked' : '' }} required>
                            <label class="form-check-label"
                                for="illness_status_{{ $key }}">{{ $label }}</label>
                        </div>
                    @endforeach
                    @if ($errors->has('illness_status'))
                        <div class="invalid-feedback">
                            {{ $errors->first('illness_status') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.beneficiary.fields.illness_status_helper') }}</span>
                </div>
                <!---  illness_type_id-->
                <div class="form-group">
                    <label for="illness_type_id">{{ trans('cruds.beneficiary.fields.illness_type') }}</label>
                    <select class="form-control select2 {{ $errors->has('illness_type') ? 'is-invalid' : '' }}"
                        name="illness_type_id" id="illness_type_id">
                        @foreach ($illness_types as $id => $entry)
                            <option value="{{ $id }}" {{ old('illness_type_id') == $id ? 'selected' : '' }}>
                                {{ $entry }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('illness_type'))
                        <div class="invalid-feedback">
                            {{ $errors->first('illness_type') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.beneficiary.fields.illness_type_helper') }}</span>
                </div>
                <!---  building_id-->
                <div class="form-group">
                    <label class="required" for="building_id">{{ trans('cruds.beneficiary.fields.building') }}</label>
                    <select class="form-control select2 {{ $errors->has('building') ? 'is-invalid' : '' }}"
                        name="building_id" id="building_id" required>
                        @foreach ($buildings as $id => $entry)
                            <option value="{{ $id }}" {{ old('building_id') == $id ? 'selected' : '' }}>
                                {{ $entry }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('building'))
                        <div class="invalid-feedback">
                            {{ $errors->first('building') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.beneficiary.fields.building_helper') }}</span>
                </div>
                <div class="form-group">
                    <button class="btn btn-danger" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        var uploadedIdentityPhotoMap = {}
        Dropzone.options.identityPhotoDropzone = {
            url: '{{ route('admin.beneficiaries.storeMedia') }}',
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
                $('form').append('<input type="hidden" name="identity_photo[]" value="' + response.name + '">')
                uploadedIdentityPhotoMap[file.name] = response.name
            },
            removedfile: function(file) {
                console.log(file)
                file.previewElement.remove()
                var name = ''
                if (typeof file.file_name !== 'undefined') {
                    name = file.file_name
                } else {
                    name = uploadedIdentityPhotoMap[file.name]
                }
                $('form').find('input[name="identity_photo[]"][value="' + name + '"]').remove()
            },
            init: function() {
                @if (isset($beneficiary) && $beneficiary->identity_photo)
                    var files = {!! json_encode($beneficiary->identity_photo) !!}
                    for (var i in files) {
                        var file = files[i]
                        this.options.addedfile.call(this, file)
                        this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
                        file.previewElement.classList.add('dz-complete')
                        $('form').append('<input type="hidden" name="identity_photo[]" value="' + file.file_name +
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
