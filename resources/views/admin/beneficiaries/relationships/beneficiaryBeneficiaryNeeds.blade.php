<div class="card">
    <div class="card-header" >
        {{ trans('cruds.beneficiaryNeed.title_singular') }} {{ trans('global.list') }}
    </div>
    <div class="card-body">
        <div class="table-responsive">

            <table class=" table table-bordered table-striped table-hover datatable datatable-beneficiarybeneficiaryNeeds">
                <thead>
                    <tr>
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
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($beneficiaryNeeds as $key => $beneficiaryNeed)
                        <tr data-entry-id="{{ $beneficiaryNeed->id }}">
                            <td>
                                {{ $beneficiaryNeed->unit->name ?? '' }}
                            </td>
                            <td>
                                {{ $beneficiaryNeed->description ?? '' }}
                            </td>
                            <td>
                                {{ $beneficiaryNeed->trmem_type ?? '' }}
                            </td>
                            <td>
                                {{ $beneficiaryNeed->photos_before ?? '' }}
                            </td>
                            <td>
                                {{ $beneficiaryNeed->photos_after ?? '' }}
                            </td>
                            
                            <td>
                                @can('beneficiary_family_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.beneficiary-families.show', $beneficiaryNeed->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan



                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- <table class=" table table-bordered table-striped table-hover datatable datatable-beneficiarybeneficiaryNeeds">
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
            </table> --}}
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