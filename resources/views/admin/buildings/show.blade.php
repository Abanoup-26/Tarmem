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
    <div class="col-4">
        <div class="card">
            <div class="card-header">
                {{ trans('global.show') }} {{ trans('cruds.building.title') }}
            </div>
        
            <div class="card-body">
                <div class="form-group">
                    <div class="form-group">
                        <a class="btn btn-default" href="{{ route('admin.buildings.index') }}">
                            {{ trans('global.back_to_list') }}
                        </a>
                    </div>
                    <table class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <th>
                                    {{ trans('cruds.building.fields.id') }}
                                </th>
                                <td>
                                    {{ $building->id }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.building.fields.building_type') }}
                                </th>
                                <td>
                                    {{ App\Models\Building::BUILDING_TYPE_SELECT[$building->building_type] ?? '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.building.fields.building_number') }}
                                </th>
                                <td>
                                    {{ $building->building_number }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.building.fields.floor_count') }}
                                </th>
                                <td>
                                    {{ $building->floor_count }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.building.fields.apartments_count') }}
                                </th>
                                <td>
                                    {{ $building->apartments_count }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.building.fields.birth_data') }}
                                </th>
                                <td>
                                    {{ $building->birth_data }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.building.fields.latitude') }}
                                </th>
                                <td>
                                    {{ $building->latitude }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.building.fields.longtude') }}
                                </th>
                                <td>
                                    {{ $building->longtude }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.building.fields.building_photos') }}
                                </th>
                                <td>
                                    @foreach($building->building_photos as $key => $media)
                                        <a href="{{ $media->getUrl() }}" target="_blank">
                                            {{ trans('global.view_file') }}
                                        </a>
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.building.fields.management_statuses') }}
                                </th>
                                <td>
                                    {{ App\Models\Building::MANAGEMENT_STATUSES_SELECT[$building->management_statuses] ?? '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.building.fields.rejected_reson') }}
                                </th>
                                <td>
                                    {{ $building->rejected_reson }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.building.fields.stages') }}
                                </th>
                                <td>
                                    {{ App\Models\Building::STAGES_SELECT[$building->stages] ?? '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.building.fields.research_vist_date') }}
                                </th>
                                <td>
                                    {{ $building->research_vist_date }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.building.fields.research_vist_result') }}
                                </th>
                                <td>
                                    @if($building->research_vist_result)
                                        <a href="{{ $building->research_vist_result->getUrl() }}" target="_blank">
                                            {{ trans('global.view_file') }}
                                        </a>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.building.fields.engineering_vist_date') }}
                                </th>
                                <td>
                                    {{ $building->engineering_vist_date }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.building.fields.engineering_vist_result') }}
                                </th>
                                <td>
                                    @if($building->engineering_vist_result)
                                        <a href="{{ $building->engineering_vist_result->getUrl() }}" target="_blank">
                                            {{ trans('global.view_file') }}
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="form-group">
                        <a class="btn btn-default" href="{{ route('admin.buildings.index') }}">
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
                    <a class="nav-link" href="#building_building_contractors" role="tab" data-toggle="tab">
                        {{ trans('cruds.buildingContractor.title') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#building_beneficiaries" role="tab" data-toggle="tab">
                        {{ trans('cruds.beneficiary.title') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#building_building_supporters" role="tab" data-toggle="tab">
                        {{ trans('cruds.buildingSupporter.title') }}
                    </a>
                </li>
            </ul>
            
            <div class="tab-content">
                <div class="tab-pane" role="tabpanel" id="building_building_contractors">
                    @includeIf('admin.buildings.relationships.buildingBuildingContractors', ['buildingContractors' => $building->buildingBuildingContractors])
                </div>
                <div class="tab-pane" role="tabpanel" id="building_beneficiaries">
                    @includeIf('admin.buildings.relationships.buildingBeneficiaries', ['beneficiaries' => $building->buildingBeneficiaries])
                </div>
                <div class="tab-pane" role="tabpanel" id="building_building_supporters">
                    @includeIf('admin.buildings.relationships.buildingBuildingSupporters', ['buildingSupporters' => $building->buildingBuildingSupporters])
                </div>
            </div>
        </div>
        
    </div>
</div>



@endsection