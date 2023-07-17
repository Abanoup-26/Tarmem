@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.buildingContractor.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.building-contractors.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.buildingContractor.fields.id') }}
                        </th>
                        <td>
                            {{ $buildingContractor->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.buildingContractor.fields.visit_date') }}
                        </th>
                        <td>
                            {{ $buildingContractor->visit_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.buildingContractor.fields.stages') }}
                        </th>
                        <td>
                            {{ App\Models\BuildingContractor::STAGES_SELECT[$buildingContractor->stages] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.buildingContractor.fields.contract') }}
                        </th>
                        <td>
                            @if($buildingContractor->contract)
                                <a href="{{ $buildingContractor->contract->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.buildingContractor.fields.quotation_with_materials') }}
                        </th>
                        <td>
                            {{ $buildingContractor->quotation_with_materials }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.buildingContractor.fields.quotation_without_materials') }}
                        </th>
                        <td>
                            {{ $buildingContractor->quotation_without_materials }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.buildingContractor.fields.contractor') }}
                        </th>
                        <td>
                            {{ $buildingContractor->contractor->position ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.buildingContractor.fields.building') }}
                        </th>
                        <td>
                            {{ $buildingContractor->building->building_number ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.building-contractors.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection