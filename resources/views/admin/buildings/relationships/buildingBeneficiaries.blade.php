<div class="card">
    <div class="card-header">
        {{ trans('cruds.beneficiary.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-buildingBeneficiaries">
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
                <tbody>
                    @foreach($beneficiaries as $key => $beneficiary)
                        <tr data-entry-id="{{ $beneficiary->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $beneficiary->id ?? '' }}
                            </td>
                            <td>
                                {{ $beneficiary->name ?? '' }}
                            </td>
                            <td>
                                {{ $beneficiary->birth_date ?? '' }}
                            </td>
                            <td>
                                {{ $beneficiary->identity_number ?? '' }}
                            </td>
                            <td>
                                @foreach($beneficiary->identity_photo as $key => $media)
                                    <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $media->getUrl('thumb') }}">
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                {{ $beneficiary->qualifications ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Beneficiary::JOB_STATUS_RADIO[$beneficiary->job_status] ?? '' }}
                            </td>
                            <td>
                                {{ $beneficiary->job_title ?? '' }}
                            </td>
                            <td>
                                {{ $beneficiary->job_salary ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Beneficiary::MARITAL_STATUS_SELECT[$beneficiary->marital_status] ?? '' }}
                            </td>
                            <td>
                                {{ $beneficiary->marital_state_date ?? '' }}
                            </td>
                            <td>
                                {{ $beneficiary->address ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Beneficiary::ILLNESS_STATUS_RADIO[$beneficiary->illness_status] ?? '' }}
                            </td>
                            <td>
                                {{ $beneficiary->illness_type->name ?? '' }}
                            </td>
                            <td>
                                {{ $beneficiary->building->building_number ?? '' }}
                            </td>
                            <td>
                                @can('beneficiary_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.beneficiaries.show', $beneficiary->id) }}">
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
  let table = $('.datatable-buildingBeneficiaries:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection