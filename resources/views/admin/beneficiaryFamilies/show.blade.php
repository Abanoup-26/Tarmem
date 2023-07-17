@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.beneficiaryFamily.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.beneficiary-families.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiaryFamily.fields.id') }}
                        </th>
                        <td>
                            {{ $beneficiaryFamily->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiaryFamily.fields.name') }}
                        </th>
                        <td>
                            {{ $beneficiaryFamily->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiaryFamily.fields.birth_date') }}
                        </th>
                        <td>
                            {{ $beneficiaryFamily->birth_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiaryFamily.fields.identity_number') }}
                        </th>
                        <td>
                            {{ $beneficiaryFamily->identity_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiaryFamily.fields.identity_photos') }}
                        </th>
                        <td>
                            @foreach($beneficiaryFamily->identity_photos as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $media->getUrl('thumb') }}">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiaryFamily.fields.qualifications') }}
                        </th>
                        <td>
                            {{ $beneficiaryFamily->qualifications }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiaryFamily.fields.marital_status') }}
                        </th>
                        <td>
                            {{ App\Models\BeneficiaryFamily::MARITAL_STATUS_SELECT[$beneficiaryFamily->marital_status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiaryFamily.fields.illness_status') }}
                        </th>
                        <td>
                            {{ App\Models\BeneficiaryFamily::ILLNESS_STATUS_RADIO[$beneficiaryFamily->illness_status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiaryFamily.fields.illness_type') }}
                        </th>
                        <td>
                            {{ $beneficiaryFamily->illness_type->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiaryFamily.fields.job_status') }}
                        </th>
                        <td>
                            {{ App\Models\BeneficiaryFamily::JOB_STATUS_RADIO[$beneficiaryFamily->job_status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiaryFamily.fields.job_sallary') }}
                        </th>
                        <td>
                            {{ $beneficiaryFamily->job_sallary }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiaryFamily.fields.beneficiary') }}
                        </th>
                        <td>
                            {{ $beneficiaryFamily->beneficiary->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiaryFamily.fields.familyrelation') }}
                        </th>
                        <td>
                            {{ $beneficiaryFamily->familyrelation->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.beneficiary-families.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection