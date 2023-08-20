@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.beneficiaryNeed.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.beneficiary-needs.store') }}" enctype="multipart/form-data">
                @csrf
                <!-- Beneficiary Needs unit_id -->
                <div class="form-group">
                    <label class="required" for="unit_id">{{ trans('cruds.beneficiaryNeed.fields.unit') }}</label>
                    <select class="form-control select2 {{ $errors->has('unit') ? 'is-invalid' : '' }}" name="unit_id"
                        id="unit_id" required>
                        @foreach ($units as $id => $entry)
                            <option value="{{ $id }}" {{ old('unit_id') == $id ? 'selected' : '' }}>
                                {{ $entry }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('unit'))
                        <div class="invalid-feedback">
                            {{ $errors->first('unit') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.beneficiaryNeed.fields.unit_helper') }}</span>
                </div>
                <!-- Beneficiary Needs description -->
                <div class="form-group">
                    <label for="description">{{ trans('cruds.beneficiaryNeed.fields.description') }}</label>
                    <input class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" type="text"
                        name="description" id="description" value="{{ old('description', '') }}">
                    @if ($errors->has('description'))
                        <div class="invalid-feedback">
                            {{ $errors->first('description') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.beneficiaryNeed.fields.description_helper') }}</span>
                </div>
                <!-- Beneficiary Needs trmem_type -->
                <div class="form-group">
                    <label>{{ trans('cruds.beneficiaryNeed.fields.trmem_type') }}</label>
                    <select class="form-control {{ $errors->has('trmem_type') ? 'is-invalid' : '' }}" name="trmem_type"
                        id="trmem_type">
                        <option value disabled {{ old('trmem_type', null) === null ? 'selected' : '' }}>
                            {{ trans('global.pleaseSelect') }}</option>
                        @foreach (App\Models\BeneficiaryNeed::TRMEM_TYPE_SELECT as $key => $label)
                            <option value="{{ $key }}"
                                {{ old('trmem_type', '') === (string) $key ? 'selected' : '' }}>{{ $label }}
                            </option>
                        @endforeach
                    </select>
                    @if ($errors->has('trmem_type'))
                        <div class="invalid-feedback">
                            {{ $errors->first('trmem_type') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.beneficiaryNeed.fields.trmem_type_helper') }}</span>
                </div>
                <!-- Beneficiary Needs photos_before -->
                <div class="form-group">
                    <label for="photos_before">{{ trans('cruds.beneficiaryNeed.fields.photos_before') }}</label>
                    <div class="needsclick dropzone {{ $errors->has('photos_before') ? 'is-invalid' : '' }}"
                        id="photos_before-dropzone">
                    </div>
                    @if ($errors->has('photos_before'))
                        <div class="invalid-feedback">
                            {{ $errors->first('photos_before') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.beneficiaryNeed.fields.photos_before_helper') }}</span>
                </div>
                <!--  photos_after -->
                <div class="form-group">
                    <label for="photos_after">{{ trans('cruds.beneficiaryNeed.fields.photos_after') }}</label>
                    <div class="needsclick dropzone {{ $errors->has('photos_after') ? 'is-invalid' : '' }}"
                        id="photos_after-dropzone">
                    </div>
                    @if ($errors->has('photos_after'))
                        <div class="invalid-feedback">
                            {{ $errors->first('photos_after') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.beneficiaryNeed.fields.photos_after_helper') }}</span>
                </div>
                <!--  beneficiary_id -->
                <div class="form-group">
                    <label class="required"
                        for="beneficiary_id">{{ trans('cruds.beneficiaryNeed.fields.beneficiary') }}</label>
                    <select class="form-control select2 {{ $errors->has('beneficiary') ? 'is-invalid' : '' }}"
                        name="beneficiary_id" id="beneficiary_id" required>
                        @foreach ($beneficiaries as $id => $entry)
                            <option value="{{ $id }}" {{ old('beneficiary_id') == $id ? 'selected' : '' }}>
                                {{ $entry }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('beneficiary'))
                        <div class="invalid-feedback">
                            {{ $errors->first('beneficiary') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.beneficiaryNeed.fields.beneficiary_helper') }}</span>
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
        var uploadedPhotosBeforeMap = {}
        Dropzone.options.photosBeforeDropzone = {
            url: '{{ route('admin.beneficiary-needs.storeMedia') }}',
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
            url: '{{ route('admin.beneficiary-needs.storeMedia') }}',
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
