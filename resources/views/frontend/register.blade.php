@extends('layouts.frontend')
@section('content')
<div class="mn-vh-100 d-flex align-items-center">
    <div class="container">
        <!-- Card -->
        <div class="card justify-content-center auth-card">
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="logo mb-20"><img src="{{asset('frontend/img/logo.png')}}"></div>
                    <form action="#">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="bg-c2-light profile-widget-header mb-20">
                                            <h4 class="d-flex align-items-center">
                                                بيانات الجهه
                                            </h4>
                                        </div>
                                        <!-- Form Group -->
                                        <div class="form-group mb-20">
                                            <label for="l_name" class="mb-2 font-14 bold black">أسم الجهه </label>
                                            <input type="text" id="l_name" class="theme-input-style"
                                                placeholder=" أسم الجهه ">
                                        </div>
                                        <!-- End Form Group -->
                                        <!-- Form Group -->
                                        <div class="form-group mb-4">
                                            <label for="exampleSelect1" class="mb-2 black bold d-block"> نوع
                                                الجهه</label>
                                            <div class="custom-select style--two">
                                                <select class="theme-input-style" id="exampleSelect1">
                                                    <option value="01">01</option>
                                                    <option value="02">02</option>
                                                    <option value="03">03</option>
                                                    <option value="04">04</option>
                                                    <option value="05">05</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- End Form Group -->

                                        <!-- Form Group -->
                                        <div class="form-group mb-20">
                                            <label for="email" class="mb-2 font-14 bold black"> البريد الإلكتروني
                                            </label>
                                            <input type="email" id="email" class="theme-input-style"
                                                placeholder=" info@domainname.com   ">
                                        </div>
                                        <!-- End Form Group -->


                                        <!-- Form Group -->
                                        <div class="form-group mb-20">
                                            <label for="l_name" class="mb-2 font-14 bold black">هاتف أرضي </label>
                                            <input type="text" id="l_name" class="theme-input-style"
                                                placeholder="  هاتف أرضي ">
                                        </div>
                                        <!-- End Form Group -->



                                        <!-- Form Group -->
                                        <div class="form-group mb-20">
                                            <label for="l_name" class="mb-2 font-14 bold black"> جوال </label>
                                            <input type="text" id="l_name" class="theme-input-style"
                                                placeholder=" جوال  ">
                                        </div>
                                        <!-- End Form Group -->


                                        <form action="#">
                                            <label for="myfile" class="mb-2 font-14 bold black">شهادة تسجيل الجمعية
                                                او سجل تجاري عقد الشراكة</label>
                                            <input type="file" id="myfile" name="myfile" class="btn style--two ">
                                        </form>

                                    </div>

                                </div>
                            </div>


                            <div class="col-lg-6">

                                <div class="row">
                                    <div class="col-lg-12">

                                        <div class="bg-c2-light profile-widget-header mb-20">
                                            <h4 class="d-flex align-items-center">
                                                بيانات المفوض
                                            </h4>
                                        </div>
                                        <!-- Form Group -->
                                        <div class="form-group mb-20">
                                            <label for="l_name" class="mb-2 font-14 bold black"> الاسم </label>
                                            <input type="text" id="l_name" class="theme-input-style"
                                                placeholder=" اسم المفوض  ">
                                        </div>
                                        <!-- End Form Group -->



                                        <!-- Form Group -->
                                        <div class="form-group mb-20">
                                            <label for="email" class="mb-2 font-14 bold black"> البريد الإلكتروني
                                            </label>
                                            <input type="email" id="email" class="theme-input-style"
                                                placeholder=" info@domainname.com   ">
                                        </div>
                                        <!-- End Form Group -->


                                        <div class="form-group">
                                            <label class="font-14 bold mb-2">كلمة المرور</label>
                                            <input type="password" class="theme-input-style"
                                                placeholder="كلمة المرور">
                                        </div>


                                        <!-- Form Group -->
                                        <div class="form-group mb-20">
                                            <label for="l_name" class="mb-2 font-14 bold black"> جوال </label>
                                            <input type="text" id="l_name" class="theme-input-style"
                                                placeholder=" جوال  ">
                                        </div>
                                        <!-- End Form Group -->


                                        <form action="#">
                                            <label for="myfile" class="mb-2 font-14 bold black">عقد الشراكة</label>
                                            <input type="file" id="myfile" name="myfile" class="btn style--two ">
                                        </form>


                                    </div>

                                </div>
                            </div>

                        </div>

                        <div class="d-flex align-items-center pt-4">
                            <button type="submit" class="btn long ml-20">تسجيل</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Card -->
    </div>
</div>

@endsection