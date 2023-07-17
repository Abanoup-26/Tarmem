@can('building_contractor_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.building-contractors.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.buildingContractor.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.buildingContractor.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-buildingBuildingContractors">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.buildingContractor.fields.id') }}
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
                            {{ trans('cruds.buildingContractor.fields.contractor') }}
                        </th>
                        <th>
                            {{ trans('cruds.buildingContractor.fields.building') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($buildingContractors as $key => $buildingContractor)
                        <tr data-entry-id="{{ $buildingContractor->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $buildingContractor->id ?? '' }}
                            </td>
                            <td>
                                {{ $buildingContractor->visit_date ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\BuildingContractor::STAGES_SELECT[$buildingContractor->stages] ?? '' }}
                            </td>
                            <td>
                                @if($buildingContractor->contract)
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
                                {{ $buildingContractor->contractor->position ?? '' }}
                            </td>
                            <td>
                                {{ $buildingContractor->building->building_number ?? '' }}
                            </td>
                            <td>
                                @can('building_contractor_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.building-contractors.show', $buildingContractor->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('building_contractor_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.building-contractors.edit', $buildingContractor->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('building_contractor_delete')
                                    <form action="{{ route('admin.building-contractors.destroy', $buildingContractor->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
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
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('building_contractor_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.building-contractors.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-buildingBuildingContractors:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection