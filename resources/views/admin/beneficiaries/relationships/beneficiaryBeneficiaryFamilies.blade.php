<div class="card">
    <div class="card-header" style="font-size: 25px;">
        {{ trans('cruds.beneficiaryFamily.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-beneficiaryFamilies">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiaryFamily.fields.id') }}
                        </th>
                        <td>
                            {{ $beneficiary->id ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiaryFamily.fields.name') }}
                        </th>
                        <td>
                            {{ $beneficiary->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiaryFamily.fields.birth_date') }}
                        </th>
                        <td>
                            {{ $beneficiaryFamilies[0]->birth_date ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiaryFamily.fields.identity_number') }}
                        </th>
                        <td>
                            {{ $beneficiaryFamilies[0]->identity_number ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiaryFamily.fields.identity_photos') }}
                        </th>
                        <td>
                            {{ $beneficiaryFamilies[0]->identity_photos ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiaryFamily.fields.qualifications') }}
                        </th>
                        <td>
                            {{ $beneficiaryFamilies[0]->qualifications ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiaryFamily.fields.marital_status') }}
                        </th>
                        <td>
                            {{ $beneficiaryFamilies[0]->marital_status ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiaryFamily.fields.illness_status') }}
                        </th>
                        <td>
                            {{ $beneficiaryFamilies[0]->illness_status ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiaryFamily.fields.illness_type') }}
                        </th>
                        <td>
                            {{ $beneficiaryFamilies[0]->illness_type ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiaryFamily.fields.job_status') }}
                        </th>
                        <td>
                            {{ $beneficiaryFamilies[0]->job_status ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiaryFamily.fields.job_sallary') }}
                        </th>
                        <td>
                            {{ $beneficiaryFamilies[0]->job_sallary ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiaryFamily.fields.familyrelation') }}
                        </th>
                        <td>
                            {{ $beneficiaryFamilies[0]->familyrelation ?? '' }}
                        </td>
                    </tr>
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
  
  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-beneficiaryFamilies:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .rows.adjust();
  });
  
})

</script>
@endsection