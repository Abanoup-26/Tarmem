@extends('layouts.organization')
@section('styles')
    <!-- ======= BEGIN PAGE LEVEL PLUGINS STYLES ======= -->
    <link rel="stylesheet" href="{{ asset('frontend/plugins/apex/apexcharts.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard_offline/css/bootstrap-datetimepicker.min.css') }}">
    <!-- ======= END BEGIN PAGE LEVEL PLUGINS STYLES ======= -->
@endsection
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <!-- Base Control -->
                    <div class="form-element base-control mb-30">
                        <h4 class="font-20 mb-4">إضافة مبني </h4>
                        @if ($errors->count() > 0)
                            <div class="alert alert-danger">
                                <ul class="list-unstyled">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <!-- Form -->
                        <form action="{{ route('organization.building.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-4 mt-4">
                                    <label
                                        class="mb-2 font-14 bold black">{{ trans('cruds.building.fields.building_type') }}</label>
                                    <select class="form-control {{ $errors->has('building_type') ? 'is-invalid' : '' }}"
                                        name="building_type" id="building_type">
                                        <option value disabled {{ old('building_type', null) === null ? 'selected' : '' }}>
                                            {{ trans('global.pleaseSelect') }}</option>
                                        @foreach (App\Models\Building::BUILDING_TYPE_SELECT as $key => $label)
                                            <option value="{{ $key }}"
                                                {{ old('building_type', '') === (string) $key ? 'selected' : '' }}>
                                                {{ $label }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('building_type'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('building_type') }}
                                        </div>
                                    @endif
                                    <span
                                        class="help-block">{{ trans('cruds.building.fields.building_type_helper') }}</span>
                                </div>
                                <div class="form-group col-md-4 mt-4">
                                    <label class="required mb-2 font-14 bold black"
                                        for="building_number">{{ trans('cruds.building.fields.building_number') }}</label>
                                    <input class="form-control {{ $errors->has('building_number') ? 'is-invalid' : '' }}"
                                        type="number" name="building_number" id="building_number"
                                        value="{{ old('building_number', '') }}" step="1" required>
                                    @if ($errors->has('building_number'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('building_number') }}
                                        </div>
                                    @endif
                                    <span
                                        class="help-block">{{ trans('cruds.building.fields.building_number_helper') }}</span>
                                </div>
                                <div class="form-group col-md-4 mt-4">
                                    <label class="required mb-2 font-14 bold black"
                                        for="floor_count">{{ trans('cruds.building.fields.floor_count') }}</label>
                                    <input class="form-control {{ $errors->has('floor_count') ? 'is-invalid' : '' }}"
                                        type="number" name="floor_count" id="floor_count"
                                        value="{{ old('floor_count', '') }}" step="1" required>
                                    @if ($errors->has('floor_count'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('floor_count') }}
                                        </div>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.building.fields.floor_count_helper') }}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 mt-4">
                                    <label class="required mb-2 font-14 bold black"
                                        for="apartments_count">{{ trans('cruds.building.fields.apartments_count') }}</label>
                                    <input class="form-control {{ $errors->has('apartments_count') ? 'is-invalid' : '' }}"
                                        type="number" name="apartments_count" id="apartments_count"
                                        value="{{ old('apartments_count', '') }}" step="1" required>
                                    @if ($errors->has('apartments_count'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('apartments_count') }}
                                        </div>
                                    @endif
                                    <span
                                        class="help-block">{{ trans('cruds.building.fields.apartments_count_helper') }}</span>
                                </div>
                                <div class="form-group col-md-6 mt-4">
                                    <label class="mb-2 font-14 bold black" for="birth_data">{{ trans('cruds.building.fields.birth_data') }}</label>
                                    <input class="form-control date {{ $errors->has('birth_data') ? 'is-invalid' : '' }}" type="text" name="birth_data" id="birth_data" value="{{ old('birth_data') }}">
                                    @if($errors->has('birth_data'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('birth_data') }}
                                        </div>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.building.fields.birth_data_helper') }}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 mt-4">
                                    <label class="mb-2 font-14 bold black"
                                        for="longtude">{{ trans('cruds.building.fields.longtude') }}</label>
                                    <input class="form-control {{ $errors->has('longtude') ? 'is-invalid' : '' }}"
                                        type="text" name="longtude" id="longtude" value="{{ old('longtude', '') }}">
                                    @if ($errors->has('longtude'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('longtude') }}
                                        </div>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.building.fields.longtude_helper') }}</span>
                                </div>
                                <div class="form-group col-md-6 mt-4">
                                    <label class="mb-2 font-14 bold black"
                                        for="latitude">{{ trans('cruds.building.fields.latitude') }}</label>
                                    <input class="form-control {{ $errors->has('latitude') ? 'is-invalid' : '' }}"
                                        type="text" name="latitude" id="latitude" value="{{ old('latitude', '') }}">
                                    @if ($errors->has('latitude'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('latitude') }}
                                        </div>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.building.fields.latitude_helper') }}</span>
                                </div>
                            </div>
                            <div class="form-group mt-4">
                                <label class="mb-2 font-14 bold black"
                                    for="building_photos">{{ trans('cruds.building.fields.building_photos') }}</label>
                                <div class="needsclick dropzone style--three {{ $errors->has('building_photos') ? 'is-invalid' : '' }}"
                                    id="building_photos-dropzone">
                                </div>
                                @if ($errors->has('building_photos'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('building_photos') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.building.fields.building_photos_helper') }}</span>
                            </div>
                            <!-- Button Group -->
                            <div class="button-group  row justify-content-center  pt-1">
                                <button type="submit" class="btn long col-4">إضافة</button>
                                <button type="reset" class="link-btn bg-transparent mr-3 soft-pink">إلغاء</button>
                            </div>
                            <!-- End Button Group -->
                        </form>
                        <!-- End Form -->
                    </div>
                    <!-- End Base Control -->


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
        var uploadedBuildingPhotosMap = {}
        Dropzone.options.buildingPhotosDropzone = {
            url: '{{ route('organization.buildings.storeMedia') }}',
            maxFilesize: 2, // MB
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 2
            },
            success: function(file, response) {
                $('form').append('<input type="hidden" name="building_photos[]" value="' + response.name + '">')
                uploadedBuildingPhotosMap[file.name] = response.name
            },
            removedfile: function(file) {
                file.previewElement.remove()
                var name = ''
                if (typeof file.file_name !== 'undefined') {
                    name = file.file_name
                } else {
                    name = uploadedBuildingPhotosMap[file.name]
                }
                $('form').find('input[name="building_photos[]"][value="' + name + '"]').remove()
            },
            init: function() {
                @if (isset($building) && $building->building_photos)
                    var files =
                        {!! json_encode($building->building_photos) !!}
                    for (var i in files) {
                        var file = files[i]
                        this.options.addedfile.call(this, file)
                        file.previewElement.classList.add('dz-complete')
                        $('form').append('<input type="hidden" name="building_photos[]" value="' + file.file_name +
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
