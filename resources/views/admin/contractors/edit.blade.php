@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.contractor.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.contractors.update", [$contractor->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="position">{{ trans('cruds.contractor.fields.position') }}</label>
                <input class="form-control {{ $errors->has('position') ? 'is-invalid' : '' }}" type="text" name="position" id="position" value="{{ old('position', $contractor->position) }}" required>
                @if($errors->has('position'))
                    <div class="invalid-feedback">
                        {{ $errors->first('position') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.contractor.fields.position_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="website">{{ trans('cruds.contractor.fields.website') }}</label>
                <input class="form-control {{ $errors->has('website') ? 'is-invalid' : '' }}" type="text" name="website" id="website" value="{{ old('website', $contractor->website) }}" required>
                @if($errors->has('website'))
                    <div class="invalid-feedback">
                        {{ $errors->first('website') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.contractor.fields.website_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="commercial_record">{{ trans('cruds.contractor.fields.commercial_record') }}</label>
                <div class="needsclick dropzone {{ $errors->has('commercial_record') ? 'is-invalid' : '' }}" id="commercial_record-dropzone">
                </div>
                @if($errors->has('commercial_record'))
                    <div class="invalid-feedback">
                        {{ $errors->first('commercial_record') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.contractor.fields.commercial_record_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="safety_certificate">{{ trans('cruds.contractor.fields.safety_certificate') }}</label>
                <div class="needsclick dropzone {{ $errors->has('safety_certificate') ? 'is-invalid' : '' }}" id="safety_certificate-dropzone">
                </div>
                @if($errors->has('safety_certificate'))
                    <div class="invalid-feedback">
                        {{ $errors->first('safety_certificate') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.contractor.fields.safety_certificate_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="tax">{{ trans('cruds.contractor.fields.tax') }}</label>
                <div class="needsclick dropzone {{ $errors->has('tax') ? 'is-invalid' : '' }}" id="tax-dropzone">
                </div>
                @if($errors->has('tax'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tax') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.contractor.fields.tax_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="income">{{ trans('cruds.contractor.fields.income') }}</label>
                <div class="needsclick dropzone {{ $errors->has('income') ? 'is-invalid' : '' }}" id="income-dropzone">
                </div>
                @if($errors->has('income'))
                    <div class="invalid-feedback">
                        {{ $errors->first('income') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.contractor.fields.income_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="social_insurance">{{ trans('cruds.contractor.fields.social_insurance') }}</label>
                <div class="needsclick dropzone {{ $errors->has('social_insurance') ? 'is-invalid' : '' }}" id="social_insurance-dropzone">
                </div>
                @if($errors->has('social_insurance'))
                    <div class="invalid-feedback">
                        {{ $errors->first('social_insurance') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.contractor.fields.social_insurance_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="human_resources">{{ trans('cruds.contractor.fields.human_resources') }}</label>
                <div class="needsclick dropzone {{ $errors->has('human_resources') ? 'is-invalid' : '' }}" id="human_resources-dropzone">
                </div>
                @if($errors->has('human_resources'))
                    <div class="invalid-feedback">
                        {{ $errors->first('human_resources') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.contractor.fields.human_resources_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="bank_certificate">{{ trans('cruds.contractor.fields.bank_certificate') }}</label>
                <div class="needsclick dropzone {{ $errors->has('bank_certificate') ? 'is-invalid' : '' }}" id="bank_certificate-dropzone">
                </div>
                @if($errors->has('bank_certificate'))
                    <div class="invalid-feedback">
                        {{ $errors->first('bank_certificate') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.contractor.fields.bank_certificate_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="commitment_letter">{{ trans('cruds.contractor.fields.commitment_letter') }}</label>
                <div class="needsclick dropzone {{ $errors->has('commitment_letter') ? 'is-invalid' : '' }}" id="commitment_letter-dropzone">
                </div>
                @if($errors->has('commitment_letter'))
                    <div class="invalid-feedback">
                        {{ $errors->first('commitment_letter') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.contractor.fields.commitment_letter_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.contractor.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $contractor->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.contractor.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="services">{{ trans('cruds.contractor.fields.services') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('services') ? 'is-invalid' : '' }}" name="services[]" id="services" multiple required>
                    @foreach($services as $id => $service)
                        <option value="{{ $id }}" {{ (in_array($id, old('services', [])) || $contractor->services->contains($id)) ? 'selected' : '' }}>{{ $service }}</option>
                    @endforeach
                </select>
                @if($errors->has('services'))
                    <div class="invalid-feedback">
                        {{ $errors->first('services') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.contractor.fields.services_helper') }}</span>
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
    Dropzone.options.commercialRecordDropzone = {
    url: '{{ route('admin.contractors.storeMedia') }}',
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
      $('form').find('input[name="commercial_record"]').remove()
      $('form').append('<input type="hidden" name="commercial_record" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="commercial_record"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($contractor) && $contractor->commercial_record)
      var file = {!! json_encode($contractor->commercial_record) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="commercial_record" value="' + file.file_name + '">')
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
    Dropzone.options.safetyCertificateDropzone = {
    url: '{{ route('admin.contractors.storeMedia') }}',
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
      $('form').find('input[name="safety_certificate"]').remove()
      $('form').append('<input type="hidden" name="safety_certificate" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="safety_certificate"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($contractor) && $contractor->safety_certificate)
      var file = {!! json_encode($contractor->safety_certificate) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="safety_certificate" value="' + file.file_name + '">')
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
    Dropzone.options.taxDropzone = {
    url: '{{ route('admin.contractors.storeMedia') }}',
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
      $('form').find('input[name="tax"]').remove()
      $('form').append('<input type="hidden" name="tax" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="tax"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($contractor) && $contractor->tax)
      var file = {!! json_encode($contractor->tax) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="tax" value="' + file.file_name + '">')
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
    Dropzone.options.incomeDropzone = {
    url: '{{ route('admin.contractors.storeMedia') }}',
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
      $('form').find('input[name="income"]').remove()
      $('form').append('<input type="hidden" name="income" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="income"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($contractor) && $contractor->income)
      var file = {!! json_encode($contractor->income) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="income" value="' + file.file_name + '">')
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
    Dropzone.options.socialInsuranceDropzone = {
    url: '{{ route('admin.contractors.storeMedia') }}',
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
      $('form').find('input[name="social_insurance"]').remove()
      $('form').append('<input type="hidden" name="social_insurance" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="social_insurance"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($contractor) && $contractor->social_insurance)
      var file = {!! json_encode($contractor->social_insurance) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="social_insurance" value="' + file.file_name + '">')
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
    Dropzone.options.humanResourcesDropzone = {
    url: '{{ route('admin.contractors.storeMedia') }}',
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
      $('form').find('input[name="human_resources"]').remove()
      $('form').append('<input type="hidden" name="human_resources" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="human_resources"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($contractor) && $contractor->human_resources)
      var file = {!! json_encode($contractor->human_resources) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="human_resources" value="' + file.file_name + '">')
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
    Dropzone.options.bankCertificateDropzone = {
    url: '{{ route('admin.contractors.storeMedia') }}',
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
      $('form').find('input[name="bank_certificate"]').remove()
      $('form').append('<input type="hidden" name="bank_certificate" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="bank_certificate"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($contractor) && $contractor->bank_certificate)
      var file = {!! json_encode($contractor->bank_certificate) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="bank_certificate" value="' + file.file_name + '">')
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
    Dropzone.options.commitmentLetterDropzone = {
    url: '{{ route('admin.contractors.storeMedia') }}',
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
      $('form').find('input[name="commitment_letter"]').remove()
      $('form').append('<input type="hidden" name="commitment_letter" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="commitment_letter"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($contractor) && $contractor->commitment_letter)
      var file = {!! json_encode($contractor->commitment_letter) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="commitment_letter" value="' + file.file_name + '">')
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