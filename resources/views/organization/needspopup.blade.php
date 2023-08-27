@php
    $units = \App\Models\Unit::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
    
    $beneficiaries = \App\Models\Beneficiary::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
@endphp
<!-- Modal -->
<div class="modal fade" id="needsModel" tabindex="-1" aria-labelledby="needsModelLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="width: 150%">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="needsModelLabel">اضافة وحده لاحتياجات المستفيد </h1>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="container">
                @if ($errors->count() > 0)
                    <div class="alert alert-danger">
                        <ul class="list-unstyled">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" action="{{ route('organization.beneficiary-needs.store') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <!-- Beneficiary Needs unit_id -->
                    <div class="form-group">
                        <label class="required" for="unit_id">{{ trans('cruds.beneficiaryNeed.fields.unit') }}</label>
                        <select class="form-control select2 {{ $errors->has('unit') ? 'is-invalid' : '' }}"
                            name="unit_id" id="unit_id" required>
                            @foreach ($units as $id => $entry)
                                <option value="{{ $id }}" {{ old('unit_id') == $id ? 'selected' : '' }}>
                                    {{ $entry }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('unit'))
                            <div class="invalid-feedback">
                                {{ $errors->first('unit') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.beneficiaryNeed.fields.unit_helper') }}</span>
                    </div>
                    <!-- Beneficiary Needs description -->
                    <div class="form-group">
                        <label for="description">{{ trans('cruds.beneficiaryNeed.fields.description') }}</label>
                        <input class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}"
                            type="text" name="description" id="description" value="{{ old('description', '') }}">
                        @if ($errors->has('description'))
                            <div class="invalid-feedback">
                                {{ $errors->first('description') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.beneficiaryNeed.fields.description_helper') }}</span>
                    </div>
                    <!-- Beneficiary Needs trmem_type -->
                    <div class="form-group">
                        <label>{{ trans('cruds.beneficiaryNeed.fields.trmem_type') }}</label>
                        <select class="form-control {{ $errors->has('trmem_type') ? 'is-invalid' : '' }}"
                            name="trmem_type" id="trmem_type">
                            <option value disabled {{ old('trmem_type', null) === null ? 'selected' : '' }}>
                                {{ trans('global.pleaseSelect') }}</option>
                            @foreach (App\Models\BeneficiaryNeed::TRMEM_TYPE_SELECT as $key => $label)
                                <option value="{{ $key }}"
                                    {{ old('trmem_type', '') === (string) $key ? 'selected' : '' }}>
                                    {{ $label }}
                                </option>
                            @endforeach
                        </select>
                        @if ($errors->has('trmem_type'))
                            <div class="invalid-feedback">
                                {{ $errors->first('trmem_type') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.beneficiaryNeed.fields.trmem_type_helper') }}</span>
                    </div>
                    <!-- Beneficiary Needs photos_before -->
                    <div class="form-group">
                        <label for="photos_before">{{ trans('cruds.beneficiaryNeed.fields.photos_before') }}</label>
                        <div class="needsclick dropzone style--three{{ $errors->has('photos_before') ? 'is-invalid' : '' }}"
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
                    <!--  photos_after -->
                    <div class="form-group ">
                        <label for="photos_after">{{ trans('cruds.beneficiaryNeed.fields.photos_after') }}</label>
                        <div class="needsclick dropzone style--three{{ $errors->has('photos_after') ? 'is-invalid' : '' }}"
                            id="photos_after-dropzone">
                        </div>
                        @if ($errors->has('photos_after'))
                            <div class="invalid-feedback">
                                {{ $errors->first('photos_after') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.beneficiaryNeed.fields.photos_after_helper') }}</span>
                    </div>
                    <!--  beneficiary_id -->
                    <input type="hidden" name="beneficiary_id" , value="{{ $beneficiary_id }}">
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
