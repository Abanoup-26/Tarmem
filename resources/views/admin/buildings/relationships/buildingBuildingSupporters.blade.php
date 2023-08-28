@can('building_supporter_create')
    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.buildingSupporter.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.building-supporters.store') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="building_id" value="{{ $building->id }}">
                <input type="hidden" name="supporter_status" value="pending">
                <div class="form-group">
                    <label class="required" for="supporter_id">{{ trans('cruds.buildingSupporter.fields.supporter') }}</label>
                    <select class="form-control select2 {{ $errors->has('supporter') ? 'is-invalid' : '' }}"
                        name="supporter_id" id="supporter_id" required>
                        @foreach ($supporters as $id => $entry)
                            <option value="{{ $id }}" {{ old('supporter_id') == $id ? 'selected' : '' }}>
                                {{ $entry }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('supporter'))
                        <div class="invalid-feedback">
                            {{ $errors->first('supporter') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.buildingSupporter.fields.supporter_helper') }}</span>
                </div> 
                <div class="form-group">
                    <button class="btn btn-danger" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.buildingSupporter.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table
                class=" table table-bordered table-striped table-hover datatable datatable-buildingBuildingSupporters">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.buildingSupporter.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.buildingSupporter.fields.supporter') }}
                        </th> 
                        <th>
                            {{ trans('cruds.buildingSupporter.fields.supporter_status') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($buildingSupporters as $key => $buildingSupporter)
                        <tr data-entry-id="{{ $buildingSupporter->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $buildingSupporter->id ?? '' }}
                            </td>
                            <td>
                                {{ $buildingSupporter->supporter->user->name ?? '' }}
                            </td> 
                            <td>
                                {{ App\Models\BuildingSupporter::SUPPORTER_STATUS_SELECT[$buildingSupporter->supporter_status] ?? '' }}
                            </td>
                            <td>
                                @can('building_supporter_show')
                                    <a class="btn btn-xs btn-primary"
                                        href="{{ route('admin.building-supporters.show', $buildingSupporter->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan 

                                @can('building_supporter_delete')
                                    <form action="{{ route('admin.building-supporters.destroy', $buildingSupporter->id) }}"
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
            @can('building_supporter_delete')
                let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
                let deleteButton = {
                    text: deleteButtonTrans,
                    url: "{{ route('admin.building-supporters.massDestroy') }}",
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
            let table = $('.datatable-buildingBuildingSupporters:not(.ajaxTable)').DataTable({
                buttons: dtButtons
            })
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        })
    </script>
@endsection
