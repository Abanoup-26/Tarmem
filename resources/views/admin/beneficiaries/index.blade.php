@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('cruds.beneficiary.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Beneficiary">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.beneficiary.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.beneficiary.fields.name') }}
                    </th>
                    <th>
                        {{ trans('cruds.beneficiary.fields.birth_date') }}
                    </th>
                    <th>
                        {{ trans('cruds.beneficiary.fields.identity_number') }}
                    </th>
                    <th>
                        {{ trans('cruds.beneficiary.fields.identity_photo') }}
                    </th>
                    <th>
                        {{ trans('cruds.beneficiary.fields.qualifications') }}
                    </th>
                    <th>
                        {{ trans('cruds.beneficiary.fields.job_status') }}
                    </th>
                    <th>
                        {{ trans('cruds.beneficiary.fields.job_title') }}
                    </th>
                    <th>
                        {{ trans('cruds.beneficiary.fields.job_salary') }}
                    </th>
                    <th>
                        {{ trans('cruds.beneficiary.fields.marital_status') }}
                    </th>
                    <th>
                        {{ trans('cruds.beneficiary.fields.marital_state_date') }}
                    </th>
                    <th>
                        {{ trans('cruds.beneficiary.fields.address') }}
                    </th>
                    <th>
                        {{ trans('cruds.beneficiary.fields.illness_status') }}
                    </th>
                    <th>
                        {{ trans('cruds.beneficiary.fields.illness_type') }}
                    </th>
                    <th>
                        {{ trans('cruds.beneficiary.fields.building') }}
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
    ajax: "{{ route('admin.beneficiaries.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'name', name: 'name' },
{ data: 'birth_date', name: 'birth_date' },
{ data: 'identity_number', name: 'identity_number' },
{ data: 'identity_photo', name: 'identity_photo', sortable: false, searchable: false },
{ data: 'qualifications', name: 'qualifications' },
{ data: 'job_status', name: 'job_status' },
{ data: 'job_title', name: 'job_title' },
{ data: 'job_salary', name: 'job_salary' },
{ data: 'marital_status', name: 'marital_status' },
{ data: 'marital_state_date', name: 'marital_state_date' },
{ data: 'address', name: 'address' },
{ data: 'illness_status', name: 'illness_status' },
{ data: 'illness_type_name', name: 'illness_type.name' },
{ data: 'building_building_type', name: 'building.building_type' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-Beneficiary').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection