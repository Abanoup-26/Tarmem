@extends('layouts.organization')
@section('styles')
    <!-- ======= BEGIN PAGE LEVEL PLUGINS STYLES ======= -->
    <link rel="stylesheet" href="{{ asset('frontend/plugins/apex/apexcharts.css') }}">
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
                        <h4 class="font-20 mb-4">تعديل مبني </h4>
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
                        <form action="{{ route('organization.building.update', [$building->id]) }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-4 mt-4">
                                    <label class="required mb-2 font-14 bold black"
                                        for="project_name">{{ trans('cruds.building.fields.project_name') }}</label>
                                    <input class="form-control {{ $errors->has('project_name') ? 'is-invalid' : '' }}"
                                        type="text" name="project_name" id="project_name"
                                        value="{{ old('project_name', $building->project_name) }}" required>
                                    @if ($errors->has('project_name'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('project_name') }}
                                        </div>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.building.fields.project_name_helper') }}</span>
                                </div>
                                <div class="form-group col-md-4 mt-4">
                                    <label
                                        class="mb-2 font-14 bold black">{{ trans('cruds.building.fields.building_type') }}</label>
                                    <select class="form-control {{ $errors->has('building_type') ? 'is-invalid' : '' }}"
                                        name="building_type" id="building_type">
                                        <option value disabled {{ old('building_type', null) === null ? 'selected' : '' }}>
                                            {{ trans('global.pleaseSelect') }}</option>
                                        @foreach (App\Models\Building::BUILDING_TYPE_SELECT as $key => $label)
                                            <option value="{{ $key }}"
                                                {{ old('building_type', $building->building_type) === (string) $key ? 'selected' : '' }}>
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
                                        value="{{ old('building_number', $building->building_number) }}" step="1"
                                        required>
                                    @if ($errors->has('building_number'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('building_number') }}
                                        </div>
                                    @endif
                                    <span
                                        class="help-block">{{ trans('cruds.building.fields.building_number_helper') }}</span>
                                </div>

                            </div>
                            <div class="row">
                                <div class="form-group col-md-4 mt-4">
                                    <label class="required mb-2 font-14 bold black"
                                        for="apartments_count">{{ trans('cruds.building.fields.apartments_count') }}</label>
                                    <input class="form-control {{ $errors->has('apartments_count') ? 'is-invalid' : '' }}"
                                        type="number" name="apartments_count" id="apartments_count"
                                        value="{{ old('apartments_count', $building->apartments_count) }}" step="1"
                                        required>
                                    @if ($errors->has('apartments_count'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('apartments_count') }}
                                        </div>
                                    @endif
                                    <span
                                        class="help-block">{{ trans('cruds.building.fields.apartments_count_helper') }}</span>
                                </div>
                                <div class="form-group col-md-4 mt-4">
                                    <label class="required mb-2 font-14 bold black"
                                        for="floor_count">{{ trans('cruds.building.fields.floor_count') }}</label>
                                    <input class="form-control {{ $errors->has('floor_count') ? 'is-invalid' : '' }}"
                                        type="number" name="floor_count" id="floor_count"
                                        value="{{ old('floor_count', $building->floor_count) }}" step="1" required>
                                    @if ($errors->has('floor_count'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('floor_count') }}
                                        </div>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.building.fields.floor_count_helper') }}</span>
                                </div>
                                <div class="form-group  col-md-4 mt-4">
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
                                    <span
                                        class="help-block">{{ trans('cruds.building.fields.building_photos_helper') }}</span>
                                </div>

                            </div>
                            <div class="row">

                                <div class="form-group col-md-4 mt-4">
                                    <label class="required mb-2 font-14 bold black"
                                        for="buidling_age">{{ trans('cruds.building.fields.buidling_age') }}</label>
                                    <input class="form-control {{ $errors->has('buidling_age') ? 'is-invalid' : '' }}"
                                        type="number" name="buidling_age" id="buidling_age"
                                        value="{{ old('buidling_age', $building->buidling_age) }}" step="1" required>
                                    @if ($errors->has('buidling_age'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('buidling_age') }}
                                        </div>
                                    @endif
                                    <span
                                        class="help-block">{{ trans('cruds.building.fields.buidling_age_helper') }}</span>
                                </div>
                                <div class="form-group col-md-4 mt-4">
                                    <label class="mb-2 font-14 bold black"
                                        for="birth_data">{{ trans('cruds.building.fields.birth_data') }}</label>
                                    <input class="form-control  {{ $errors->has('birth_data') ? 'is-invalid' : '' }}"
                                        type="text" name="birth_data" id="birth_data"
                                        value="{{ old('birth_data', $building->birth_data) }}">
                                    @if ($errors->has('birth_data'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('birth_data') }}
                                        </div>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.building.fields.birth_data_helper') }}</span>
                                </div>
                            </div>
                            <div class="row">

                                <input type="hidden" name="latitude" id="latitude" value="{{ $building->latitude }}">
                                <input type="hidden" name="longtude" id="longtude" value="{{ $building->longtude }}">

                                <div class="form-group col-md-12 mt-4">
                                    <input id="search-input" type="text" class="form-control"
                                        placeholder="Search for places" style="width:300px">
                                    <div id="map" style="height: 400px;"></div>
                                </div>
                            </div>
                            <!-- Button Group -->
                            <div class="button-group  row justify-content-center  pt-1">
                                <button type="submit" class="btn long col-4">تعديل</button>
                                <a href="{{ route('organization.building.index') }}"
                                    class="link-btn bg-transparent mr-3 soft-pink">إلغاء</a>
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
    <script
        src="https://maps.googleapis.com/maps/api/js?key={{ config('app.google_api_key') }}&libraries=places&callback=initMap"
        async defer></script>

    <script>
        let map;
        let marker;

        $(document).ready(function() {
            initMap();
        });

        function placeMarker(location) {
            if (marker) {
                marker.setMap(null);
            }

            marker = new google.maps.Marker({
                position: location,
                map: map,
            });

            $('#latitude').val(location.lat());
            $('#longtude').val(location.lng());
        }

        function initMap() {
            // Specify the initial latitude and longitude
            const initialLatLng = {
                lat: parseFloat('{{ $building->latitude }}'),
                lng: parseFloat('{{ $building->longtude }}')
            };
            map = new google.maps.Map(document.getElementById('map'), {
                center: initialLatLng,
                zoom: 13,
            });

            // Initialize the marker at the specified location
            marker = new google.maps.Marker({
                position: initialLatLng,
                map: map,
            });

            const searchInput = document.getElementById('search-input');
            const searchBox = new google.maps.places.SearchBox(searchInput);

            map.addListener('bounds_changed', () => {
                searchBox.setBounds(map.getBounds());
            });

            // Listen for clicks on the map
            map.addListener('click', event => {
                placeMarker(event.latLng);
            });

            searchBox.addListener('places_changed', () => {
                const places = searchBox.getPlaces();

                if (places.length === 0) {
                    return;
                }

                const place = places[0];
                if (!place.geometry) {
                    console.log('Place geometry not found');
                    return;
                }

                if (marker) {
                    marker.setMap(null);
                }

                marker = new google.maps.Marker({
                    map,
                    position: place.geometry.location,
                });

                map.setCenter(place.geometry.location);
            });
        }
    </script>
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
