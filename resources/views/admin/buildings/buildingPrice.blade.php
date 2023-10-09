@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.identifying prices') }}
        </div>
        <form method="POST" action="{{ route('admin.buildings.prices.store', $buildingId) }}" enctype="multipart/form-data">
            @csrf
            <div class="card-body row justify-content-center">
                <div class="form-group col-6">
                    <label class="required" for="price_items">{{ trans('cruds.building.fields.price_items') }}</label>
                    <div class="needsclick dropzone {{ $errors->has('price_items') ? 'is-invalid' : '' }}"
                        id="price_items-dropzone">
                    </div>
                    @if ($errors->has('price_items'))
                        <div class="invalid-feedback">
                            {{ $errors->first('price_items') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.building.fields.price_items_helper') }}</span>
                </div>
            </div>
            <div class="form-group row justify-content-center ">
                <button class="btn btn-danger col-3" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>

    </div>
@endsection
@section('scripts')
    <script>
        Dropzone.options.priceItemsDropzone = {
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
            success: function(file, response) {
                $('form').find('input[name="price_items"]').remove()
                $('form').append('<input type="hidden" name="price_items" value="' + response.name + '">')
            },
            removedfile: function(file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="price_items"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function() {
                @if (isset($building) && $building->price_items)
                    var file = {!! json_encode($building->price_items) !!}
                    this.options.addedfile.call(this, file)
                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input type="hidden" name="price_items" value="' + file.file_name + '">')
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
