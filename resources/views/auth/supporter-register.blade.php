@extends('layouts.app')
@section('content')
    <div class="mn-vh-100 d-flex align-items-center">
        <div class="container">
            <!-- Card -->
            <div class="card justify-content-center auth-card">
                <div class="row justify-content-center">
                    <div class="col-xl-10">
                        <div class="logo mb-20"><img src="{{ asset('frontend/img/logo.png') }}"></div>
                        @if ($errors->count() > 0)
                            <div class="alert alert-danger">
                                <ul class="list-unstyled">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('login-supporter') }}" method="post">
                            @csrf
                            <div class="row justify-content-center">
                                <!----User data --->
                                <div class="col-md-8">
                                    <div class="bg-c2-light profile-widget-header mb-20">
                                        <h4 class="text-center">
                                            بيانات الداعم
                                        </h4>
                                    </div>
                                    <!-- User Name -->
                                    <div class="form-group mb-20">
                                        <label class=" mb-2 font-14 bold black required"
                                            for="name">{{ trans('cruds.user.fields.name') }}</label>
                                        <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                            type="text" name="name" id="name" value="{{ old('name', '') }}"
                                            required>
                                        @if ($errors->has('name'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('name') }}
                                            </div>
                                        @endif
                                        <span class="help-block">{{ trans('cruds.user.fields.name_helper') }}</span>
                                    </div>
                                    <!-- End User Name -->

                                    <!-- User Email -->
                                    <div class="form-group mb-20">
                                        <label class=" mb-2 font-14 bold black required"
                                            for="email">{{ trans('cruds.user.fields.email') }}</label>
                                        <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                            type="email" name="email" id="email" value="{{ old('email') }}"
                                            required>
                                        @if ($errors->has('email'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('email') }}
                                            </div>
                                        @endif
                                        <span class="help-block">{{ trans('cruds.user.fields.email_helper') }}</span>
                                    </div>
                                    <!-- End User Email -->

                                    <!--  Password -->
                                    <div class="form-group mb-20">
                                        <label class=" mb-2 font-14 bold black required"
                                            for="password">{{ trans('cruds.user.fields.password') }}</label>
                                        <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                            type="password" name="password" id="password" required>
                                        @if ($errors->has('password'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('password') }}
                                            </div>
                                        @endif
                                        <span class="help-block">{{ trans('cruds.user.fields.password_helper') }}</span>
                                    </div>
                                    <!-- End Password -->

                                    <!-- User Mobile-Number -->
                                    <div class="form-group mb-20">
                                        <label class=" mb-2 font-14 bold black required"
                                            for="mobile_number">{{ trans('cruds.user.fields.mobile_number') }}</label>
                                        <input class="form-control {{ $errors->has('mobile_number') ? 'is-invalid' : '' }}"
                                            type="mobile_number" name="mobile_number" id="mobile_number"
                                            value="{{ old('mobile_number') }}" required>
                                        @if ($errors->has('mobile_number'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('mobile_number') }}
                                            </div>
                                        @endif
                                        <span
                                            class="help-block">{{ trans('cruds.user.fields.mobile_number_helper') }}</span>
                                    </div>
                                    <!-- End User Mobile-Number -->
                                    <!----- Project's name ------>
                                    <div class="form-group">
                                        <label class="required"
                                            for="project_name">{{ trans('cruds.building.fields.project_name') }}</label>
                                        <div style="padding-bottom: 4px">
                                            <span class="btn  btn-xs select-all"
                                                style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                            <span class="btn  btn-xs deselect-all"
                                                style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                                        </div>
                                        <select
                                            class="form-control select2 {{ $errors->has('project_name') ? 'is-invalid' : '' }}"
                                            name="project_name[]" id="project_name" multiple required>
                                            @foreach ($project_name as $id => $role)
                                                <option value="{{ $id }}"
                                                    {{ in_array($id, old('project_name', [])) ? 'selected' : '' }}>
                                                    {{ $role }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('project_name'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('project_name') }}
                                            </div>
                                        @endif
                                        <span
                                            class="help-block">{{ trans('cruds.building.fields.project_name_helper') }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="row justify-content-center pt-4">
                                <button type="submit" class="btn long ml-20 col-4">تسجيل</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- End Card -->
        </div>
    </div>
@endsection

