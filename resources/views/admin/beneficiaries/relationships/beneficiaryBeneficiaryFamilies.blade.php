<div class="card">
    <div class="card-header">
        {{ trans('cruds.beneficiaryFamily.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-beneficiaryBeneficiaryFamilies">
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
                <tbody>
                    @foreach($beneficiaryFamilies as $key => $beneficiaryFamily)
                        <tr data-entry-id="{{ $beneficiaryFamily->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $beneficiaryFamily->id ?? '' }}
                            </td>
                            <td>
                                {{ $beneficiaryFamily->name ?? '' }}
                            </td>
                            <td>
                                {{ $beneficiaryFamily->birth_date ?? '' }}
                            </td>
                            <td>
                                {{ $beneficiaryFamily->identity_number ?? '' }}
                            </td>
                            <td>
                                @foreach($beneficiaryFamily->identity_photos as $key => $media)
                                    <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $media->getUrl('thumb') }}">
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                {{ $beneficiaryFamily->qualifications ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\BeneficiaryFamily::MARITAL_STATUS_SELECT[$beneficiaryFamily->marital_status] ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\BeneficiaryFamily::ILLNESS_STATUS_RADIO[$beneficiaryFamily->illness_status] ?? '' }}
                            </td>
                            <td>
                                {{ $beneficiaryFamily->illness_type->name ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\BeneficiaryFamily::JOB_STATUS_RADIO[$beneficiaryFamily->job_status] ?? '' }}
                            </td>
                            <td>
                                {{ $beneficiaryFamily->job_sallary ?? '' }}
                            </td>
                            <td>
                                {{ $beneficiaryFamily->beneficiary->name ?? '' }}
                            </td>
                            <td>
                                {{ $beneficiaryFamily->familyrelation->name ?? '' }}
                            </td>
                            <td>
                                @can('beneficiary_family_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.beneficiary-families.show', $beneficiaryFamily->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
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
  
  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-beneficiaryBeneficiaryFamilies:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection