@extends('layouts.app')
@section('content')
<div class="mn-vh-100 d-flex align-items-center ">
    <div class="container">
        <!-- Card -->
        <div class="card justify-content-center auth-card">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-9">
                    <img class="logo mb-20" src="{{asset('frontend/img/logo.png')}}">
                    @if($errors->count() > 0)
                    <div class="alert alert-danger">
                        <ul class="list-unstyled">
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if(session('message'))
                    <div class="alert alert-info" role="alert">
                        {{ session('message') }}
                    </div>
                    @endif
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <!-- Form Group -->
                        <div class="form-group mb-20">
                            <label for="email" class="mb-2 font-14 bold black">البريد الإلكتروني</label>
                            <input class="theme-input-style" type="email" name="email" value="{{ old('email') }}"
                                placeholder="البريد الألكتروني" required autofocus autocomplete="email" />
                            @if($errors->has('email'))
                            <div class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </div>
                            @endif
                        </div>
                        <!-- End Form Group -->

                        <!-- Form Group -->
                        <div class="form-group mb-20">
                            <label for="password" class="mb-2 font-14 bold black">كلمة المرور</label>
                            <input class="theme-input-style" type="password" name="password" placeholder="كلمة المرور"
                                required />
                            @if($errors->has('password'))
                            <div class="invalid-feedback">
                                {{ $errors->first('password') }}
                            </div>
                            @endif
                        </div>
                        <!-- End Form Group -->
                        <div class="d-flex justify-content-between mb-20">
                            <div class="d-flex align-items-center">
                                <!-- Custom Checkbox -->
                                <label class="custom-checkbox position-relative ml-2">
                                    <input class="theme-input-style" type="checkbox" name="remember" />
                                    <span class="checkmark"></span>
                                </label>
                                <!-- End Custom Checkbox -->
                                <a class="flote-none" href="javascript:void(0)">تذكرني</a>
                            </div>
                            <a href="" class="font-12 text_color">نسيت كلمه المرور</a>
                        </div>
                        <div class="d-flex align-items-center">
                            <button type="submit" class="btn long ml-20">تسجيل الدخول</button>
                            <span class="font-12 d-block"><a href="{{route('register')}}" class="bold">تسجيل
                                    جهه جديدة</a>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Card -->
    </div>
</div>
@endsection