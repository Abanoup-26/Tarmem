@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.buildingSupporter.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.building-supporters.update", [$buildingSupporter->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="supporter_id">{{ trans('cruds.buildingSupporter.fields.supporter') }}</label>
                <select class="form-control select2 {{ $errors->has('supporter') ? 'is-invalid' : '' }}" name="supporter_id" id="supporter_id" required>
                    @foreach($supporters as $id => $entry)
                        <option value="{{ $id }}" {{ (old('supporter_id') ? old('supporter_id') : $buildingSupporter->supporter->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('supporter'))
                    <div class="invalid-feedback">
                        {{ $errors->first('supporter') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.buildingSupporter.fields.supporter_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="building_id">{{ trans('cruds.buildingSupporter.fields.building') }}</label>
                <select class="form-control select2 {{ $errors->has('building') ? 'is-invalid' : '' }}" name="building_id" id="building_id" required>
                    @foreach($buildings as $id => $entry)
                        <option value="{{ $id }}" {{ (old('building_id') ? old('building_id') : $buildingSupporter->building->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('building'))
                    <div class="invalid-feedback">
                        {{ $errors->first('building') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.buildingSupporter.fields.building_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.buildingSupporter.fields.supporter_status') }}</label>
                <select class="form-control {{ $errors->has('supporter_status') ? 'is-invalid' : '' }}" name="supporter_status" id="supporter_status">
                    <option value disabled {{ old('supporter_status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\BuildingSupporter::SUPPORTER_STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('supporter_status', $buildingSupporter->supporter_status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('supporter_status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('supporter_status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.buildingSupporter.fields.supporter_status_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection