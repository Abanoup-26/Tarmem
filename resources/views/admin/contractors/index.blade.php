@extends('layouts.admin')
@section('content')
@can('contractor_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.contractors.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.contractor.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.contractor.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Contractor">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.contractor.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.contractor.fields.position') }}
                    </th>
                    <th>
                        {{ trans('cruds.contractor.fields.website') }}
                    </th>
                    <th>
                        {{ trans('cruds.contractor.fields.commercial_record') }}
                    </th>
                    <th>
                        {{ trans('cruds.contractor.fields.safety_certificate') }}
                    </th>
                    <th>
                        {{ trans('cruds.contractor.fields.tax') }}
                    </th>
                    <th>
                        {{ trans('cruds.contractor.fields.income') }}
                    </th>
                    <th>
                        {{ trans('cruds.contractor.fields.social_insurance') }}
                    </th>
                    <th>
                        {{ trans('cruds.contractor.fields.human_resources') }}
                    </th>
                    <th>
                        {{ trans('cruds.contractor.fields.bank_certificate') }}
                    </th>
                    <th>
                        {{ trans('cruds.contractor.fields.commitment_letter') }}
                    </th>
                    <th>
                        {{ trans('cruds.contractor.fields.user') }}
                    </th>
                    <th>
                        {{ trans('cruds.contractor.fields.services') }}
                    </th>
                    <th>
                        &nbsp;
                    </th>
                </tr>
            </thead>
        </table>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('contractor_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.contractors.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
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

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.contractors.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'position', name: 'position' },
{ data: 'website', name: 'website' },
{ data: 'commercial_record', name: 'commercial_record', sortable: false, searchable: false },
{ data: 'safety_certificate', name: 'safety_certificate', sortable: false, searchable: false },
{ data: 'tax', name: 'tax', sortable: false, searchable: false },
{ data: 'income', name: 'income', sortable: false, searchable: false },
{ data: 'social_insurance', name: 'social_insurance', sortable: false, searchable: false },
{ data: 'human_resources', name: 'human_resources', sortable: false, searchable: false },
{ data: 'bank_certificate', name: 'bank_certificate', sortable: false, searchable: false },
{ data: 'commitment_letter', name: 'commitment_letter', sortable: false, searchable: false },
{ data: 'user_name', name: 'user.name' },
{ data: 'services', name: 'services.name' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-Contractor').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection