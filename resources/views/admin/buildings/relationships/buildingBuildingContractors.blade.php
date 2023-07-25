{{-- BuildingContractorForm --}}
<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.buildingContractor.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.building-contractors.store") }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="stages" value="pending">
            <input type="hidden" name="building_id" value="{{$building->id}}">
            <div class="row">
                <div class="form-group col-md-4">
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
                <div class="form-group col-md-4">
                    <label class="required" for="visit_date">{{ trans('cruds.buildingContractor.fields.visit_date') }}</label>
                    <input class="form-control date {{ $errors->has('visit_date') ? 'is-invalid' : '' }}" type="text" name="visit_date" id="visit_date" value="{{ old('visit_date') }}" required>
                    @if($errors->has('visit_date'))
                        <div class="invalid-feedback">
                            {{ $errors->first('visit_date') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.buildingContractor.fields.visit_date_helper') }}</span>
                </div> 
                <div class="form-group col-md-4">
                    <button class="btn btn-danger" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
            </div> 
        </form>
    </div>
</div>
{{-- Contractors --}}
<div class="card">
    <div class="card-header">
        {{ trans('cruds.buildingContractor.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table
                class=" table table-bordered table-striped table-hover datatable datatable-buildingBuildingContractors">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.buildingContractor.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.buildingContractor.fields.visit_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.buildingContractor.fields.stages') }}
                        </th>
                        <th>
                            {{ trans('cruds.buildingContractor.fields.contract') }}
                        </th>
                        <th>
                            {{ trans('cruds.buildingContractor.fields.quotation_with_materials') }}
                        </th>
                        <th>
                            {{ trans('cruds.buildingContractor.fields.quotation_without_materials') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($buildingContractors as $key => $buildingContractor)
                        <tr data-entry-id="{{ $buildingContractor->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $buildingContractor->id ?? '' }}
                            </td>
                            <td>
                                {{ $buildingContractor->contractor->user->name ?? '' }}
                            </td>
                            <td>
                                {{ $buildingContractor->visit_date ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\BuildingContractor::STAGES_SELECT[$buildingContractor->stages] ?? '' }}
                            </td>
                            <td>
                                @if ($buildingContractor->contract)
                                    <a href="{{ $buildingContractor->contract->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $buildingContractor->quotation_with_materials ?? '' }}
                            </td>
                            <td>
                                {{ $buildingContractor->quotation_without_materials ?? '' }}
                            </td> 
                            <td>
                                @if ($buildingContractor->stages == 'pending') 
                                    <form method="POST" action="{{ route("admin.building-contractors.update", [$buildingContractor->id]) }}" enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf 
                                        <input type="hidden" name="stages" value="request_quotation">
                                        <div class="form-group">
                                            <button class="btn btn-info btn-sm" type="submit">
                                                طلب عرض سعر
                                            </button>
                                        </div>
                                    </form>
                                @endif
                                @if ($buildingContractor->stages == 'send_quotation')
                                    <a class="btn btn-xs btn-primary"
                                        href="{{ route('admin.building-contractors.show', $buildingContractor->id) }}">
                                        قبول
                                    </a>
                                    <a class="btn btn-xs btn-primary"
                                        href="{{ route('admin.building-contractors.show', $buildingContractor->id) }}">
                                        رفض
                                    </a>
                                @endif


                                @can('building_contractor_delete')
                                    <form
                                        action="{{ route('admin.building-contractors.destroy', $buildingContractor->id) }}"
                                        method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                        style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger"
                                            value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@section('scripts')
    @parent
    <script>
        $(function() {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
            @can('building_contractor_delete')
                let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
                let deleteButton = {
                    text: deleteButtonTrans,
                    url: "{{ route('admin.building-contractors.massDestroy') }}",
                    className: 'btn-danger',
                    action: function(e, dt, node, config) {
                        var ids = $.map(dt.rows({
                            selected: true
                        }).nodes(), function(entry) {
                            return $(entry).data('entry-id')
                        });

                        if (ids.length === 0) {
                            alert('{{ trans('global.datatables.zero_selected') }}')

                            return
                        }

                        if (confirm('{{ trans('global.areYouSure') }}')) {
                            $.ajax({
                                    headers: {
                                        'x-csrf-token': _token
                                    },
                                    method: 'POST',
                                    url: config.url,
                                    data: {
                                        ids: ids,
                                        _method: 'DELETE'
                                    }
                                })
                                .done(function() {
                                    location.reload()
                                })
                        }
                    }
                }
                dtButtons.push(deleteButton)
            @endcan

            $.extend(true, $.fn.dataTable.defaults, {
                orderCellsTop: true,
                order: [
                    [1, 'desc']
                ],
                pageLength: 100,
            });
            let table = $('.datatable-buildingBuildingContractors:not(.ajaxTable)').DataTable({
                buttons: dtButtons
            })
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        })
    </script>
@endsection
