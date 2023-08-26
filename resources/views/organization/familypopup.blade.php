@php
    $illness_types = \App\Models\Illnesstype::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
    
    $beneficiaries = \App\Models\Beneficiary::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
    
    $familyrelations = \App\Models\Relative::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
    
@endphp


<!-- Modal -->
<div class="modal fade" id="familyModel" tabindex="-1" aria-labelledby="familyModelLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="width: 150%">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="familyModelLabel">Add Family person </h1>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="container ">
                <form method="POST" action="{{ route('organization.beneficiary-families.store') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="required"
                            for="name">{{ trans('cruds.beneficiaryFamily.fields.name') }}</label>
                        <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text"
                            name="name" id="name" value="{{ old('name', '') }}" required>
                        @if ($errors->has('name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.beneficiaryFamily.fields.name_helper') }}</span>
                    </div>
                    <div class="form-group">
                        <label class="required"
                            for="birth_date">{{ trans('cruds.beneficiaryFamily.fields.birth_date') }}</label>
                        <input class="form-control date {{ $errors->has('birth_date') ? 'is-invalid' : '' }}"
                            type="text" name="birth_date" id="birth_date" value="{{ old('birth_date') }}" required>
                        @if ($errors->has('birth_date'))
                            <div class="invalid-feedback">
                                {{ $errors->first('birth_date') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.beneficiaryFamily.fields.birth_date_helper') }}</span>
                    </div>
                    <div class="form-group">
                        <label class="required"
                            for="identity_number">{{ trans('cruds.beneficiaryFamily.fields.identity_number') }}</label>
                        <input class="form-control {{ $errors->has('identity_number') ? 'is-invalid' : '' }}"
                            type="text" name="identity_number" id="identity_number"
                            value="{{ old('identity_number', '') }}" required>
                        @if ($errors->has('identity_number'))
                            <div class="invalid-feedback">
                                {{ $errors->first('identity_number') }}
                            </div>
                        @endif
                        <span
                            class="help-block">{{ trans('cruds.beneficiaryFamily.fields.identity_number_helper') }}</span>
                    </div>
                    <div class="form-group">
                        <label
                            for="identity_photos">{{ trans('cruds.beneficiaryFamily.fields.identity_photos') }}</label>
                        <div class="needsclick dropzone style--two {{ $errors->has('identity_photos') ? 'is-invalid' : '' }}"
                            id="identity_photos-dropzone">
                        </div>
                        @if ($errors->has('identity_photos'))
                            <div class="invalid-feedback">
                                {{ $errors->first('identity_photos') }}
                            </div>
                        @endif
                        <span
                            class="help-block">{{ trans('cruds.beneficiaryFamily.fields.identity_photos_helper') }}</span>
                    </div>
                    <div class="form-group">
                        <label
                            for="qualifications">{{ trans('cruds.beneficiaryFamily.fields.qualifications') }}</label>
                        <input class="form-control {{ $errors->has('qualifications') ? 'is-invalid' : '' }}"
                            type="text" name="qualifications" id="qualifications"
                            value="{{ old('qualifications', '') }}">
                        @if ($errors->has('qualifications'))
                            <div class="invalid-feedback">
                                {{ $errors->first('qualifications') }}
                            </div>
                        @endif
                        <span
                            class="help-block">{{ trans('cruds.beneficiaryFamily.fields.qualifications_helper') }}</span>
                    </div>
                    <div class="form-group">
                        <label class="required">{{ trans('cruds.beneficiaryFamily.fields.marital_status') }}</label>
                        <select class="form-control {{ $errors->has('marital_status') ? 'is-invalid' : '' }}"
                            name="marital_status" id="marital_status" required>
                            <option value disabled {{ old('marital_status', null) === null ? 'selected' : '' }}>
                                {{ trans('global.pleaseSelect') }}</option>
                            @foreach (App\Models\BeneficiaryFamily::MARITAL_STATUS_SELECT as $key => $label)
                                <option value="{{ $key }}"
                                    {{ old('marital_status', '') === (string) $key ? 'selected' : '' }}>
                                    {{ $label }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('marital_status'))
                            <div class="invalid-feedback">
                                {{ $errors->first('marital_status') }}
                            </div>
                        @endif
                        <span
                            class="help-block">{{ trans('cruds.beneficiaryFamily.fields.marital_status_helper') }}</span>
                    </div>
                    <div class="form-group">
                        <label class="required">{{ trans('cruds.beneficiaryFamily.fields.illness_status') }}</label>
                        @foreach (App\Models\BeneficiaryFamily::ILLNESS_STATUS_RADIO as $key => $label)
                            <div class="form-check {{ $errors->has('illness_status') ? 'is-invalid' : '' }}">
                                <input class="form-check-input" type="radio" id="illness_status_{{ $key }}"
                                    name="illness_status" value="{{ $key }}"
                                    {{ old('illness_status', '') === (string) $key ? 'checked' : '' }} required>
                                <label class="form-check-label"
                                    for="illness_status_{{ $key }}">{{ $label }}</label>
                            </div>
                        @endforeach
                        @if ($errors->has('illness_status'))
                            <div class="invalid-feedback">
                                {{ $errors->first('illness_status') }}
                            </div>
                        @endif
                        <span
                            class="help-block">{{ trans('cruds.beneficiaryFamily.fields.illness_status_helper') }}</span>
                    </div>
                    <div class="form-group">
                        <label class="required"
                            for="illness_type_id">{{ trans('cruds.beneficiaryFamily.fields.illness_type') }}</label>
                        <select class="form-control select2 {{ $errors->has('illness_type') ? 'is-invalid' : '' }}"
                            name="illness_type_id" id="illness_type_id" required>
                            @foreach ($illness_types as $id => $entry)
                                <option value="{{ $id }}"
                                    {{ old('illness_type_id') == $id ? 'selected' : '' }}>
                                    {{ $entry }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('illness_type'))
                            <div class="invalid-feedback">
                                {{ $errors->first('illness_type') }}
                            </div>
                        @endif
                        <span
                            class="help-block">{{ trans('cruds.beneficiaryFamily.fields.illness_type_helper') }}</span>
                    </div>
                    <div class="form-group">
                        <label class="required">{{ trans('cruds.beneficiaryFamily.fields.job_status') }}</label>
                        @foreach (App\Models\BeneficiaryFamily::JOB_STATUS_RADIO as $key => $label)
                            <div class="form-check {{ $errors->has('job_status') ? 'is-invalid' : '' }}">
                                <input class="form-check-input" type="radio" id="job_status_{{ $key }}"
                                    name="job_status" value="{{ $key }}"
                                    {{ old('job_status', '') === (string) $key ? 'checked' : '' }} required>
                                <label class="form-check-label"
                                    for="job_status_{{ $key }}">{{ $label }}</label>
                            </div>
                        @endforeach
                        @if ($errors->has('job_status'))
                            <div class="invalid-feedback">
                                {{ $errors->first('job_status') }}
                            </div>
                        @endif
                        <span
                            class="help-block">{{ trans('cruds.beneficiaryFamily.fields.job_status_helper') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="job_sallary">{{ trans('cruds.beneficiaryFamily.fields.job_salary') }}</label>
                        <input class="form-control {{ $errors->has('job_sallary') ? 'is-invalid' : '' }}"
                            type="number" name="job_sallary" id="job_sallary" value="{{ old('job_sallary', '') }}"
                            step="0.01">
                        @if ($errors->has('job_sallary'))
                            <div class="invalid-feedback">
                                {{ $errors->first('job_sallary') }}
                            </div>
                        @endif
                        <span
                            class="help-block">{{ trans('cruds.beneficiaryFamily.fields.job_salary_helper') }}</span>
                    </div>
                    <input type="hidden" name="beneficiary_id" value="{{ $beneficiary_id }}">
                    <div class="form-group">
                        <label
                            for="familyrelation_id">{{ trans('cruds.beneficiaryFamily.fields.familyrelation') }}</label>
                        <select class="form-control select2 {{ $errors->has('familyrelation') ? 'is-invalid' : '' }}"
                            name="familyrelation_id" id="familyrelation_id">
                            @foreach ($familyrelations as $id => $entry)
                                <option value="{{ $id }}"
                                    {{ old('familyrelation_id') == $id ? 'selected' : '' }}>{{ $entry }}
                                </option>
                            @endforeach
                        </select>
                        @if ($errors->has('familyrelation'))
                            <div class="invalid-feedback">
                                {{ $errors->first('familyrelation') }}
                            </div>
                        @endif
                        <span
                            class="help-block">{{ trans('cruds.beneficiaryFamily.fields.familyrelation_helper') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="job_title">{{ trans('cruds.beneficiaryFamily.fields.job_title') }}</label>
                        <input class="form-control {{ $errors->has('job_title') ? 'is-invalid' : '' }}"
                            type="text" name="job_title" id="job_title" value="{{ old('job_title', '') }}">
                        @if ($errors->has('job_title'))
                            <div class="invalid-feedback">
                                {{ $errors->first('job_title') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.beneficiaryFamily.fields.job_title_helper') }}</span>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-danger" type="submit">
                            {{ trans('global.save') }}
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
