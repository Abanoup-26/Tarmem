@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.organization.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.organizations.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>

                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.organization.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $organization->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.organization.fields.organization_name') }}
                                    </th>
                                    <td>
                                        {{ $organization->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.organization.fields.website') }}
                                    </th>
                                    <td>
                                        {{ $organization->website }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.organization.fields.mobile_number') }}
                                    </th>
                                    <td>
                                        {{ $organization->mobile_number }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.organization.fields.phone_number') }}
                                    </th>
                                    <td>
                                        {{ $organization->phone_number }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.organization.fields.email') }}
                                    </th>
                                    <td>
                                        {{ $organization->email }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.organization.fields.organization_type') }}
                                    </th>
                                    <td>
                                        {{ $organization->organization_type->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.organization.fields.commercial_record') }}
                                    </th>
                                    <td>
                                        @if ($organization->commercial_record)
                                            <a href="{{ $organization->commercial_record->getUrl() }}" target="_blank">
                                                {{ trans('global.view_file') }}
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.organization.fields.partnership_agreement') }}
                                    </th>
                                    <td>
                                        @if ($organization->partnership_agreement)
                                            <a href="{{ $organization->partnership_agreement->getUrl() }}" target="_blank">
                                                {{ trans('global.view_file') }}
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>



                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.organizations.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    بيانات المفوض
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $organization->user->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $organization->user->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.email') }}
                                    </th>
                                    <td>
                                        {{ $organization->user->email }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.position') }}
                                    </th>
                                    <td>
                                        {{ $organization->user->position }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.identity_photos') }}
                                    </th>
                                    <td>
                                        @foreach ($organization->user->identity_photos as $key => $media)
                                            <a href="{{ $media->getUrl() }}" target="_blank">
                                                {{ trans('global.view_file') }}
                                            </a>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.mobile_number') }}
                                    </th>
                                    <td>
                                        {{ $organization->user->mobile_number }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
