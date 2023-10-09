@extends('layouts.contractor')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="form-element base-control mb-30">
                        <h4 class="font-20 mb-4">بنود اسعار الادارة</h4>
                        <div class="container">
                            @php
                                isset($building->price_items) ? ($file = $building->price_items->getUrl()) : ($file = null);
                            @endphp
                            @if ($file == null)
                                <h3 class="text-center">لم يتم تحديد بنود الاسعار من الاداره حتي الان </h3>
                            @else
                                <div class="container text-center">
                                    <div class="alert alert-success" role="alert">
                                        حتي يتم قبول عرض اسعارك برجاء تحميل الملف الموجود واضافة اسعارك داخل البنود ومن ثم
                                        رفعه للاداره
                                    </div>

                                    <a class="btn " href="{{ $file }}" download>Download</a>
                                </div>
                            @endif

                        </div>
                    </div>
                    <!-- Base Control -->
                    <div class="form-element base-control mb-30">
                        <h4 class="font-20 mb-4">أرسل السعر للادارة </h4>

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
                        <form action="{{ route('contractor.building.update') }}" method="POST">
                            @csrf
                            <input type="hidden" name="building_id" value="{{ $building->id }}">
                            <div class="row justify-content-center">
                                <div class="form-group col-md-6 mt-4 ">
                                    <label class="required"
                                        for="contract">{{ trans('cruds.buildingContractor.fields.contract') }}</label>
                                    <div class="needsclick dropzone style--three {{ $errors->has('contract') ? 'is-invalid' : '' }}"
                                        id="contract-dropzone">
                                    </div>
                                    @if ($errors->has('contract'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('contract') }}
                                        </div>
                                    @endif
                                    <span
                                        class="help-block">{{ trans('cruds.buildingContractor.fields.contract_helper') }}</span>
                                </div>
                            </div>
                            <!-- Button Group -->
                            <div class="button-group  row justify-content-center  pt-1">
                                <button type="submit" class="btn long col-4">تعديل</button>
                                <a href="{{ route('contractor.requests') }}"
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
    <script>
        Dropzone.options.contractDropzone = {
            url: '{{ route('contractor.building-contractors.storeMedia') }}',
            maxFilesize: 4, // MB
            maxFiles: 1,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 4
            },
            success: function(file, response) {
                $('form').find('input[name="contract"]').remove()
                $('form').append('<input type="hidden" name="contract" value="' + response.name + '">')
            },
            removedfile: function(file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="contract"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function() {
                @if (isset($buildingContractor) && $buildingContractor->contract)
                    var file = {!! json_encode($buildingContractor->contract) !!}
                    this.options.addedfile.call(this, file)
                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input type="hidden" name="contract" value="' + file.file_name + '">')
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
