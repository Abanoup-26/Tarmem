@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.buildingSupporter.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.building-supporters.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.buildingSupporter.fields.id') }}
                        </th>
                        <td>
                            {{ $buildingSupporter->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.buildingSupporter.fields.supporter') }}
                        </th>
                        <td>
                            {{ $buildingSupporter->supporter->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.buildingSupporter.fields.building') }}
                        </th>
                        <td>
                            {{ $buildingSupporter->building->building_type ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.buildingSupporter.fields.supporter_status') }}
                        </th>
                        <td>
                            {{ App\Models\BuildingSupporter::SUPPORTER_STATUS_SELECT[$buildingSupporter->supporter_status] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.building-supporters.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection