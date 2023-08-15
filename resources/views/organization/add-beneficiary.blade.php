@extends('layouts.organization')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-30">
                        <!-- Form -->
                        <form action="#">
                            <div id="smartwizard2">
                                <ul class="nav">
                                    <li>
                                        <a class="nav-link inactive" href="#stepp-1">
                                            <i class="icofont-user-alt-7"></i>
                                            <span class="d-block"> بيانات المستفيد</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link inactive" href="#stepp-2">
                                            <i class="icofont-location-pin"></i>
                                            <span class="d-block">إحتياجات المستفيد</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link inactive" href="#stepp-3">
                                            <i class="icofont-check-circled"></i>
                                            <span class="d-block">بيانات الأسرة</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link inactive" href="#stepp-4">
                                        </a>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <div id="stepp-1" class="tab-pane p-0" role="tabpanel" style="display: block;">
                                        <!-- User Details -->
                                        <div class="card-body p-0">


                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <!-- Form Group -->
                                                    <div class="form-group">
                                                        <label class="font-14 bold mb-2">اسم المستفيد</label>
                                                        <input type="text" class="theme-input-style"
                                                            placeholder="اسم المستفيد" required>
                                                    </div>
                                                    <!-- End Form Group -->

                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-group mb-4">
                                                        <label class="mb-2 black bold">تاريخ الميلاد</label>

                                                        <!-- Date Picker -->
                                                        <div class="dashboard-date style--three">
                                                            <span class="input-group-addon">
                                                                <img src="{{asset('frontend/img/svg/calender.svg')}}" alt=""
                                                                    class="svg">
                                                            </span>

                                                            <input type="text" id="default-date"
                                                                placeholder="28 October 2023">
                                                        </div>
                                                        <!-- End Date Picker -->
                                                    </div>


                                                </div>




                                            </div>


                                            <div class="row">

                                                <div class="col-lg-6">
                                                    <!-- Form Group -->
                                                    <div class="form-group">
                                                        <label class="font-14 bold mb-2">رقم الهوية</label>
                                                        <input type="text" class="theme-input-style"
                                                            placeholder="رقم الهوية">
                                                    </div>
                                                    <!-- End Form Group -->
                                                </div>


                                                <div class="col-lg-6">
                                                    <div class="form-group mb-4">
                                                        <label for="myfile" class="mb-2 font-14 bold black"> صورة
                                                            الهوية</label>
                                                        <input type="file" id="myfile" name="myfile"
                                                            class="btn style--two ">
                                                    </div>

                                                </div>


                                            </div>



                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="font-14 bold mb-2">المؤهل</label>
                                                        <select class="form-control">
                                                            <option value="bangladesh">1</option>
                                                            <option value="india">2</option>
                                                            <option value="pakistan">3</option>
                                                            <option value="nepal">4</option>
                                                            <option value="vhutan">5</option>
                                                        </select>
                                                    </div>

                                                </div>

                                                <div class="col-lg-6">

                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label class="font-14 bold mb-2">الحالة الوظيفية</label>
                                                        <select class="form-control">
                                                            <option value="bangladesh">1</option>
                                                            <option value="india">2</option>
                                                            <option value="pakistan">3</option>
                                                            <option value="nepal">4</option>
                                                            <option value="vhutan">5</option>
                                                        </select>
                                                    </div>

                                                </div>

                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label class="font-14 bold mb-2">الراتب </label>
                                                        <input type="text" class="theme-input-style"
                                                            placeholder=" الراتب" required="">
                                                    </div>
                                                </div>

                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label class="font-14 bold mb-2">الوظيفة </label>
                                                        <input type="text" class="theme-input-style"
                                                            placeholder=" الراتب" required="">
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="font-14 bold mb-2">الحالة الصحية</label>
                                                        <select class="form-control">
                                                            <option value="bangladesh">1</option>
                                                            <option value="india">2</option>
                                                            <option value="pakistan">3</option>
                                                            <option value="nepal">4</option>
                                                            <option value="vhutan">5</option>
                                                        </select>
                                                    </div>

                                                </div>



                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="font-14 bold mb-2">نوع المرض </label>
                                                        <select class="form-control">
                                                            <option value="bangladesh">1</option>
                                                            <option value="india">2</option>
                                                            <option value="pakistan">3</option>
                                                            <option value="nepal">4</option>
                                                            <option value="vhutan">5</option>
                                                        </select>
                                                    </div>

                                                </div>

                                            </div>


                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="font-14 bold mb-2"> الوضع الإجتماعي</label>
                                                        <select class="form-control">
                                                            <option value="bangladesh">1</option>
                                                            <option value="india">2</option>
                                                            <option value="pakistan">3</option>
                                                            <option value="nepal">4</option>
                                                            <option value="vhutan">5</option>
                                                        </select>
                                                    </div>

                                                </div>



                                                <div class="col-lg-6">
                                                    <div class="form-group mb-4">
                                                        <label class="mb-2 black bold">التاريخ </label>

                                                        <!-- Date Picker -->
                                                        <div class="dashboard-date style--three">
                                                            <span class="input-group-addon">
                                                                <img src="{{asset('frontend/img/svg/calender.svg')}}" alt=""
                                                                    class="svg">
                                                            </span>

                                                            <input type="text" id="default-date"
                                                                placeholder="28 October 2023">
                                                        </div>
                                                        <!-- End Date Picker -->
                                                    </div>


                                                </div>

                                            </div>
                                        </div>
                                        <!-- End User Details -->
                                    </div>
                                    <div id="stepp-2" class="tab-pane p-0" role="tabpanel" tyle="display: none;">
                                        <!-- Address-->
                                        <div class="card-body p-0">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="font-14 bold mb-2">الوحدة</label>
                                                        <select class="form-control">
                                                            <option value="">1</option>
                                                            <option value="">2</option>
                                                            <option value="">3</option>
                                                            <option value="">4</option>
                                                            <option value="">5</option>
                                                        </select>
                                                    </div>

                                                </div>


                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="font-14 bold mb-2">الإحتياج</label>
                                                        <select class="form-control">
                                                            <option value="">1</option>
                                                            <option value="">2</option>
                                                            <option value="">3</option>
                                                            <option value="">4</option>
                                                            <option value="">5</option>
                                                        </select>
                                                    </div>

                                                </div>


                                                <div class="col-lg-6">
                                                    <div class="form-group mb-4">
                                                        <label for="myfile" class="mb-2 font-14 bold black"> صور قبل
                                                            التاسيس
                                                        </label>
                                                        <br />
                                                        <input type="file" id="myfile" name="myfile"
                                                            class="btn style--two ">
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                        <!-- End Address -->
                                    </div>
                                    <div id="stepp-3" class="tab-pane p-0" role="tabpanel" tyle="display: none;">
                                        <!-- Review-->
                                        <div class="card-body p-0">

                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <!-- Form Group -->
                                                    <div class="form-group">
                                                        <label class="font-14 bold mb-2">اسم المستفيد</label>
                                                        <input type="text" class="theme-input-style"
                                                            placeholder="اسم المستفيد" required="">
                                                    </div>
                                                    <!-- End Form Group -->

                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-group mb-4">
                                                        <label class="mb-2 black bold">تاريخ الميلاد</label>

                                                        <!-- Date Picker -->
                                                        <div class="dashboard-date style--three">
                                                            <span class="input-group-addon">
                                                                <img src="{{asset('frontend/img/svg/calender.svg')}/" alt=""
                                                                    class="svg">
                                                            </span>

                                                            <input type="text" id="default-date"
                                                                placeholder="28 October 2023">
                                                        </div>
                                                        <!-- End Date Picker -->
                                                    </div>


                                                </div>

                                            </div>



                                            <div class="row">

                                                <div class="col-lg-6">
                                                    <!-- Form Group -->
                                                    <div class="form-group">
                                                        <label class="font-14 bold mb-2">رقم الهوية</label>
                                                        <input type="text" class="theme-input-style"
                                                            placeholder="رقم الهوية">
                                                    </div>
                                                    <!-- End Form Group -->
                                                </div>


                                                <div class="col-lg-6">
                                                    <div class="form-group mb-4">
                                                        <label for="myfile" class="mb-2 font-14 bold black"> صورة
                                                            الهوية</label>
                                                        <input type="file" id="myfile" name="myfile"
                                                            class="btn style--two ">
                                                    </div>

                                                </div>


                                            </div>



                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="font-14 bold mb-2">صلة القرابة</label>
                                                        <select class="form-control">
                                                            <option value="bangladesh">1</option>
                                                            <option value="india">2</option>
                                                            <option value="pakistan">3</option>
                                                            <option value="nepal">4</option>
                                                            <option value="vhutan">5</option>
                                                        </select>
                                                    </div>

                                                </div>



                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="font-14 bold mb-2">المؤهل</label>
                                                        <select class="form-control">
                                                            <option value="bangladesh">1</option>
                                                            <option value="india">2</option>
                                                            <option value="pakistan">3</option>
                                                            <option value="nepal">4</option>
                                                            <option value="vhutan">5</option>
                                                        </select>
                                                    </div>

                                                </div>



                                            </div>



                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label class="font-14 bold mb-2">الحالة الوظيفية</label>
                                                        <select class="form-control">
                                                            <option value="bangladesh">1</option>
                                                            <option value="india">2</option>
                                                            <option value="pakistan">3</option>
                                                            <option value="nepal">4</option>
                                                            <option value="vhutan">5</option>
                                                        </select>
                                                    </div>

                                                </div>

                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label class="font-14 bold mb-2">الراتب </label>
                                                        <input type="text" class="theme-input-style"
                                                            placeholder=" الراتب" required="">
                                                    </div>
                                                </div>

                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label class="font-14 bold mb-2">الوظيفة </label>
                                                        <input type="text" class="theme-input-style"
                                                            placeholder=" الراتب" required="">
                                                    </div>
                                                </div>
                                            </div>



                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="font-14 bold mb-2">الحالة الصحية</label>
                                                        <select class="form-control">
                                                            <option value="bangladesh">1</option>
                                                            <option value="india">2</option>
                                                            <option value="pakistan">3</option>
                                                            <option value="nepal">4</option>
                                                            <option value="vhutan">5</option>
                                                        </select>
                                                    </div>

                                                </div>



                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="font-14 bold mb-2">نوع المرض </label>
                                                        <select class="form-control">
                                                            <option value="bangladesh">1</option>
                                                            <option value="india">2</option>
                                                            <option value="pakistan">3</option>
                                                            <option value="nepal">4</option>
                                                            <option value="vhutan">5</option>
                                                        </select>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                        <!-- End Review -->
                                    </div>
                                    <div id="stepp-4" class="tab-pane" role="tabpanel" tyle="display: none;">
                                        <div class="step-done">
                                            <span class="btn-circle done"><i class="icofont-check"></i></span>
                                            <h2 class="text_color font-30 mb-20"> تمت الإضافة </h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- End Form -->
                    </div>



                </div>
            </div>
        </div>
    </div>
    <!-- End Main Content -->
@endsection
