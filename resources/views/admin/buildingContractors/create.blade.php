@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.buildingContractor.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.building-contractors.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="visit_date">{{ trans('cruds.buildingContractor.fields.visit_date') }}</label>
                <input class="form-control date {{ $errors->has('visit_date') ? 'is-invalid' : '' }}" type="text" name="visit_date" id="visit_date" value="{{ old('visit_date') }}" required>
                @if($errors->has('visit_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('visit_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.buildingContractor.fields.visit_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.buildingContractor.fields.stages') }}</label>
                <select class="form-control {{ $errors->has('stages') ? 'is-invalid' : '' }}" name="stages" id="stages" required>
                    <option value disabled {{ old('stages', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\BuildingContractor::STAGES_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('stages', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('stages'))
                    <div class="invalid-feedback">
                        {{ $errors->first('stages') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.buildingContractor.fields.stages_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="contract">{{ trans('cruds.buildingContractor.fields.contract') }}</label>
                <div class="needsclick dropzone {{ $errors->has('contract') ? 'is-invalid' : '' }}" id="contract-dropzone">
                </div>
                @if($errors->has('contract'))
                    <div class="invalid-feedback">
                        {{ $errors->first('contract') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.buildingContractor.fields.contract_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="quotation_with_materials">{{ trans('cruds.buildingContractor.fields.quotation_with_materials') }}</label>
                <input class="form-control {{ $errors->has('quotation_with_materials') ? 'is-invalid' : '' }}" type="number" name="quotation_with_materials" id="quotation_with_materials" value="{{ old('quotation_with_materials', '') }}" step="0.01">
                @if($errors->has('quotation_with_materials'))
                    <div class="invalid-feedback">
                        {{ $errors->first('quotation_with_materials') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.buildingContractor.fields.quotation_with_materials_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="quotation_without_materials">{{ trans('cruds.buildingContractor.fields.quotation_without_materials') }}</label>
                <input class="form-control {{ $errors->has('quotation_without_materials') ? 'is-invalid' : '' }}" type="number" name="quotation_without_materials" id="quotation_without_materials" value="{{ old('quotation_without_materials', '') }}" step="0.01">
                @if($errors->has('quotation_without_materials'))
                    <div class="invalid-feedback">
                        {{ $errors->first('quotation_without_materials') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.buildingContractor.fields.quotation_without_materials_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="contractor_id">{{ trans('cruds.buildingContractor.fields.contractor') }}</label>
                <select class="form-control select2 {{ $errors->has('contractor') ? 'is-invalid' : '' }}" name="contractor_id" id="contractor_id" required>
                    @foreach($contractors as $id => $entry)
                        <option value="{{ $id }}" {{ old('contractor_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('contractor'))
                    <div class="invalid-feedback">
                        {{ $errors->first('contractor') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.buildingContractor.fields.contractor_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="building_id">{{ trans('cruds.buildingContractor.fields.building') }}</label>
                <select class="form-control select2 {{ $errors->has('building') ? 'is-invalid' : '' }}" name="building_id" id="building_id" required>
                    @foreach($buildings as $id => $entry)
                        <option value="{{ $id }}" {{ old('building_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('building'))
                    <div class="invalid-feedback">
                        {{ $errors->first('building') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.buildingContractor.fields.building_helper') }}</span>
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
    Dropzone.options.contractDropzone = {
    url: '{{ route('admin.building-contractors.storeMedia') }}',
    maxFilesize: 4, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 4
    },
    success: function (file, response) {
      $('form').find('input[name="contract"]').remove()
      $('form').append('<input type="hidden" name="contract" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="contract"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($buildingContractor) && $buildingContractor->contract)
      var file = {!! json_encode($buildingContractor->contract) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="contract" value="' + file.file_name + '">')
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