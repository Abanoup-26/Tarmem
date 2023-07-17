@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.beneficiaryFamily.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.beneficiary-families.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.beneficiaryFamily.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiaryFamily.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="birth_date">{{ trans('cruds.beneficiaryFamily.fields.birth_date') }}</label>
                <input class="form-control date {{ $errors->has('birth_date') ? 'is-invalid' : '' }}" type="text" name="birth_date" id="birth_date" value="{{ old('birth_date') }}" required>
                @if($errors->has('birth_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('birth_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiaryFamily.fields.birth_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="identity_number">{{ trans('cruds.beneficiaryFamily.fields.identity_number') }}</label>
                <input class="form-control {{ $errors->has('identity_number') ? 'is-invalid' : '' }}" type="text" name="identity_number" id="identity_number" value="{{ old('identity_number', '') }}" required>
                @if($errors->has('identity_number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('identity_number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiaryFamily.fields.identity_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="identity_photos">{{ trans('cruds.beneficiaryFamily.fields.identity_photos') }}</label>
                <div class="needsclick dropzone {{ $errors->has('identity_photos') ? 'is-invalid' : '' }}" id="identity_photos-dropzone">
                </div>
                @if($errors->has('identity_photos'))
                    <div class="invalid-feedback">
                        {{ $errors->first('identity_photos') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiaryFamily.fields.identity_photos_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="qualifications">{{ trans('cruds.beneficiaryFamily.fields.qualifications') }}</label>
                <input class="form-control {{ $errors->has('qualifications') ? 'is-invalid' : '' }}" type="text" name="qualifications" id="qualifications" value="{{ old('qualifications', '') }}">
                @if($errors->has('qualifications'))
                    <div class="invalid-feedback">
                        {{ $errors->first('qualifications') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiaryFamily.fields.qualifications_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.beneficiaryFamily.fields.marital_status') }}</label>
                <select class="form-control {{ $errors->has('marital_status') ? 'is-invalid' : '' }}" name="marital_status" id="marital_status" required>
                    <option value disabled {{ old('marital_status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\BeneficiaryFamily::MARITAL_STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('marital_status', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('marital_status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('marital_status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiaryFamily.fields.marital_status_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.beneficiaryFamily.fields.illness_status') }}</label>
                @foreach(App\Models\BeneficiaryFamily::ILLNESS_STATUS_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('illness_status') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="illness_status_{{ $key }}" name="illness_status" value="{{ $key }}" {{ old('illness_status', '') === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="illness_status_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('illness_status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('illness_status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiaryFamily.fields.illness_status_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="illness_type_id">{{ trans('cruds.beneficiaryFamily.fields.illness_type') }}</label>
                <select class="form-control select2 {{ $errors->has('illness_type') ? 'is-invalid' : '' }}" name="illness_type_id" id="illness_type_id" required>
                    @foreach($illness_types as $id => $entry)
                        <option value="{{ $id }}" {{ old('illness_type_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('illness_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('illness_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiaryFamily.fields.illness_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.beneficiaryFamily.fields.job_status') }}</label>
                @foreach(App\Models\BeneficiaryFamily::JOB_STATUS_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('job_status') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="job_status_{{ $key }}" name="job_status" value="{{ $key }}" {{ old('job_status', '') === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="job_status_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('job_status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('job_status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiaryFamily.fields.job_status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="job_sallary">{{ trans('cruds.beneficiaryFamily.fields.job_sallary') }}</label>
                <input class="form-control {{ $errors->has('job_sallary') ? 'is-invalid' : '' }}" type="number" name="job_sallary" id="job_sallary" value="{{ old('job_sallary', '') }}" step="0.01">
                @if($errors->has('job_sallary'))
                    <div class="invalid-feedback">
                        {{ $errors->first('job_sallary') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiaryFamily.fields.job_sallary_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="beneficiary_id">{{ trans('cruds.beneficiaryFamily.fields.beneficiary') }}</label>
                <select class="form-control select2 {{ $errors->has('beneficiary') ? 'is-invalid' : '' }}" name="beneficiary_id" id="beneficiary_id" required>
                    @foreach($beneficiaries as $id => $entry)
                        <option value="{{ $id }}" {{ old('beneficiary_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('beneficiary'))
                    <div class="invalid-feedback">
                        {{ $errors->first('beneficiary') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiaryFamily.fields.beneficiary_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="familyrelation_id">{{ trans('cruds.beneficiaryFamily.fields.familyrelation') }}</label>
                <select class="form-control select2 {{ $errors->has('familyrelation') ? 'is-invalid' : '' }}" name="familyrelation_id" id="familyrelation_id">
                    @foreach($familyrelations as $id => $entry)
                        <option value="{{ $id }}" {{ old('familyrelation_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('familyrelation'))
                    <div class="invalid-feedback">
                        {{ $errors->first('familyrelation') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiaryFamily.fields.familyrelation_helper') }}</span>
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
    var uploadedIdentityPhotosMap = {}
Dropzone.options.identityPhotosDropzone = {
    url: '{{ route('admin.beneficiary-families.storeMedia') }}',
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
    success: function (file, response) {
      $('form').append('<input type="hidden" name="identity_photos[]" value="' + response.name + '">')
      uploadedIdentityPhotosMap[file.name] = response.name
    },
    removedfile: function (file) {
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
    init: function () {
@if(isset($beneficiaryFamily) && $beneficiaryFamily->identity_photos)
      var files = {!! json_encode($beneficiaryFamily->identity_photos) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="identity_photos[]" value="' + file.file_name + '">')
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
@endsection