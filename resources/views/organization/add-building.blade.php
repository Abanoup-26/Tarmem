@extends('layouts.organization')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <!-- Base Control -->
                    <div class="form-element base-control mb-30">
                        <h4 class="font-20 mb-4">إضافة مبني </h4>

                        <!-- Form -->
                        <form action="#" method="POST">

                            <!-- Form Group -->
                            <div class="form-group mb-4">
                                <label for="numb" class="mb-2 black bold">رقم الصك </label>
                                <input type="numb" class="theme-input-style" id="numb" placeholder="رقم الصك">
                            </div>
                            <!-- End Form Group -->



                            <!-- Form Group -->
                            <div class="form-group mb-4">
                                <label for="exampleSelect1" class="mb-2 black bold d-block">نوع المبنى </label>
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
                            <div class="form-group mb-4">
                                <label class="mb-2 black bold">تاريخ المبنى</label>

                                <!-- Date Picker -->
                                <div class="dashboard-date style--three">
                                    <span class="input-group-addon">
                                        <img src="{{asset('frontend/img/svg/calender.svg')}}" alt="" class="svg">
                                    </span>

                                    <input type="text" id="default-date" placeholder="28 October 2023">
                                </div>
                                <!-- End Date Picker -->
                            </div>
                            <!-- End Form Group -->

                            <!-- Form Group -->
                            <div class="form-group mb-4">
                                <label for="numb" class="mb-2 black bold">عدد الشقق </label>
                                <input type="numb" class="theme-input-style" id="numb" placeholder=" عدد الشقق ">
                            </div>
                            <!-- End Form Group -->


                            <!-- Form Group -->
                            <div class="form-group mb-4">
                                <label for="numb" class="mb-2 black bold"> عدد الأدوار </label>
                                <input type="numb" class="theme-input-style" id="numb" placeholder=" عدد الادوار">
                            </div>
                            <!-- End Form Group -->




                            <div class="form-group mb-4">
                                <label for="myfile" class="mb-2 font-14 bold black">صور المبنى من الخارج </label>
                                <input type="file" id="myfile" name="myfile" class="btn style--two ">
                            </div>




                            <!-- Form Group -->
                            <div class="form-group mb-4">
                                <label for="exampleSelect1" class="mb-2 black bold d-block"> المدينة </label>
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
                            <div class="form-group mb-4">
                                <label for="exampleSelect1" class="mb-2 black bold d-block">الحي </label>
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
                            <!-- Button Group -->
                            <div class="button-group pt-1">
                                <button type="reset" class="btn long">إضافة</button>
                                <button type="reset" class="link-btn bg-transparent mr-3 soft-pink">إلغاء</button>
                            </div>
                            <!-- End Button Group -->
                        </form>
                        <!-- End Form -->
                    </div>
                    <!-- End Base Control -->


                </div>
            </div>
        </div>
    </div>
    <!-- End Main Content -->
@endsection