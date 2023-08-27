@extends('layouts.admin')
@section('content')

    <div class="row">
        <div class="col-4">
            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.building.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <!-- Accept and Refuese and Review Building buttons--->
                            @if ($building->stages == 'managment')
                                <form method="post" action="{{ route('admin.buildings.update', [$building->id]) }}"
                                    enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <input type="hidden" name="management_statuses" value="accepted">
                                    <input type="hidden" name="stages" value="engineering">
                                    <div class="form-group">
                                        <button class="btn btn-info" type="submit">
                                            قبول
                                        </button>
                                    </div>
                                </form>
                                @if ($building->rejected_reson != null && $building->management_statuses == 'rejected')
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#exampleModal">
                                        اعادة النظر للطلب
                                    </button>
                                @else
                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                        data-target="#exampleModal">
                                        رفض
                                    </button>
                                @endif
                            @endif
                            <!-- end Accept and Refuese and Review Building buttons--->

                            <!-- Research visit and Result  buttons--->
                            @if ($building->stages == 'engineering' && $building->research_vist_date == null)
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#exampleModal">
                                    تحديد موعد زياره بحثيه
                                </button>
                            @endif
                            @if ($building->stages == 'research_visit' && $building->research_vist_result == null)
                                <button type="button" class="btn btn-success" data-toggle="modal"
                                    data-target="#exampleModal">
                                    نتيجة الزياره بحثيه
                                </button>
                            @endif
                            @if ($building->research_vist_result != null && $building->engineering_vist_date == null)
                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                    data-target="#exampleModal">
                                    تحديد ميعاد الزياره الهندسيه
                                </button>
                            @endif
                            <!-- End Research visit  buttons--->
                            <!-- engineering visit and Result  buttons--->

                            @if ($building->stages == 'engineering_visit' && $building->engineering_vist_result == null)
                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                    data-target="#exampleModal">
                                    نتيجة الزياره الهندسيه
                                </button>
                            @endif
                            @if ($building->stages == 'engineering_visit' && $building->engineering_vist_result != null)
                                <form method="post" action="{{ route('admin.buildings.update', [$building->id]) }}"
                                    enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <input type="hidden" name="stages" value="send_to_contractor">
                                    <div class="form-group">
                                        <button class="btn btn-danger" type="submit">
                                            طلب عرض سعر من المقاولين
                                        </button>
                                    </div>
                                </form>
                            @endif
                            @if ($building->stages == 'send_to_contractor')
                                <a class="btn btn-danger" href="{{ route('admin.buildings.index') }}">
                                    الموافقه على عرض الاسعار
                                </a>
                            @endif
                            @if ($building->stages == 'done')
                                <a class="btn btn-danger" href="{{ route('admin.buildings.index') }}">
                                    الارسال للمانحين
                                </a>
                            @endif

                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.building.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $building->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.building.fields.building_type') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Building::BUILDING_TYPE_SELECT[$building->building_type] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.building.fields.building_number') }}
                                    </th>
                                    <td>
                                        {{ $building->building_number }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.building.fields.floor_count') }}
                                    </th>
                                    <td>
                                        {{ $building->floor_count }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.building.fields.apartments_count') }}
                                    </th>
                                    <td>
                                        {{ $building->apartments_count }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.building.fields.birth_data') }}
                                    </th>
                                    <td>
                                        {{ $building->birth_data }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.building.fields.latitude') }}
                                    </th>
                                    <td>
                                        <a href="https://www.google.com/maps/?q={{ $building->latitude }},{{ $building->longtude }}"
                                            target="_blank"> View on Map
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.building.fields.building_photos') }}
                                    </th>
                                    <td>
                                        @foreach ($building->building_photos as $key => $media)
                                            <a href="{{ $media->getUrl() }}" target="_blank">
                                                {{ trans('global.view_file') }}
                                            </a>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.building.fields.management_statuses') }}
                                    </th>
                                    @if ($building->management_statuses == 'rejected')
                                        <td colspan="2">
                                            {{ App\Models\Building::MANAGEMENT_STATUSES_SELECT[$building->management_statuses] ?? '' }}
                                            <br>
                                            {{ trans('cruds.building.fields.rejected_reson') }}:
                                            {{ $building->rejected_reson }}
                                        </td>
                                    @else
                                        <td>
                                            {{ App\Models\Building::MANAGEMENT_STATUSES_SELECT[$building->management_statuses] ?? '' }}
                                        </td>
                                    @endif
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.building.fields.stages') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Building::STAGES_SELECT[$building->stages] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.building.fields.research_vist_date') }}
                                    </th>
                                    <td>
                                        {{ $building->research_vist_date }}
                                    </td>
                                </tr>

                                <tr>
                                    <th>
                                        {{ trans('cruds.building.fields.engineering_vist_date') }}
                                    </th>
                                    <td>
                                        {{ $building->engineering_vist_date }}
                                    </td>
                                </tr>

                                <tr>
                                    <th>
                                        {{ trans('cruds.building.fields.research_vist_result') }}
                                    </th>
                                    <td>
                                        @if ($building->research_vist_result)
                                            <a href="{{ $building->research_vist_result->getUrl() }}" target="_blank">
                                                {{ trans('global.view_file') }}
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.building.fields.engineering_vist_result') }}
                                    </th>
                                    <td>
                                        @if ($building->engineering_vist_result)
                                            <a href="{{ $building->engineering_vist_result->getUrl() }}" target="_blank">
                                                {{ trans('global.view_file') }}
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.building.fields.organization') }}
                                    </th>
                                    <td>
                                        {{ $building->organization->name ?? '' }}
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.buildings.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-8">
            <div class="card">
                <div class="card-header">
                    {{ trans('global.relatedData') }}
                </div>
                <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="#building_building_contractors" role="tab" data-toggle="tab">
                            {{ trans('cruds.buildingContractor.title') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#building_beneficiaries" role="tab" data-toggle="tab">
                            {{ trans('cruds.beneficiary.title') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#building_building_supporters" role="tab" data-toggle="tab">
                            {{ trans('cruds.buildingSupporter.title') }}
                        </a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane active" role="tabpanel" id="building_building_contractors">
                        @includeIf('admin.buildings.relationships.buildingBuildingContractors', [
                            'buildingContractors' => $building->buildingBuildingContractors,
                            'contractors' => $contractors,
                        ])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="building_beneficiaries">
                        @includeIf('admin.buildings.relationships.buildingBeneficiaries', [
                            'beneficiaries' => $building->buildingBeneficiaries,
                        ])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="building_building_supporters">
                        @includeIf('admin.buildings.relationships.buildingBuildingSupporters', [
                            'buildingSupporters' => $building->buildingBuildingSupporters,
                        ])
                    </div>
                </div>
            </div>

        </div>
    </div>


    @include('admin.buildings.buildingModal', ['building' => $building])

@endsection

@section('scripts')
    {{-- researsh result scripts --}}
    @if ($building->stages == 'research_visit' && $building->research_vist_result == null)
        <script>
            $(document).ready(function() {
                @if ($errors->count() > 0)
                    $('#exampleModal').modal('show');
                @endif
            });
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
                success: function(file, response) {
                    $('form').find('input[name="research_vist_result"]').remove()
                    $('form').append('<input type="hidden" name="research_vist_result" value="' + response.name + '">')
                },
                removedfile: function(file) {
                    file.previewElement.remove()
                    if (file.status !== 'error') {
                        $('form').find('input[name="research_vist_result"]').remove()
                        this.options.maxFiles = this.options.maxFiles + 1
                    }
                },
                init: function() {
                    @if (isset($building) && $building->research_vist_result)
                        var file = {!! json_encode($building->research_vist_result) !!}
                        this.options.addedfile.call(this, file)
                        file.previewElement.classList.add('dz-complete')
                        $('form').append('<input type="hidden" name="research_vist_result" value="' + file.file_name +
                            '">')
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
    @endif

    {{-- engnering result script --}}
    @if ($building->stages == 'engineering_visit' && $building->engineering_vist_result == null)
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

                success: function(file, response) {
                    $('form').find('input[name="engineering_vist_result"]').remove()
                    $('form').append('<input type="hidden" name="engineering_vist_result" value="' + response.name +
                        '">')
                },

                removedfile: function(file) {
                    file.previewElement.remove()
                    if (file.status !== 'error') {
                        $('form').find('input[name="engineering_vist_result"]').remove()
                        this.options.maxFiles = this.options.maxFiles + 1
                    }
                },

                init: function() {
                    @if (isset($building) && $building->engineering_vist_result)
                        var file = {!! json_encode($building->engineering_vist_result) !!}
                        this.options.addedfile.call(this, file)
                        file.previewElement.classList.add('dz-complete')
                        $('form').append('<input type="hidden" name="engineering_vist_result" value="' + file
                            .file_name + '">')
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
    @endif
@endsection
