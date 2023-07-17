<div class="card">
    <div class="card-header" >
        {{ trans('cruds.beneficiaryNeed.title_singular') }} {{ trans('global.list') }}
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-beneficiaryBeneficiaryFamilies">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiary.fields.id') }}
                        </th>
                        <td>
                            {{ $beneficiary->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiaryNeed.fields.unit') }}
                        </th>
                        <td>
                            {{ $beneficiaryNeeds[0]->unit_id ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiaryNeed.fields.description') }}
                        </th>
                        <td>
                            {{ $beneficiaryNeeds[0]->description ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiaryNeed.fields.trmem_type') }}
                        </th>
                        <td>
                            {{ $beneficiaryNeeds[0]->trmem_type ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiaryNeed.fields.photos_before') }}
                        </th>
                        <td>
                            {{ $beneficiaryNeeds[0]->photos_before ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiaryNeed.fields.photos_after') }}
                        </th>
                        <td>
                            {{ $beneficiaryNeeds[0]->photos_after ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiaryNeed.fields.beneficiary') }}
                        </th>
                        <td>
                            {{ $beneficiaryNeeds[0]->beneficiary_id ?? '' }}
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
  let table = $('.datatable-beneficiaryBeneficiaryNeeds:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .rows.adjust();
  });
  
})

</script>
@endsection