@extends('layouts.organization')
@section('styles')
    <!-- ======= BEGIN PAGE LEVEL PLUGINS STYLES ======= -->
    <link href=" {{ asset('frontend/plugins/jquery-smartwizard/smart_wizard_all.min.css') }}" rel="stylesheet"
        type="text/css" />
    <!-- ======= END BEGIN PAGE LEVEL PLUGINS STYLES ======= -->
@endsection
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-30">
                        @if ($errors->count() > 0)
                            <div class="alert alert-danger">
                                <ul class="list-unstyled">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <!-- Form -->
                        <form method="POST" action="{{ route('organization.beneficiary.store') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div id="smartwizard2">
                                <ul class="nav">
                                    <li>
                                        <a class="nav-link inactive" href="#stepp-1">
                                            <i class="icofont-user-alt-7"></i>
                                            <span class="d-block"> بيانات المستفيد</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link inactive" href="#stepp-2">
                                            <i class="icofont-location-pin"></i>
                                            <span class="d-block">إحتياجات المستفيد</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link inactive" href="#stepp-3">
                                            <i class="icofont-check-circled"></i>
                                            <span class="d-block">بيانات الأسرة</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link inactive" href="#stepp-4">
                                        </a>
                                    </li>
                                </ul>

                                <div class="tab-content h-100">
                                    <div id="stepp-1" class="tab-pane  p-0" role="tabpanel" style="display: block;">
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
                                                            type="text" name="name" id="name"
                                                            placeholder="اسم المستفيد" value="{{ old('name', '') }}"
                                                            required>
                                                        @if ($errors->has('name'))
                                                            <div class="invalid-feedback">
                                                                {{ $errors->first('name') }}
                                                            </div>
                                                        @endif
                                                        <span
                                                            class="help-block">{{ trans('cruds.beneficiary.fields.name_helper') }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <!--- birth_date-->
                                                    <div class="form-group mb-4">
                                                        <label class="required mb-2 black bold"
                                                            for="birth_date">{{ trans('cruds.beneficiary.fields.birth_date') }}</label>
                                                        <input
                                                            class="form-control date {{ $errors->has('birth_date') ? 'is-invalid' : '' }}"
                                                            type="text" name="birth_date" id="birth_date"
                                                            placeholder="تاريخ الميلاد" value="{{ old('birth_date') }}"
                                                            required>
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
                                                        <input
                                                            class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}"
                                                            type="text" name="address" id="address"
                                                            value="{{ old('address', '') }}">
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
                                                <div class="col-lg-6">
                                                    <!---  identity_number-->
                                                    <div class="form-group ">
                                                        <label class="required font-14 bold mb-2"
                                                            for="identity_number">{{ trans('cruds.beneficiary.fields.identity_number') }}</label>
                                                        <input
                                                            class="form-control theme-input-style {{ $errors->has('identity_number') ? 'is-invalid' : '' }}"
                                                            type="text" name="identity_number" id="identity_number"
                                                            placeholder="رقم الهوية"
                                                            value="{{ old('identity_number', '') }}" required>
                                                        @if ($errors->has('identity_number'))
                                                            <div class="invalid-feedback">
                                                                {{ $errors->first('identity_number') }}
                                                            </div>
                                                        @endif
                                                        <span
                                                            class="help-block">{{ trans('cruds.beneficiary.fields.identity_number_helper') }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <!---  identity_photo-->
                                                    <div class="form-group">
                                                        <label class="required mb-2 font-14 bold black"
                                                            for="identity_photo">{{ trans('cruds.beneficiary.fields.identity_photo') }}</label>
                                                        <div class="needsclick dropzone style--three {{ $errors->has('identity_photo') ? 'is-invalid' : '' }}"
                                                            id="identity_photo-dropzone">
                                                        </div>
                                                        @if ($errors->has('identity_photo'))
                                                            <div class="invalid-feedback">
                                                                {{ $errors->first('identity_photo') }}
                                                            </div>
                                                        @endif
                                                        <span
                                                            class="help-block">{{ trans('cruds.beneficiary.fields.identity_photo_helper') }}</span>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <!---  qualifications-->
                                                    <div class="form-group">
                                                        <label class="required font-14 bold mb-2"
                                                            for="qualifications">{{ trans('cruds.beneficiary.fields.qualifications') }}</label>
                                                        <input
                                                            class="form-control {{ $errors->has('qualifications') ? 'is-invalid' : '' }}"
                                                            type="text" name="qualifications" id="qualifications"
                                                            value="{{ old('qualifications', '') }}" required>
                                                        @if ($errors->has('qualifications'))
                                                            <div class="invalid-feedback">
                                                                {{ $errors->first('qualifications') }}
                                                            </div>
                                                        @endif
                                                        <span
                                                            class="help-block">{{ trans('cruds.beneficiary.fields.qualifications_helper') }}</span>
                                                    </div>
                                                </div>
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
                                                    <div class="form-group">
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
                                                    <div class="form-group">
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
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
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
                                                <div class="col-lg-6">
                                                    <!---  illness_type_id-->
                                                    <div class="form-group">
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
                                                <div class="col-lg-4">
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
                                                <div class="col-lg-4">
                                                    <!---  marital_state_date-->
                                                    <div class="form-group mb-4">
                                                        <label class="mb-2 black bold"
                                                            for="marital_state_date">{{ trans('cruds.beneficiary.fields.marital_state_date') }}</label>
                                                        <input
                                                            class="form-control date {{ $errors->has('marital_state_date') ? 'is-invalid' : '' }}"
                                                            type="text" name="marital_state_date"
                                                            id="marital_state_date"
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
                                                <div class="col-lg-4">
                                                    <!---  building_id-->
                                                    <div class="form-group">
                                                        <label class="required mb-2 black bold"
                                                            for="building_id">{{ trans('cruds.beneficiary.fields.building') }}</label>
                                                        <select
                                                            class="form-control select2 {{ $errors->has('building') ? 'is-invalid' : '' }}"
                                                            name="building_id" id="building_id" required>
                                                            @foreach ($buildings as $id => $entry)
                                                                <option value="{{ $id }}"
                                                                    {{ old('building_id') == $id ? 'selected' : '' }}>
                                                                    {{$id}} {{  $entry }} </option>
                                                            @endforeach
                                                        </select>
                                                        @if ($errors->has('building'))
                                                            <div class="invalid-feedback">
                                                                {{ $errors->first('building') }}
                                                            </div>
                                                        @endif
                                                        <span
                                                            class="help-block">{{ trans('cruds.beneficiary.fields.building_helper') }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Beneficiary Details -->
                                    </div>
                                    <div id="stepp-2" class="tab-pane p-0" role="tabpanel" tyle="display: none;">
                                        <!-- Beneficiary Needs -->
                                        <div class="card-body p-0">
                                            <div class="row justify-content-center">
                                                <div class="col-lg-5">
                                                    <!-- Beneficiary Needs unit_id -->
                                                    <div class="form-group">
                                                        <label class="required font-14 bold mb-2 "
                                                            for="unit_id">{{ trans('cruds.beneficiaryNeed.fields.unit') }}</label>
                                                        <select
                                                            class="form-control select2 {{ $errors->has('unit') ? 'is-invalid' : '' }}"
                                                            name="unit_id" id="unit_id" required>
                                                            @foreach ($units as $id => $entry)
                                                                <option value="{{ $id }}"
                                                                    {{ old('unit_id') == $id ? 'selected' : '' }}>
                                                                    {{ $entry }}</option>
                                                            @endforeach
                                                        </select>
                                                        @if ($errors->has('unit'))
                                                            <div class="invalid-feedback">
                                                                {{ $errors->first('unit') }}
                                                            </div>
                                                        @endif
                                                        <span
                                                            class="help-block">{{ trans('cruds.beneficiaryNeed.fields.unit_helper') }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5">
                                                    <!-- trmem_type -->
                                                    <div class="form-group">
                                                        <label
                                                            class="font-14 bold mb-2">{{ trans('cruds.beneficiaryNeed.fields.trmem_type') }}</label>
                                                        <select
                                                            class="form-control {{ $errors->has('trmem_type') ? 'is-invalid' : '' }}"
                                                            name="trmem_type" id="trmem_type">
                                                            <option value disabled
                                                                {{ old('trmem_type', null) === null ? 'selected' : '' }}>
                                                                {{ trans('global.pleaseSelect') }}</option>
                                                            @foreach (App\Models\BeneficiaryNeed::TRMEM_TYPE_SELECT as $key => $label)
                                                                <option value="{{ $key }}"
                                                                    {{ old('trmem_type', '') === (string) $key ? 'selected' : '' }}>
                                                                    {{ $label }}</option>
                                                            @endforeach
                                                        </select>
                                                        @if ($errors->has('trmem_type'))
                                                            <div class="invalid-feedback">
                                                                {{ $errors->first('trmem_type') }}
                                                            </div>
                                                        @endif
                                                        <span
                                                            class="help-block">{{ trans('cruds.beneficiaryNeed.fields.trmem_type_helper') }}</span>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row justify-content-center">
                                                <div class="col-lg-5">
                                                    <!-- Beneficiary Needs description -->
                                                    <div class="form-group">
                                                        <label class="font-14 bold mb-2"
                                                            for="description">{{ trans('cruds.beneficiaryNeed.fields.description') }}</label>
                                                        <input
                                                            class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}"
                                                            type="text" name="description" id="description"
                                                            value="{{ old('description', '') }}">
                                                        @if ($errors->has('description'))
                                                            <div class="invalid-feedback">
                                                                {{ $errors->first('description') }}
                                                            </div>
                                                        @endif
                                                        <span
                                                            class="help-block">{{ trans('cruds.beneficiaryNeed.fields.description_helper') }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5">
                                                    <!-- photos_before -->
                                                    <div class="form-group mb-4">
                                                        <label class="mb-2 font-14 bold black"
                                                            for="photos_before">{{ trans('cruds.beneficiaryNeed.fields.photos_before') }}</label>
                                                        <div class="needsclick dropzone style--three {{ $errors->has('photos_before') ? 'is-invalid' : '' }}"
                                                            id="photos_before-dropzone">
                                                        </div>
                                                        @if ($errors->has('photos_before'))
                                                            <div class="invalid-feedback">
                                                                {{ $errors->first('photos_before') }}
                                                            </div>
                                                        @endif
                                                        <span
                                                            class="help-block">{{ trans('cruds.beneficiaryNeed.fields.photos_before_helper') }}</span>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- End Beneficiary Needs -->
                                    </div>
                                    <div id="stepp-3" class="tab-pane p-0" role="tabpanel" tyle="display: none;">
                                        <!-- Beneficiary Family -->
                                        <div class="card-body p-0">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <!--name -->
                                                    <div class="form-group">
                                                        <label class="required font-14 bold mb-2"
                                                            for="family_name">{{ trans('cruds.beneficiaryFamily.fields.name') }}</label>
                                                        <input
                                                            class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                                            type="text" name="family_name" id="family_name"
                                                            placeholder="اسم المستفيد" value="{{ old('name', '') }}"
                                                            required>
                                                        @if ($errors->has('name'))
                                                            <div class="invalid-feedback">
                                                                {{ $errors->first('name') }}
                                                            </div>
                                                        @endif
                                                        <span
                                                            class="help-block">{{ trans('cruds.beneficiaryFamily.fields.name_helper') }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <!--birth_date -->
                                                    <div class="form-group mb-4">
                                                        <label class="required mb-2 black bold"
                                                            for="family_birth_date">{{ trans('cruds.beneficiaryFamily.fields.birth_date') }}</label>
                                                        <input
                                                            class="form-control date {{ $errors->has('birth_date') ? 'is-invalid' : '' }}"
                                                            type="text" name="family_birth_date" id="family_birth_date"
                                                            value="{{ old('birth_date') }}" required>
                                                        @if ($errors->has('birth_date'))
                                                            <div class="invalid-feedback">
                                                                {{ $errors->first('birth_date') }}
                                                            </div>
                                                        @endif
                                                        <span
                                                            class="help-block">{{ trans('cruds.beneficiaryFamily.fields.birth_date_helper') }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <!--identity_number -->
                                                    <div class="form-group">
                                                        <label class="required font-14 bold mb-2"
                                                            for="family_identity_number">{{ trans('cruds.beneficiaryFamily.fields.identity_number') }}</label>
                                                        <input
                                                            class="form-control {{ $errors->has('identity_number') ? 'is-invalid' : '' }}"
                                                            type="text" name="family_identity_number" id="family_identity_number"
                                                            value="{{ old('identity_number', '') }}" required>
                                                        @if ($errors->has('identity_number'))
                                                            <div class="invalid-feedback">
                                                                {{ $errors->first('identity_number') }}
                                                            </div>
                                                        @endif
                                                        <span
                                                            class="help-block">{{ trans('cruds.beneficiaryFamily.fields.identity_number_helper') }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <!--identity_photos -->
                                                    <div class="form-group mb-4">
                                                        <label class="required font-14 bold mb-2"
                                                            for="family_identity_photos">{{ trans('cruds.beneficiaryFamily.fields.identity_photos') }}</label>
                                                        <div class="needsclick dropzone style--three{{ $errors->has('identity_photos') ? 'is-invalid' : '' }}"
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
                                                </div>
                                                <div class="col-lg-4">
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
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <!--familyrelation_id -->
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
                                                <div class="col-lg-6">
                                                    <!--qualifications -->
                                                    <div class="form-group">
                                                        <label class="font-14 bold mb-2"
                                                            for="family_qualifications">{{ trans('cruds.beneficiaryFamily.fields.qualifications') }}</label>
                                                        <input
                                                            class="form-control {{ $errors->has('qualifications') ? 'is-invalid' : '' }}"
                                                            type="text" name="family_qualifications" id="family_qualifications"
                                                            value="{{ old('qualifications', '') }}">
                                                        @if ($errors->has('qualifications'))
                                                            <div class="invalid-feedback">
                                                                {{ $errors->first('qualifications') }}
                                                            </div>
                                                        @endif
                                                        <span
                                                            class="help-block">{{ trans('cruds.beneficiaryFamily.fields.qualifications_helper') }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <!--job_status -->
                                                    <div class="form-group">
                                                        <label
                                                            class="required font-14 bold mb-2">{{ trans('cruds.beneficiaryFamily.fields.job_status') }}</label>
                                                        <select
                                                            class="form-control font-14 bold mb-2 {{ $errors->has('job_status') ? 'is-invalid' : '' }}"
                                                            name="family_job_status" id="family_job_status" required>
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
                                                            class="help-block">{{ trans('cruds.beneficiaryFamily.fields.job_status_helper') }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <!--job_salary -->
                                                    <div class="form-group">
                                                        <label class="font-14 bold mb-2"
                                                            for="family_job_salary">{{ trans('cruds.beneficiaryFamily.fields.job_salary') }}</label>
                                                        <input
                                                            class="form-control {{ $errors->has('job_salary') ? 'is-invalid' : '' }}"
                                                            type="number" name="family_job_salary" id="family_job_salary"
                                                            value="{{ old('job_salary', '') }}" step="0.01">
                                                        @if ($errors->has('job_salary'))
                                                            <div class="invalid-feedback">
                                                                {{ $errors->first('job_salary') }}
                                                            </div>
                                                        @endif
                                                        <span
                                                            class="help-block">{{ trans('cruds.beneficiaryFamily.fields.job_salary_helper') }}</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <!--illness_status -->
                                                    <div class="form-group">
                                                        <label
                                                            class="required font-14 bold mb-2">{{ trans('cruds.beneficiaryFamily.fields.illness_status') }}</label>
                                                        <select
                                                            class="form-control font-14 bold mb-2 {{ $errors->has('illness_status') ? 'is-invalid' : '' }}"
                                                            name="family_illness_status" id="family_illness_status" required>
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
                                                            class="help-block">{{ trans('cruds.beneficiaryFamily.fields.illness_status_helper') }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <!--illness_type_id -->
                                                    <div class="form-group">
                                                        <label class="required font-14 bold mb-2"
                                                            for="family_illness_type_id">{{ trans('cruds.beneficiaryFamily.fields.illness_type') }}</label>
                                                        <select
                                                            class="form-control select2 {{ $errors->has('illness_type') ? 'is-invalid' : '' }}"
                                                            name="family_illness_type_id" id="family_illness_type_id" required>
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
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Beneficiary Family -->
                                    </div>
                                    <div id="stepp-4" class="tab-pane" role="tabpanel" tyle="display: none;">
                                        <div class="step-done">
                                            <span class="btn-circle done"><i class="icofont-check"></i></span>
                                            <h2 class="text_color font-30 mb-20"> اذا تم الانتهاء من البيانات برجاء
                                                مراجعتها جيدا والضغط على زر اضافه </h2>
                                            <button class="btn btn-success" type="submit">اضافة</button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </form>
                        <!-- End Form -->
                    </div>



                </div>
            </div>
        </div>
    </div>
    <!-- End Main Content -->
@endsection

@section('scripts')
    <!-- ======= BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS ======= -->
    <script src=" {{ asset('frontend/plugins/jquery-smartwizard/jquery.smartWizard.min.js') }}"></script>
    <script src=" {{ asset('frontend/plugins/jquery-smartwizard/custom-smartWizard.js') }}"></script>
    <script src=" {{ asset('frontend/plugins/jquery.steps/jquery.steps.min.js') }}"></script>
    <script src=" {{ asset('frontend/plugins/jquery.steps/custom-jquery-step.js') }}"></script>
    <!-- ======= End BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS ======= -->
    <!--  identity photo    -->
    <script>
        var uploadedIdentityPhotoMap = {}
        Dropzone.options.identityPhotoDropzone = {
            url: '{{ route('organization.beneficiaries.storeMedia') }}',
            maxFilesize: 4, // MB
            acceptedFiles: '.jpeg,.jpg,.png,.gif',
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 4,
                width: 4096,
                height: 4096
            },
            success: function(file, response) {
                $('form').append('<input type="hidden" name="identity_photo[]" value="' + response.name + '">')
                uploadedIdentityPhotoMap[file.name] = response.name
            },
            removedfile: function(file) {
                console.log(file)
                file.previewElement.remove()
                var name = ''
                if (typeof file.file_name !== 'undefined') {
                    name = file.file_name
                } else {
                    name = uploadedIdentityPhotoMap[file.name]
                }
                $('form').find('input[name="identity_photo[]"][value="' + name + '"]').remove()
            },
            init: function() {
                @if (isset($beneficiary) && $beneficiary->identity_photo)
                    var files = {!! json_encode($beneficiary->identity_photo) !!}
                    for (var i in files) {
                        var file = files[i]
                        this.options.addedfile.call(this, file)
                        this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
                        file.previewElement.classList.add('dz-complete')
                        $('form').append('<input type="hidden" name="identity_photo[]" value="' + file.file_name +
                            '">')
                    }
                @endif
            },
            error: function(file, response) {
                if ($.type(response) === 'string') {
                    var message = response //dropzone sends it's own error messages in string
                } else {
                    var message = response.errors.file
                }
                file.previewElement.classList.add('dz-error')
                _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
                _results = []
                for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                    node = _ref[_i]
                    _results.push(node.textContent = message)
                }

                return _results
            }
        }
    </script>
    <!--  photos_before   -->
    <script>
        var uploadedPhotosBeforeMap = {}
        Dropzone.options.photosBeforeDropzone = {
            url: '{{ route('organization.beneficiary-needs.storeMedia') }}',
            maxFilesize: 2, // MB
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 2
            },
            success: function(file, response) {
                $('form').append('<input type="hidden" name="photos_before[]" value="' + response.name + '">')
                uploadedPhotosBeforeMap[file.name] = response.name
            },
            removedfile: function(file) {
                file.previewElement.remove()
                var name = ''
                if (typeof file.file_name !== 'undefined') {
                    name = file.file_name
                } else {
                    name = uploadedPhotosBeforeMap[file.name]
                }
                $('form').find('input[name="photos_before[]"][value="' + name + '"]').remove()
            },
            init: function() {
                @if (isset($beneficiaryNeed) && $beneficiaryNeed->photos_before)
                    var files =
                        {!! json_encode($beneficiaryNeed->photos_before) !!}
                    for (var i in files) {
                        var file = files[i]
                        this.options.addedfile.call(this, file)
                        file.previewElement.classList.add('dz-complete')
                        $('form').append('<input type="hidden" name="photos_before[]" value="' + file.file_name +
                            '">')
                    }
                @endif
            },
            error: function(file, response) {
                if ($.type(response) === 'string') {
                    var message = response //dropzone sends it's own error messages in string
                } else {
                    var message = response.errors.file
                }
                file.previewElement.classList.add('dz-error')
                _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
                _results = []
                for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                    node = _ref[_i]
                    _results.push(node.textContent = message)
                }

                return _results
            }
        }
    </script>
    <!-- identity photo of family -->
    <script>
        var uploadFamilyIdentityPhotos = {}
        Dropzone.options.identityPhotosDropzone = {
            url: '{{ route('organization.beneficiary-families.storeMedia') }}',
            maxFilesize: 4, // MB
            acceptedFiles: '.jpeg,.jpg,.png,.gif',
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 4,
                width: 4096,
                height: 4096
            },
            success: function(file, response) {
                $('form').append('<input type="hidden" name="family_identity_photos[]" value="' + response.name +
                    '">')
                uploadFamilyIdentityPhotos[file.name] = response.name
            },
            removedfile: function(file) {
                console.log(file)
                file.previewElement.remove()
                var name = ''
                if (typeof file.file_name !== 'undefined') {
                    name = file.file_name
                } else {
                    name = uploadFamilyIdentityPhotos[file.name]
                }
                $('form').find('input[name="family_identity_photos[]"][value="' + name + '"]').remove()
            },
            init: function() {
                @if (isset($beneficiaryFamily) && $beneficiaryFamily->identity_photos)
                    var files = {!! json_encode($beneficiaryFamily->identity_photos) !!}
                    for (var i in files) {
                        var file = files[i]
                        this.options.addedfile.call(this, file)
                        this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
                        file.previewElement.classList.add('dz-complete')
                        $('form').append('<input type="hidden" name="family_identity_photos[]" value="' + file
                            .file_name +
                            '">')
                    }
                @endif
            },
            error: function(file, response) {
                if ($.type(response) === 'string') {
                    var message = response //dropzone sends it's own error messages in string
                } else {
                    var message = response.errors.file
                }
                file.previewElement.classList.add('dz-error')
                _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
                _results = []
                for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                    node = _ref[_i]
                    _results.push(node.textContent = message)
                }

                return _results
            }
        }
    </script>
@endsection
