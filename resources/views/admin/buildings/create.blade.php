@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.building.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.buildings.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>{{ trans('cruds.building.fields.building_type') }}</label>
                <select class="form-control {{ $errors->has('building_type') ? 'is-invalid' : '' }}" name="building_type" id="building_type">
                    <option value disabled {{ old('building_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Building::BUILDING_TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('building_type', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('building_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('building_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.building.fields.building_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="building_number">{{ trans('cruds.building.fields.building_number') }}</label>
                <input class="form-control {{ $errors->has('building_number') ? 'is-invalid' : '' }}" type="number" name="building_number" id="building_number" value="{{ old('building_number', '') }}" step="1" required>
                @if($errors->has('building_number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('building_number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.building.fields.building_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="floor_count">{{ trans('cruds.building.fields.floor_count') }}</label>
                <input class="form-control {{ $errors->has('floor_count') ? 'is-invalid' : '' }}" type="number" name="floor_count" id="floor_count" value="{{ old('floor_count', '') }}" step="1" required>
                @if($errors->has('floor_count'))
                    <div class="invalid-feedback">
                        {{ $errors->first('floor_count') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.building.fields.floor_count_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="apartments_count">{{ trans('cruds.building.fields.apartments_count') }}</label>
                <input class="form-control {{ $errors->has('apartments_count') ? 'is-invalid' : '' }}" type="number" name="apartments_count" id="apartments_count" value="{{ old('apartments_count', '') }}" step="1" required>
                @if($errors->has('apartments_count'))
                    <div class="invalid-feedback">
                        {{ $errors->first('apartments_count') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.building.fields.apartments_count_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="birth_data">{{ trans('cruds.building.fields.birth_data') }}</label>
                <input class="form-control date {{ $errors->has('birth_data') ? 'is-invalid' : '' }}" type="text" name="birth_data" id="birth_data" value="{{ old('birth_data') }}">
                @if($errors->has('birth_data'))
                    <div class="invalid-feedback">
                        {{ $errors->first('birth_data') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.building.fields.birth_data_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="latitude">{{ trans('cruds.building.fields.latitude') }}</label>
                <input class="form-control {{ $errors->has('latitude') ? 'is-invalid' : '' }}" type="text" name="latitude" id="latitude" value="{{ old('latitude', '') }}">
                @if($errors->has('latitude'))
                    <div class="invalid-feedback">
                        {{ $errors->first('latitude') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.building.fields.latitude_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="longtude">{{ trans('cruds.building.fields.longtude') }}</label>
                <input class="form-control {{ $errors->has('longtude') ? 'is-invalid' : '' }}" type="text" name="longtude" id="longtude" value="{{ old('longtude', '') }}">
                @if($errors->has('longtude'))
                    <div class="invalid-feedback">
                        {{ $errors->first('longtude') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.building.fields.longtude_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="building_photos">{{ trans('cruds.building.fields.building_photos') }}</label>
                <div class="needsclick dropzone {{ $errors->has('building_photos') ? 'is-invalid' : '' }}" id="building_photos-dropzone">
                </div>
                @if($errors->has('building_photos'))
                    <div class="invalid-feedback">
                        {{ $errors->first('building_photos') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.building.fields.building_photos_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.building.fields.management_statuses') }}</label>
                <select class="form-control {{ $errors->has('management_statuses') ? 'is-invalid' : '' }}" name="management_statuses" id="management_statuses">
                    <option value disabled {{ old('management_statuses', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Building::MANAGEMENT_STATUSES_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('management_statuses', 'pending') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('management_statuses'))
                    <div class="invalid-feedback">
                        {{ $errors->first('management_statuses') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.building.fields.management_statuses_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="rejected_reson">{{ trans('cruds.building.fields.rejected_reson') }}</label>
                <input class="form-control {{ $errors->has('rejected_reson') ? 'is-invalid' : '' }}" type="text" name="rejected_reson" id="rejected_reson" value="{{ old('rejected_reson', '') }}">
                @if($errors->has('rejected_reson'))
                    <div class="invalid-feedback">
                        {{ $errors->first('rejected_reson') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.building.fields.rejected_reson_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.building.fields.stages') }}</label>
                <select class="form-control {{ $errors->has('stages') ? 'is-invalid' : '' }}" name="stages" id="stages">
                    <option value disabled {{ old('stages', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Building::STAGES_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('stages', 'managment') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('stages'))
                    <div class="invalid-feedback">
                        {{ $errors->first('stages') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.building.fields.stages_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="research_vist_date">{{ trans('cruds.building.fields.research_vist_date') }}</label>
                <input class="form-control date {{ $errors->has('research_vist_date') ? 'is-invalid' : '' }}" type="text" name="research_vist_date" id="research_vist_date" value="{{ old('research_vist_date') }}">
                @if($errors->has('research_vist_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('research_vist_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.building.fields.research_vist_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="research_vist_result">{{ trans('cruds.building.fields.research_vist_result') }}</label>
                <div class="needsclick dropzone {{ $errors->has('research_vist_result') ? 'is-invalid' : '' }}" id="research_vist_result-dropzone">
                </div>
                @if($errors->has('research_vist_result'))
                    <div class="invalid-feedback">
                        {{ $errors->first('research_vist_result') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.building.fields.research_vist_result_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="engineering_vist_date">{{ trans('cruds.building.fields.engineering_vist_date') }}</label>
                <input class="form-control date {{ $errors->has('engineering_vist_date') ? 'is-invalid' : '' }}" type="text" name="engineering_vist_date" id="engineering_vist_date" value="{{ old('engineering_vist_date') }}">
                @if($errors->has('engineering_vist_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('engineering_vist_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.building.fields.engineering_vist_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="engineering_vist_result">{{ trans('cruds.building.fields.engineering_vist_result') }}</label>
                <div class="needsclick dropzone {{ $errors->has('engineering_vist_result') ? 'is-invalid' : '' }}" id="engineering_vist_result-dropzone">
                </div>
                @if($errors->has('engineering_vist_result'))
                    <div class="invalid-feedback">
                        {{ $errors->first('engineering_vist_result') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.building.fields.engineering_vist_result_helper') }}</span>
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
    var uploadedBuildingPhotosMap = {}
Dropzone.options.buildingPhotosDropzone = {
    url: '{{ route('admin.buildings.storeMedia') }}',
    maxFilesize: 2, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="building_photos[]" value="' + response.name + '">')
      uploadedBuildingPhotosMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedBuildingPhotosMap[file.name]
      }
      $('form').find('input[name="building_photos[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($building) && $building->building_photos)
          var files =
            {!! json_encode($building->building_photos) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="building_photos[]" value="' + file.file_name + '">')
            }
@endif
    },
     error: function (file, response) {
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
    Dropzone.options.researchVistResultDropzone = {
    url: '{{ route('admin.buildings.storeMedia') }}',
    maxFilesize: 2, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2
    },
    success: function (file, response) {
      $('form').find('input[name="research_vist_result"]').remove()
      $('form').append('<input type="hidden" name="research_vist_result" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="research_vist_result"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($building) && $building->research_vist_result)
      var file = {!! json_encode($building->research_vist_result) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="research_vist_result" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
     error: function (file, response) {
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
    Dropzone.options.engineeringVistResultDropzone = {
    url: '{{ route('admin.buildings.storeMedia') }}',
    maxFilesize: 2, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2
    },
    success: function (file, response) {
      $('form').find('input[name="engineering_vist_result"]').remove()
      $('form').append('<input type="hidden" name="engineering_vist_result" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="engineering_vist_result"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($building) && $building->engineering_vist_result)
      var file = {!! json_encode($building->engineering_vist_result) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="engineering_vist_result" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
     error: function (file, response) {
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