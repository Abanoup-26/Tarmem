<div class="card">
    <div class="card-header">
        {{ trans('cruds.beneficiaryFamily.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-beneficiaryBeneficiaryFamilies">
                <thead>
                    <tr>
                      
                        <th>
                            {{ trans('cruds.beneficiaryFamily.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.beneficiaryFamily.fields.qualifications') }}
                        </th>
                        <th>
                            {{ trans('cruds.beneficiaryFamily.fields.birth_date') }}
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
                                {{ $beneficiaryFamily->name ?? '' }}
                            </td>
                            <td>
                                {{ $beneficiaryFamily->qualifications ?? '' }}
                            </td>
                            <td>
                                {{ $beneficiaryFamily->birth_date ?? '' }}
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
