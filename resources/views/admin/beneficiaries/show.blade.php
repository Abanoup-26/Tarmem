@extends('layouts.admin')
@section('content')
@section('styles')
    <style>
        th {
            width: 25px;
            background-color: rgba(96, 250, 173, 0.512);
            text-align: center;
        }

        td {
            text-align: center;
        }

        .card-header {
            font-size: 25px;
        }
    </style>
@endsection

<div class="row">
    <div class="col-4">
        <div class="card">
            <div class="card-header">
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
                            <tr>
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
                                    @foreach ($beneficiary->identity_photo as $key => $media)
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
                                    {{ App\Models\Beneficiary::QUALIFICATIONS_SELECT[$beneficiary->qualifications] ?? '' }}
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
                                <th rowspan="2" class="m-auto">
                                    <div class="mb-4"> {{ trans('cruds.building.fields.building_number') }}</div>
                                    <div> {{ trans('cruds.building.fields.name') }} </div>
                                </th>
                                <td>
                                    {{ $beneficiary->building->building_number ?? '' }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    {{ $beneficiary->building->name ?? '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.beneficiary.fields.apartment') }}
                                </th>
                                <td>
                                    <span>{{ $beneficiary->apartment ?? '' }}</span>
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
    <div class="col-8">
        <div class="card">
            <div class="card-header">
                {{ trans('global.relatedData') }}
            </div>
            <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
                <li class="nav-item">
                    <a class="nav-link active" href="#beneficiary_beneficiary_families" role="tab"
                        data-toggle="tab">
                        {{ trans('cruds.beneficiaryFamily.title') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#beneficiary_beneficiary_needs" role="tab" data-toggle="tab">
                        {{ trans('cruds.beneficiaryNeed.title') }}
                    </a>
                </li>
            </ul>

            <!---if beneficiary is a family owner family_id will be null  رب/ة الاسره -->
            @if ($beneficiary->family_id == null)
                <div class="tab-content">
                    <div class="tab-pane active" role="tabpanel" id="beneficiary_beneficiary_families">
                        @includeIf('admin.beneficiaries.relationships.beneficiaryFamilies', [
                            'beneficiaryFamilies' => $beneficiary->familyMembers,
                        ])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="beneficiary_beneficiary_needs">
                        @includeIf('admin.beneficiaries.relationships.beneficiaryNeeds', [
                            'beneficiaryNeeds' => $beneficiary->beneficiaryBeneficiaryNeeds,
                        ])
                    </div>
                </div>
                <!---if beneficiary is a family member and i need to get his Family-->
            @elseif ($beneficiary->familyMembers->count() == 0)
                @php
                    $memberIdToRemove = $beneficiary->id;
                    // Load the family_owner and their family_members with 'family_relation' relationship
                    $familyOwner = \App\Models\Beneficiary::with('familyMembers.family_relation')->findOrFail($beneficiary->family_id);
                    $familyOwner->update(['relative_id' => 5]);
                    $familyOwner->save();

                    // Filter the family members to exclude the one to be removed
                    $family = $familyOwner->familyMembers->filter(function ($member) use ($memberIdToRemove) {
                        return $member->id !== $memberIdToRemove;
                    });

                    // Add the family_owner to the filtered family members
                    $family->push($familyOwner);
                @endphp
                <div class="tab-content">
                    <div class="tab-pane active" role="tabpanel" id="beneficiary_beneficiary_families">
                        @includeIf('admin.beneficiaries.relationships.beneficiaryFamilies', [
                            'beneficiaryFamilies' => $family,
                        ])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="beneficiary_beneficiary_needs">
                        @includeIf('admin.beneficiaries.relationships.beneficiaryNeeds', [
                            'beneficiaryNeeds' => $beneficiary->beneficiaryBeneficiaryNeeds,
                        ])
                    </div>
                </div>
            @endif

        </div>
    </div>
</div>
@endsection
