@extends('layouts.admin')
@section('content')

@section('styles')
<style>
    th
    {
        width:25px;
        background-color: rgba(96, 250, 173, 0.512);
        text-align: center;
    }
    td{
        text-align: center;
    }
    .card-header{
        font-size: 25px;
    }
</style>
@endsection

<div class="row">
    <div class="col-4"><div class="card">
        <div class="card-header" >
            {{ trans('global.show') }} {{ trans('cruds.beneficiary.title') }}
        </div>
    
        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.beneficiaries.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
    
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th>
                                {{ trans('cruds.beneficiary.fields.id') }}
                            </th>
                            <td>
                                {{ $beneficiary->id }}
                            </td>
                        </tr>
                        <tr >
                            <th class="w-25 p-2">
                                {{ trans('cruds.beneficiary.fields.name') }}
                            </th>
                            <td>
                                {{ $beneficiary->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.beneficiary.fields.birth_date') }}
                            </th>
                            <td>
                                {{ $beneficiary->birth_date }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.beneficiary.fields.identity_number') }}
                            </th>
                            <td>
                                {{ $beneficiary->identity_number }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.beneficiary.fields.identity_photo') }}
                            </th>
                            <td>
                                @foreach($beneficiary->identity_photo as $key => $media)
                                    <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $media->getUrl('thumb') }}">
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.beneficiary.fields.qualifications') }}
                            </th>
                            <td>
                                {{ $beneficiary->qualifications }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.beneficiary.fields.job_status') }}
                            </th>
                            <td>
                                {{ App\Models\Beneficiary::JOB_STATUS_RADIO[$beneficiary->job_status] ?? '' }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.beneficiary.fields.job_title') }}
                            </th>
                            <td>
                                {{ $beneficiary->job_title }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.beneficiary.fields.job_salary') }}
                            </th>
                            <td>
                                {{ $beneficiary->job_salary }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.beneficiary.fields.marital_status') }}
                            </th>
                            <td>
                                {{ App\Models\Beneficiary::MARITAL_STATUS_SELECT[$beneficiary->marital_status] ?? '' }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.beneficiary.fields.marital_state_date') }}
                            </th>
                            <td>
                                {{ $beneficiary->marital_state_date }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.beneficiary.fields.address') }}
                            </th>
                            <td>
                                {{ $beneficiary->address }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.beneficiary.fields.illness_status') }}
                            </th>
                            <td>
                                {{ App\Models\Beneficiary::ILLNESS_STATUS_RADIO[$beneficiary->illness_status] ?? '' }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.beneficiary.fields.illness_type') }}
                            </th>
                            <td>
                                {{ $beneficiary->illness_type->name ?? '' }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.beneficiary.fields.building') }}
                            </th>
                            <td>
                                {{ $beneficiary->building->id ?? '' }}
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.beneficiaries.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="col-8"><div class="card">
        <div class="card-header">
            {{ trans('global.relatedData') }}
        </div>
        <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
            <li class="nav-item">
                <a class="nav-link active" href="#beneficiary_beneficiary_families" role="tab" data-toggle="tab">
                    {{ trans('cruds.beneficiaryFamily.title') }}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="#beneficiary_beneficiary_needs" role="tab" data-toggle="tab">
                    {{ trans('cruds.beneficiaryNeed.title') }}
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" role="tabpanel" id="beneficiary_beneficiary_families">
                @includeIf('admin.beneficiaries.relationships.beneficiaryBeneficiaryFamilies', ['beneficiaryFamilies' => $beneficiary->beneficiaryBeneficiaryFamilies])
            </div>
            <div class="tab-pane" role="tabpanel" id="beneficiary_beneficiary_needs">
                @includeIf('admin.beneficiaries.relationships.beneficiaryBeneficiaryneeds', ['beneficiaryNeeds' => $beneficiary->beneficiaryBeneficiaryNeeds])
            </div>
        </div>
    </div></div>
</div>




@endsection