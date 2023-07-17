@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('cruds.beneficiaryFamily.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-BeneficiaryFamily">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.beneficiaryFamily.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.beneficiaryFamily.fields.name') }}
                    </th>
                    <th>
                        {{ trans('cruds.beneficiaryFamily.fields.birth_date') }}
                    </th>
                    <th>
                        {{ trans('cruds.beneficiaryFamily.fields.identity_number') }}
                    </th>
                    <th>
                        {{ trans('cruds.beneficiaryFamily.fields.identity_photos') }}
                    </th>
                    <th>
                        {{ trans('cruds.beneficiaryFamily.fields.qualifications') }}
                    </th>
                    <th>
                        {{ trans('cruds.beneficiaryFamily.fields.marital_status') }}
                    </th>
                    <th>
                        {{ trans('cruds.beneficiaryFamily.fields.illness_status') }}
                    </th>
                    <th>
                        {{ trans('cruds.beneficiaryFamily.fields.illness_type') }}
                    </th>
                    <th>
                        {{ trans('cruds.beneficiaryFamily.fields.job_status') }}
                    </th>
                    <th>
                        {{ trans('cruds.beneficiaryFamily.fields.job_sallary') }}
                    </th>
                    <th>
                        {{ trans('cruds.beneficiaryFamily.fields.beneficiary') }}
                    </th>
                    <th>
                        {{ trans('cruds.beneficiaryFamily.fields.familyrelation') }}
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
    ajax: "{{ route('admin.beneficiary-families.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'name', name: 'name' },
{ data: 'birth_date', name: 'birth_date' },
{ data: 'identity_number', name: 'identity_number' },
{ data: 'identity_photos', name: 'identity_photos', sortable: false, searchable: false },
{ data: 'qualifications', name: 'qualifications' },
{ data: 'marital_status', name: 'marital_status' },
{ data: 'illness_status', name: 'illness_status' },
{ data: 'illness_type_name', name: 'illness_type.name' },
{ data: 'job_status', name: 'job_status' },
{ data: 'job_sallary', name: 'job_sallary' },
{ data: 'beneficiary_name', name: 'beneficiary.name' },
{ data: 'familyrelation_name', name: 'familyrelation.name' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-BeneficiaryFamily').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection