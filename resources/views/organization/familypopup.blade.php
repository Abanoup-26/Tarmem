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
                <h1 class="modal-title fs-5" id="familyModelLabel">اضافة فرد لاسرة المستفيد </h1>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            @if ($errors->count() > 0)
                <div class="alert alert-danger">
                    <ul class="list-unstyled">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="container ">
                <form method="POST" action="{{ route('organization.beneficiary-families.store') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <!-- Beneficiary Details -->
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-4">
                                <!--- name-->
                                <div class="form-group">
                                    <label class="required font-14 bold mb-2"
                                        for="name">{{ trans('cruds.beneficiary.fields.name') }}</label>
                                    <input
                                        class="form-control theme-input-style {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                        type="text" name="name" id="name" placeholder="اسم المستفيد"
                                        value="{{ old('name', '') }}" required>
                                    @if ($errors->has('name'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('name') }}
                                        </div>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.beneficiary.fields.name_helper') }}</span>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <!--- birth_date-->
                                <div class="form-group mb-4">
                                    <label class="required mb-2 black bold"
                                        for="birth_date">{{ trans('cruds.beneficiary.fields.birth_date') }}</label>
                                    <input
                                        class="form-control date {{ $errors->has('birth_date') ? 'is-invalid' : '' }}"
                                        type="text" name="birth_date" id="birth_date" placeholder="تاريخ الميلاد"
                                        value="{{ old('birth_date') }}" required>
                                    @if ($errors->has('birth_date'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('birth_date') }}
                                        </div>
                                    @endif
                                    <span
                                        class="help-block">{{ trans('cruds.beneficiary.fields.birth_date_helper') }}</span>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <!---  address-->
                                <div class="form-group">
                                    <label class="mb-2 black bold"
                                        for="address">{{ trans('cruds.beneficiary.fields.address') }}</label>
                                    <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}"
                                        type="text" name="address" id="address" value="{{ old('address', '') }}">
                                    @if ($errors->has('address'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('address') }}
                                        </div>
                                    @endif
                                    <span
                                        class="help-block">{{ trans('cruds.beneficiary.fields.address_helper') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <!---  identity_number-->
                                <div class="form-group ">
                                    <label class="required font-14 bold mb-2"
                                        for="identity_number">{{ trans('cruds.beneficiary.fields.identity_number') }}</label>
                                    <input
                                        class="form-control theme-input-style {{ $errors->has('identity_number') ? 'is-invalid' : '' }}"
                                        type="text" name="identity_number" id="identity_number"
                                        placeholder="رقم الهوية" value="{{ old('identity_number', '') }}" required>
                                    @if ($errors->has('identity_number'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('identity_number') }}
                                        </div>
                                    @endif
                                    <span
                                        class="help-block">{{ trans('cruds.beneficiary.fields.identity_number_helper') }}</span>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <!---  identity_photo-->
                                <div class="form-group">
                                    <label class="required mb-2 font-14 bold black"
                                        for="family_identity_photo">{{ trans('cruds.beneficiaryFamily.fields.identity_photo') }}</label>
                                    <div class="needsclick dropzone style--three {{ $errors->has('family_identity_photo') ? 'is-invalid' : '' }}"
                                        id="family_identity_photo-dropzone"></div>
                                    @if ($errors->has('family_identity_photo'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('family_identity_photo') }}
                                        </div>
                                    @endif
                                    <span
                                        class="help-block">{{ trans('cruds.beneficiaryFamily.fields.identity_photo_helper') }}</span>
                                </div>

                            </div>
                            <div class="col-lg-4">
                                <!---  qualifications-->
                                <div class="form-group">
                                    <label
                                        class="required font-14 bold mb-2">{{ trans('cruds.beneficiary.fields.qualifications') }}</label>
                                    <select
                                        class="form-control font-14 bold mb-2 {{ $errors->has('qualifications') ? 'is-invalid' : '' }}"
                                        name="qualifications" id="qualifications">
                                        <option value disabled
                                            {{ old('qualifications', null) === null ? 'selected' : '' }}>
                                            {{ trans('global.pleaseSelect') }}</option>
                                        @foreach (App\Models\Beneficiary::QUALIFICATIONS_SELECT as $key => $label)
                                            <option value="{{ $key }}"
                                                {{ old('qualifications', '') === (string) $key ? 'selected' : '' }}>
                                                {{ $label }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('qualifications'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('qualifications') }}
                                        </div>
                                    @endif
                                    <span
                                        class="help-block">{{ trans('cruds.beneficiary.fields.job_status_helper') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <!---  job_status-->
                                <div class="form-group">
                                    <label
                                        class="required font-14 bold mb-2">{{ trans('cruds.beneficiary.fields.job_status') }}</label>
                                    <select
                                        class="form-control font-14 bold mb-2 {{ $errors->has('job_status') ? 'is-invalid' : '' }}"
                                        name="job_status" id="job_status" required>
                                        <option value disabled
                                            {{ old('job_status', null) === null ? 'selected' : '' }}>
                                            {{ trans('global.pleaseSelect') }}</option>
                                        @foreach (App\Models\Beneficiary::JOB_STATUS_RADIO as $key => $label)
                                            <option value="{{ $key }}"
                                                {{ old('job_status', '') === (string) $key ? 'selected' : '' }}>
                                                {{ $label }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('job_status'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('job_status') }}
                                        </div>
                                    @endif
                                    <span
                                        class="help-block">{{ trans('cruds.beneficiary.fields.job_status_helper') }}</span>
                                </div>

                            </div>
                            <div class="col-lg-3">
                                <!---  job_title-->
                                <div class="form-group" id="job_title_container">
                                    <label class="font-14 bold mb-2"
                                        for="job_title">{{ trans('cruds.beneficiary.fields.job_title') }}</label>
                                    <input
                                        class="form-control theme-input-style {{ $errors->has('job_title') ? 'is-invalid' : '' }}"
                                        type="text" name="job_title" id="job_title"
                                        value="{{ old('job_title', '') }}">
                                    @if ($errors->has('job_title'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('job_title') }}
                                        </div>
                                    @endif
                                    <span
                                        class="help-block">{{ trans('cruds.beneficiary.fields.job_title_helper') }}</span>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <!---  job_salary-->
                                <div class="form-group" id="job_sallary_container">
                                    <label class="font-14 bold mb-2"
                                        for="job_salary">{{ trans('cruds.beneficiary.fields.job_salary') }}</label>
                                    <input
                                        class="form-control theme-input-style {{ $errors->has('job_salary') ? 'is-invalid' : '' }}"
                                        type="number" name="job_salary" id="job_salary"
                                        value="{{ old('job_salary', '') }}" step="0.01">
                                    @if ($errors->has('job_salary'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('job_salary') }}
                                        </div>
                                    @endif
                                    <span
                                        class="help-block">{{ trans('cruds.beneficiary.fields.job_salary_helper') }}</span>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <!--Employeer--->
                                <div class="form-group" id="employer_container">
                                    <label class="font-14 bold mb-2"
                                        for="employer">{{ trans('cruds.beneficiary.fields.employer') }}</label>
                                    <input class="form-control {{ $errors->has('employer') ? 'is-invalid' : '' }}"
                                        type="text" name="employer" id="employer"
                                        value="{{ old('employer', '') }}">
                                    @if ($errors->has('employer'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('employer') }}
                                        </div>
                                    @endif
                                    <span
                                        class="help-block">{{ trans('cruds.beneficiary.fields.employer_helper') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <!---  illness_status-->
                                <div class="form-group">
                                    <label
                                        class="required font-14 bold mb-2 ">{{ trans('cruds.beneficiary.fields.illness_status') }}</label>
                                    <select
                                        class="form-control font-14 bold mb-2 {{ $errors->has('illness_status') ? 'is-invalid' : '' }}"
                                        name="illness_status" id="illness_status" required>
                                        <option value disabled
                                            {{ old('illness_status', null) === null ? 'selected' : '' }}>
                                            {{ trans('global.pleaseSelect') }}</option>
                                        @foreach (App\Models\Beneficiary::ILLNESS_STATUS_RADIO as $key => $label)
                                            <option value="{{ $key }}"
                                                {{ old('illness_status', '') === (string) $key ? 'selected' : '' }}>
                                                {{ $label }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('illness_status'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('illness_status') }}
                                        </div>
                                    @endif
                                    <span
                                        class="help-block">{{ trans('cruds.beneficiary.fields.illness_status_helper') }}</span>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <!---  illness_type_id-->
                                <div class="form-group" id="illness_type_container">
                                    <label class="font-14 bold mb-2"
                                        for="illness_type_id">{{ trans('cruds.beneficiary.fields.illness_type') }}</label>
                                    <select
                                        class="form-control select2 {{ $errors->has('illness_type') ? 'is-invalid' : '' }}"
                                        name="illness_type_id" id="illness_type_id">
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
                                        class="help-block">{{ trans('cruds.beneficiary.fields.illness_type_helper') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <!---  marital_status-->
                                <div class="form-group">
                                    <label
                                        class="required">{{ trans('cruds.beneficiary.fields.marital_status') }}</label>
                                    <select
                                        class="form-control font-14 bold mb-2 {{ $errors->has('marital_status') ? 'is-invalid' : '' }}"
                                        name="marital_status" id="marital_status" required>
                                        <option value disabled
                                            {{ old('marital_status', null) === null ? 'selected' : '' }}>
                                            {{ trans('global.pleaseSelect') }}</option>
                                        @foreach (App\Models\Beneficiary::MARITAL_STATUS_SELECT as $key => $label)
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
                                        class="help-block">{{ trans('cruds.beneficiary.fields.marital_status_helper') }}</span>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <!---  marital_state_date-->
                                <div class="form-group mb-4" id="marital_status_date_container">
                                    <label class="mb-2 black bold"
                                        for="marital_state_date">{{ trans('cruds.beneficiary.fields.marital_state_date') }}</label>
                                    <input
                                        class="form-control date {{ $errors->has('marital_state_date') ? 'is-invalid' : '' }}"
                                        type="text" name="marital_state_date" id="marital_state_date"
                                        value="{{ old('marital_state_date') }}">
                                    @if ($errors->has('marital_state_date'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('marital_state_date') }}
                                        </div>
                                    @endif
                                    <span
                                        class="help-block">{{ trans('cruds.beneficiary.fields.marital_state_date_helper') }}</span>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="font-14 bold mb-2"
                                        for="familyrelation_id">{{ trans('cruds.beneficiaryFamily.fields.familyrelation') }}</label>
                                    <select
                                        class="form-control select2 {{ $errors->has('familyrelation') ? 'is-invalid' : '' }}"
                                        name="familyrelation_id" id="familyrelation_id">
                                        @foreach ($familyrelations as $id => $entry)
                                            <option value="{{ $id }}"
                                                {{ old('familyrelation_id') == $id ? 'selected' : '' }}>
                                                {{ $entry }}</option>
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
                            </div>
                        </div>
                    </div>
                    <!-- End Beneficiary Details -->
                    <input type="hidden" name="beneficiary_id" value="{{ $beneficiary_id }}">
                    <input type="hidden" name="building_id" value="{{ $building_id }}">
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
