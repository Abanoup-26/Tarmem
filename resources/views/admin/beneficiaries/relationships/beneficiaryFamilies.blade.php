<div class="card">
    <div class="card-header">
        {{ trans('cruds.beneficiaryFamily.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table
                class=" table table-bordered table-striped table-hover datatable datatable-beneficiaryBeneficiaryFamilies">
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

                    @foreach ($beneficiaryFamilies as $key => $beneficiaryFamily)
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
                                {{ $beneficiaryFamily->family_relation->name ?? '' }}
                            </td>

                            <td>
                                @can('beneficiary_show')
                                    <a class="btn btn-xs btn-primary"
                                        href="{{ route('admin.beneficiaries.show', $beneficiaryFamily->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                                @can('beneficiary_change')
                                    @if (!isset($beneficiaryFamily->apartment) && isset($beneficiaryFamily->family_id))
                                        <a class="btn btn-xs btn-info"
                                            href="{{ route('admin.beneficiaries.change', $beneficiaryFamily->id) }}">
                                            تحويل الى مستفيد
                                        </a>
                                    @else
                                        <p class="alert alert-warning"> مستفيد رئيسي </p>
                                    @endif
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
