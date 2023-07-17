@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.contractor.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.contractors.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.contractor.fields.id') }}
                        </th>
                        <td>
                            {{ $contractor->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contractor.fields.position') }}
                        </th>
                        <td>
                            {{ $contractor->position }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contractor.fields.website') }}
                        </th>
                        <td>
                            {{ $contractor->website }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contractor.fields.commercial_record') }}
                        </th>
                        <td>
                            @if($contractor->commercial_record)
                                <a href="{{ $contractor->commercial_record->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contractor.fields.safety_certificate') }}
                        </th>
                        <td>
                            @if($contractor->safety_certificate)
                                <a href="{{ $contractor->safety_certificate->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contractor.fields.tax') }}
                        </th>
                        <td>
                            @if($contractor->tax)
                                <a href="{{ $contractor->tax->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contractor.fields.income') }}
                        </th>
                        <td>
                            @if($contractor->income)
                                <a href="{{ $contractor->income->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contractor.fields.social_insurance') }}
                        </th>
                        <td>
                            @if($contractor->social_insurance)
                                <a href="{{ $contractor->social_insurance->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contractor.fields.human_resources') }}
                        </th>
                        <td>
                            @if($contractor->human_resources)
                                <a href="{{ $contractor->human_resources->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contractor.fields.bank_certificate') }}
                        </th>
                        <td>
                            @if($contractor->bank_certificate)
                                <a href="{{ $contractor->bank_certificate->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contractor.fields.commitment_letter') }}
                        </th>
                        <td>
                            @if($contractor->commitment_letter)
                                <a href="{{ $contractor->commitment_letter->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contractor.fields.user') }}
                        </th>
                        <td>
                            {{ $contractor->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contractor.fields.services') }}
                        </th>
                        <td>
                            @foreach($contractor->services as $key => $services)
                                <span class="label label-info">{{ $services->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.contractors.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection