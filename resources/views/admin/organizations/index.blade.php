@extends('layouts.admin')
@section('content')
@can('organization_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.organizations.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.organization.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.organization.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Organization">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.organization.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.organization.fields.organization_name') }}
                    </th>
                    <th>
                        {{ trans('cruds.user.fields.name') }}
                    </th>
                    <th>
                        {{ trans('cruds.organization.fields.website') }}
                    </th>
                    <th>
                        {{ trans('cruds.organization.fields.mobile_number') }}
                    </th>
                    <th>
                        {{ trans('cruds.organization.fields.phone_number') }}
                    </th>
                    <th>
                        {{ trans('cruds.organization.fields.email') }}
                    </th>
                    <th>
                        {{ trans('cruds.organization.fields.organization_type') }}
                    </th>
                    <th>
                        {{ trans('cruds.organization.fields.commercial_record') }}
                    </th>
                    <th>
                        {{ trans('cruds.organization.fields.partnership_agreement') }}
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
@can('organization_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.organizations.massDestroy') }}",
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
    ajax: "{{ route('admin.organizations.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'name', name: 'organization_name' },
{ data: 'user_name', name: 'user_name' },
{ data: 'website', name: 'website' },
{ data: 'mobile_number', name: 'mobile_number' },
{ data: 'phone_number', name: 'phone_number' },
{ data: 'email', name: 'email' },
{ data: 'organization_type_name', name: 'organization_type.name' },
{ data: 'commercial_record', name: 'commercial_record', sortable: false, searchable: false },
{ data: 'partnership_agreement', name: 'partnership_agreement', sortable: false, searchable: false },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-Organization').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection