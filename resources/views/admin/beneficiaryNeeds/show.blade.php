@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.beneficiaryNeed.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.beneficiary-needs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiaryNeed.fields.id') }}
                        </th>
                        <td>
                            {{ $beneficiaryNeed->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiaryNeed.fields.unit') }}
                        </th>
                        <td>
                            {{ $beneficiaryNeed->unit->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiaryNeed.fields.description') }}
                        </th>
                        <td>
                            {{ $beneficiaryNeed->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiaryNeed.fields.trmem_type') }}
                        </th>
                        <td>
                            {{ App\Models\BeneficiaryNeed::TRMEM_TYPE_SELECT[$beneficiaryNeed->trmem_type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiaryNeed.fields.photos_before') }}
                        </th>
                        <td>
                            @foreach($beneficiaryNeed->photos_before as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiaryNeed.fields.photos_after') }}
                        </th>
                        <td>
                            @foreach($beneficiaryNeed->photos_after as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiaryNeed.fields.beneficiary') }}
                        </th>
                        <td>
                            {{ $beneficiaryNeed->beneficiary->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.beneficiary-needs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection