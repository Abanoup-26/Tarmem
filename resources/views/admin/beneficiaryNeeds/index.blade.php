@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('cruds.beneficiaryNeed.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-BeneficiaryNeed">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.beneficiaryNeed.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.beneficiaryNeed.fields.unit') }}
                    </th>
                    <th>
                        {{ trans('cruds.beneficiaryNeed.fields.description') }}
                    </th>
                    <th>
                        {{ trans('cruds.beneficiaryNeed.fields.trmem_type') }}
                    </th>
                    <th>
                        {{ trans('cruds.beneficiaryNeed.fields.photos_before') }}
                    </th>
                    <th>
                        {{ trans('cruds.beneficiaryNeed.fields.photos_after') }}
                    </th>
                    <th>
                        {{ trans('cruds.beneficiaryNeed.fields.beneficiary') }}
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
  
  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.beneficiary-needs.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'unit_name', name: 'unit.name' },
{ data: 'description', name: 'description' },
{ data: 'trmem_type', name: 'trmem_type' },
{ data: 'photos_before', name: 'photos_before', sortable: false, searchable: false },
{ data: 'photos_after', name: 'photos_after', sortable: false, searchable: false },
{ data: 'beneficiary_name', name: 'beneficiary.name' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-BeneficiaryNeed').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection