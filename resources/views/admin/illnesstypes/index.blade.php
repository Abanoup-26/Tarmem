@extends('layouts.admin')
@section('content')
@can('illnesstype_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.illnesstypes.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.illnesstype.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.illnesstype.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Illnesstype">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.illnesstype.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.illnesstype.fields.name') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($illnesstypes as $key => $illnesstype)
                        <tr data-entry-id="{{ $illnesstype->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $illnesstype->id ?? '' }}
                            </td>
                            <td>
                                {{ $illnesstype->name ?? '' }}
                            </td>
                            <td>
                                @can('illnesstype_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.illnesstypes.show', $illnesstype->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('illnesstype_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.illnesstypes.edit', $illnesstype->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('illnesstype_delete')
                                    <form action="{{ route('admin.illnesstypes.destroy', $illnesstype->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('illnesstype_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.illnesstypes.massDestroy') }}",
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
  let table = $('.datatable-Illnesstype:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection