@extends('layouts.admin')

@section('styles')
    <style>
        .title {
            font-weight: bold;
            font-size: 20px;
        }

        .sub-title {
            font-size: 15px;
            font-weight: 400;
        }

        .container {
            width: 100%;
        }

        /* proggress bar */
        .progressbar {
            counter-reset: step;
        }

        .progressbar {
            list-style: none;
            display: flex;
            justify-content: flex-start;
            /* Align steps to the right */
            margin: 0;
            padding: 0;
            flex-direction: row;
            /* Reverse the direction */
        }

        .progressbar li {
            width: 13.2551%;
            position: relative;
            text-align: center;
            cursor: pointer;
        }

        .progressbar li:before {
            content: counter(step);
            counter-increment: step;
            width: 30px;
            height: 30px;
            line-height: 30px;
            border: 2px solid #ddd;
            border-radius: 100%;
            display: block;
            text-align: center;
            margin: 0 auto 10px auto;
            background-color: #fff;
        }

        .progressbar li:after {
            content: "";
            position: absolute;
            width: 100%;
            height: 1px;
            background-color: #4d3a34;
            top: 15px;
            right: 50%;
            z-index: -1;
        }

        .progressbar li:last-child:after {
            content: none;
        }

        .progressbar li.active {
            color: rgba(255, 123, 123, 0.897);
        }

        .progressbar li.active:before {
            border-color: rgba(255, 123, 123, 0.752);
        }

        /* Add this block to style "done" items */
        .progressbar li.done:before {
            background-color: rgba(255, 123, 123, 0.752);
            /* Set the circle background color to green */
            border-color: rgba(255, 123, 123, 0.752);
            /* Set the circle border color to yellow */
            color: white;
            /* Set the circle text color */
        }

        .card {
            border-radius: 25px !important;

        }
    </style>
@endsection
@section('content')
    @include('admin.buildings.stages')
    <div class="row text-start">
        <div class="col-2 mb-2">
            <svg width="25" height="37" viewBox="0 0 25 37" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M4.92507 36.9335H0.685307C0.503552 36.9335 0.329242 36.8613 0.200722 36.7328C0.0722021 36.6042 0 36.4299 0 36.2482V2.98794C0.000504671 2.85381 0.0401002 2.72273 0.113941 2.61075C0.187781 2.49878 0.292664 2.41075 0.415753 2.35746L4.92507 0.429459V36.9335ZM25 0.685307V36.2482C25 36.4299 24.9278 36.6042 24.7993 36.7328C24.6708 36.8613 24.4964 36.9335 24.3147 36.9335H6.29569V0H24.3147C24.4964 0 24.6708 0.0722017 24.7993 0.200722C24.9278 0.329242 25 0.503552 25 0.685307ZM14.3686 31.1495C14.3686 30.9677 14.2964 30.7934 14.1679 30.6649C14.0394 30.5364 13.8651 30.4642 13.6833 30.4642H10.9421V27.7229C10.9421 27.5412 10.8699 27.3669 10.7413 27.2384C10.6128 27.1098 10.4385 27.0376 10.2568 27.0376C10.075 27.0376 9.9007 27.1098 9.77218 27.2384C9.64366 27.3669 9.57146 27.5412 9.57146 27.7229V31.1586C9.57146 31.3404 9.64366 31.5147 9.77218 31.6432C9.9007 31.7717 10.075 31.8439 10.2568 31.8439H13.6879C13.7782 31.8433 13.8676 31.8249 13.9508 31.7896C14.0341 31.7543 14.1095 31.7029 14.1727 31.6384C14.236 31.5738 14.2859 31.4974 14.3195 31.4135C14.3531 31.3296 14.3698 31.2399 14.3686 31.1495ZM14.3686 24.2964C14.3686 24.1147 14.2964 23.9403 14.1679 23.8118C14.0394 23.6833 13.8651 23.6111 13.6833 23.6111H10.9421V20.8699C10.9421 20.6881 10.8699 20.5138 10.7413 20.3853C10.6128 20.2568 10.4385 20.1846 10.2568 20.1846C10.075 20.1846 9.9007 20.2568 9.77218 20.3853C9.64366 20.5138 9.57146 20.6881 9.57146 20.8699V24.3056C9.57146 24.4873 9.64366 24.6616 9.77218 24.7901C9.9007 24.9187 10.075 24.9909 10.2568 24.9909H13.6879C13.7782 24.9903 13.8676 24.9718 13.9508 24.9365C14.0341 24.9012 14.1095 24.8498 14.1727 24.7853C14.236 24.7208 14.2859 24.6443 14.3195 24.5604C14.3531 24.4765 14.3698 24.3868 14.3686 24.2964ZM14.3686 16.9865C14.3686 16.8047 14.2964 16.6304 14.1679 16.5019C14.0394 16.3734 13.8651 16.3012 13.6833 16.3012H10.9421V13.5599C10.9421 13.3782 10.8699 13.2039 10.7413 13.0754C10.6128 12.9468 10.4385 12.8746 10.2568 12.8746C10.075 12.8746 9.9007 12.9468 9.77218 13.0754C9.64366 13.2039 9.57146 13.3782 9.57146 13.5599V16.9956C9.57146 17.1774 9.64366 17.3517 9.77218 17.4802C9.9007 17.6087 10.075 17.6809 10.2568 17.6809H13.6879C13.7782 17.6803 13.8676 17.6619 13.9508 17.6266C14.0341 17.5913 14.1095 17.5399 14.1727 17.4754C14.236 17.4108 14.2859 17.3344 14.3195 17.2505C14.3531 17.1666 14.3698 17.0769 14.3686 16.9865ZM14.3686 9.21966C14.3686 9.03791 14.2964 8.8636 14.1679 8.73508C14.0394 8.60656 13.8651 8.53436 13.6833 8.53436H10.9421V5.79313C10.9421 5.61137 10.8699 5.43706 10.7413 5.30854C10.6128 5.18002 10.4385 5.10782 10.2568 5.10782C10.075 5.10782 9.9007 5.18002 9.77218 5.30854C9.64366 5.43706 9.57146 5.61137 9.57146 5.79313V9.2288C9.57146 9.41055 9.64366 9.58487 9.77218 9.71339C9.9007 9.84191 10.075 9.91411 10.2568 9.91411H13.6879C13.7782 9.91351 13.8676 9.89504 13.9508 9.85977C14.0341 9.82449 14.1095 9.77309 14.1727 9.70855C14.236 9.644 14.2859 9.56757 14.3195 9.48367C14.3531 9.39977 14.3698 9.31004 14.3686 9.21966ZM21.7288 31.1495C21.7288 30.9677 21.6566 30.7934 21.5281 30.6649C21.3996 30.5364 21.2252 30.4642 21.0435 30.4642H18.3023V27.7229C18.3023 27.5412 18.2301 27.3669 18.1015 27.2384C17.973 27.1098 17.7987 27.0376 17.617 27.0376C17.4352 27.0376 17.2609 27.1098 17.1324 27.2384C17.0039 27.3669 16.9317 27.5412 16.9317 27.7229V31.1586C16.9317 31.3404 17.0039 31.5147 17.1324 31.6432C17.2609 31.7717 17.4352 31.8439 17.617 31.8439H21.0435C21.1343 31.8439 21.2241 31.8259 21.3079 31.7909C21.3916 31.7559 21.4676 31.7046 21.5313 31.64C21.5951 31.5754 21.6454 31.4988 21.6793 31.4145C21.7132 31.3303 21.73 31.2402 21.7288 31.1495ZM21.7288 24.2964C21.7288 24.1147 21.6566 23.9403 21.5281 23.8118C21.3996 23.6833 21.2252 23.6111 21.0435 23.6111H18.3023V20.8699C18.3023 20.6881 18.2301 20.5138 18.1015 20.3853C17.973 20.2568 17.7987 20.1846 17.617 20.1846C17.4352 20.1846 17.2609 20.2568 17.1324 20.3853C17.0039 20.5138 16.9317 20.6881 16.9317 20.8699V24.3056C16.9317 24.4873 17.0039 24.6616 17.1324 24.7901C17.2609 24.9187 17.4352 24.9909 17.617 24.9909H21.0435C21.1343 24.9909 21.2241 24.9728 21.3079 24.9378C21.3916 24.9028 21.4676 24.8515 21.5313 24.7869C21.5951 24.7223 21.6454 24.6457 21.6793 24.5615C21.7132 24.4773 21.73 24.3872 21.7288 24.2964ZM21.7288 16.9865C21.7288 16.8047 21.6566 16.6304 21.5281 16.5019C21.3996 16.3734 21.2252 16.3012 21.0435 16.3012H18.3023V13.5599C18.3023 13.3782 18.2301 13.2039 18.1015 13.0754C17.973 12.9468 17.7987 12.8746 17.617 12.8746C17.4352 12.8746 17.2609 12.9468 17.1324 13.0754C17.0039 13.2039 16.9317 13.3782 16.9317 13.5599V16.9956C16.9317 17.1774 17.0039 17.3517 17.1324 17.4802C17.2609 17.6087 17.4352 17.6809 17.617 17.6809H21.0435C21.1343 17.6809 21.2241 17.6629 21.3079 17.6279C21.3916 17.5929 21.4676 17.5416 21.5313 17.477C21.5951 17.4124 21.6454 17.3357 21.6793 17.2515C21.7132 17.1673 21.73 17.0772 21.7288 16.9865ZM21.7288 9.21966C21.7288 9.03791 21.6566 8.8636 21.5281 8.73508C21.3996 8.60656 21.2252 8.53436 21.0435 8.53436H18.3023V5.79313C18.3023 5.61137 18.2301 5.43706 18.1015 5.30854C17.973 5.18002 17.7987 5.10782 17.617 5.10782C17.4352 5.10782 17.2609 5.18002 17.1324 5.30854C17.0039 5.43706 16.9317 5.61137 16.9317 5.79313V9.2288C16.9317 9.41055 17.0039 9.58487 17.1324 9.71339C17.2609 9.84191 17.4352 9.91411 17.617 9.91411H21.0435C21.1343 9.91412 21.2241 9.89609 21.3079 9.86108C21.3916 9.82607 21.4676 9.77477 21.5313 9.71017C21.5951 9.64556 21.6454 9.56893 21.6793 9.48473C21.7132 9.40052 21.73 9.31042 21.7288 9.21966Z"
                    fill="#71717A" />
            </svg>
            <span dir="ltr" style="font-size: 15px;font-weight: 600;text-decoration: underline; color:black">
                #{{ $building->id }} -
                {{ $building->name }} </span>
        </div>

    </div>
    <div class="row">
        <div class="col-4 ">
            <div class=" roundded-5 text-center  p-3" style="background-color: #1B4242">
                <span class="bg-light p-2 text-dark  rounded mb-5 text-bold">حالة المشروع</span>
            </div>
            <div class="card-body text-center">
                <!----Stages header--->
                @if ($building->stages == 'managment')
                    <p class=" fa-2x "> انتظار مراجعة المشروع</p>
                @elseif ($building->rejected_reson != null && $building->management_statuses == 'rejected')
                    <p class=" fa-2x "> انتظار الموافقه على طلب </p>
                @elseif ($building->stages == 'engineering' && $building->research_vist_date == null)
                    <p class=" fa-2x "> انتظار تحديد زيارة المسح المبدئي </p>
                @elseif ($building->stages == 'research_visit' && $building->research_vist_result == null)
                    <p class=" fa-2x "> انتظار نتيجة زيارة المسح المبدئي </p>
                @elseif ($building->research_vist_result != null && $building->engineering_vist_date == null)
                    <p class=" fa-2x "> انتظار تحديد زيارة المسح الهندسي </p>
                @elseif ($building->stages == 'engineering_visit' && $building->engineering_vist_result == null)
                    <p class=" fa-2x "> انتظار نتيجة زيارة المسح الهندسي </p>
                @elseif ($building->stages == 'Finances' && $building->management_statuses == 'finances')
                    <p class="fa-2x"> انتظار الاعتماد من الماليه</p>
                @elseif ($building->stages == 'Executive director' && $building->management_statuses == 'finances')
                    <p class=" fa-2x "> انتظار الموافقه من المدير التنفيذي </p>
                @elseif ($building->stages == 'Executive director' && $building->management_statuses == 'Finish')
                    <p class=" fa-2x "> انتظار طلب عرض سعر من المقاول </p>
                @elseif ($building->stages == 'send_to_contractor')
                    <p class=" fa-2x "> انتظار الموافقه علي عرض سعر المقاول </p>
                @elseif ($building->stages == 'done')
                    <p class=" fa-2x "> انتظار الارسال الي المانحيين </p>
                @elseif ($building->stages == 'supporting')
                    <p class=" fa-2x "> اكتمل خطوات ترميم </p>
                @endif
                <div class="form-group">
                    <div class="row  justify-content-center ">
                        <!-- Accept and Refuese and Review Building buttons--->
                        @can('managment_stage')
                            @if ($building->stages == 'managment')
                                <form method="post" action="{{ route('admin.buildings.update', [$building->id]) }}"
                                    enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <input type="hidden" name="management_statuses" value="accepted">
                                    <input type="hidden" name="stages" value="engineering">
                                    <button class="btn btn-info ml-5" type="submit">
                                        قبول
                                    </button>
                                </form>
                                @if ($building->rejected_reson != null && $building->management_statuses == 'rejected')
                                    <button type="button" class="btn btn-primary " data-toggle="modal"
                                        data-target="#exampleModal">
                                        اعادة النظر للطلب
                                    </button>
                                @else
                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                        data-target="#exampleModal">
                                        رفض
                                    </button>
                                @endif
                            @endif
                        @endcan
                        <!-- end Accept and Refuese and Review Building buttons--->
                    </div>
                    <!-- Research visit and Result  buttons--->
                    @can('research_stage')
                        @if ($building->stages == 'engineering' && $building->research_vist_date == null)
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                تحديد موعد زيارة المسح المبدئي
                            </button>
                        @endif
                        @if ($building->stages == 'research_visit' && $building->research_vist_result == null)
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                                نتيجة زيارة المسح المبدئي
                            </button>
                        @endif
                    @endcan
                    @can('engineering_stage')
                        @if ($building->research_vist_result != null && $building->engineering_vist_date == null)
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                                تحديد ميعاد زيارة المسح الهندسي
                            </button>
                        @endif
                    @endcan
                    <!-- End Research visit  buttons--->
                    <!-- engineering visit and Result  buttons--->
                    @can('engineering_stage')
                        @if ($building->stages == 'engineering_visit' && $building->engineering_vist_result == null)
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                                نتيجة زيارة المسح الهندسي
                            </button>
                        @endif
                    @endcan
                    <!--Finance Stage --->
                    @can('Finance_accreditation')
                        @if ($building->stages == 'Finances')
                            <form method="post" action="{{ route('admin.buildings.update', [$building->id]) }}"
                                enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <input type="hidden" name="stages" value="Executive director">
                                <input type="hidden" name="management_statuses" value="finances">
                                <div class="form-group">
                                    <button class="btn btn-success" type="submit">
                                        اعتمد المبني
                                    </button>
                                </div>
                            </form>
                        @endif
                    @endcan
                    <!--CEO Stage --->
                    @can('CEO_Accreditation')
                        @if ($building->stages == 'Executive director' && $building->management_statuses == 'finances')
                            <form method="post" action="{{ route('admin.buildings.update', [$building->id]) }}"
                                enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <input type="hidden" name="management_statuses" value="Finish">
                                <div class="form-group">
                                    <button class="btn btn-primary" type="submit">
                                        الموافقه على بدء العمل فى المبني
                                    </button>
                                </div>
                            </form>
                        @endif
                    @endcan
                    @can('contractor_stage')
                        @if ($building->stages == 'Executive director' && $building->management_statuses == 'Finish')
                            <form method="post" action="{{ route('admin.buildings.update', [$building->id]) }}"
                                enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <input type="hidden" name="stages" value="send_to_contractor">
                                <div class="form-group">
                                    <button class="btn btn-danger" type="submit">
                                        طلب عرض سعر من المقاولين
                                    </button>
                                </div>
                            </form>
                        @endif
                    @endcan
                    @can('work_stage')
                        @if ($building->stages == 'send_to_contractor')
                            {{-- at least one Contractor has a contractor --}}
                            @if ($building->buildingBuildingContractors()->count() >= 3 && $hasContract)
                                <form method="post" action="{{ route('admin.buildings.update', [$building->id]) }}"
                                    enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <input type="hidden" name="stages" value="done">
                                    <div class="form-group">
                                        <button class="btn btn-danger" type="submit">
                                            الموافقه على عرض الاسعار
                                        </button>
                                    </div>
                                </form>
                            @endif
                        @endif
                    @endcan
                    @can('supporting_stage')
                        @if ($building->stages == 'done')
                            <form method="post" action="{{ route('admin.buildings.update', [$building->id]) }}"
                                enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <input type="hidden" name="stages" value="supporting">
                                <div class="form-group">
                                    <button class="btn btn-danger" type="submit">
                                        الارسال للمانحين
                                    </button>
                                </div>
                            </form>
                        @endif
                        @if ($building->stages == 'supporting')
                            <svg width="77" height="77" viewBox="0 0 77 77" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M33.8855 5.91558C35.4189 5.71532 36.4996 4.30991 36.2993 2.7765C36.0991 1.24309 34.6937 0.162361 33.1603 0.36262C31.6269 0.562878 30.5461 1.96829 30.7464 3.5017C30.9466 5.03511 32.3521 6.11584 33.8855 5.91558Z"
                                    fill="#00BA6C" />
                                <path
                                    d="M52.3913 8.30657C53.9247 8.10631 55.0055 6.7009 54.8052 5.16749C54.6049 3.63408 53.1995 2.55335 51.6661 2.75361C50.1327 2.95387 49.052 4.35928 49.2522 5.89269C49.4525 7.4261 50.8579 8.50683 52.3913 8.30657Z"
                                    fill="#00BA6C" />
                                <path
                                    d="M18.2109 12.3881C19.4388 11.448 19.6721 9.6906 18.732 8.46276C17.792 7.23492 16.0345 7.00162 14.8067 7.94168C13.5789 8.88173 13.3456 10.6392 14.2856 11.867C15.2257 13.0948 16.9831 13.3281 18.2109 12.3881Z"
                                    fill="#00BA6C" />
                                <path
                                    d="M7.90291 25.8392C8.49611 24.4111 7.81928 22.7725 6.39119 22.1793C4.96309 21.5861 3.3245 22.263 2.73131 23.6911C2.13811 25.1192 2.81493 26.7577 4.24303 27.3509C5.67112 27.9441 7.30971 27.2673 7.90291 25.8392Z"
                                    fill="#00BA6C" />
                                <path
                                    d="M68.7235 15.0325C68.5235 14.8325 68.4235 14.6325 68.2235 14.3325L65.0235 19.6325C75.0235 33.9325 72.1235 53.7325 58.1235 64.4325C43.8235 75.4325 23.2235 72.6325 12.2235 58.3325C8.72345 53.7325 6.52345 48.3325 5.72345 42.7325C5.52345 41.1325 4.12345 40.0325 2.52345 40.2325C0.923455 40.4325 -0.176545 41.8325 0.0234546 43.4325C0.923455 50.1325 3.52345 56.4325 7.62345 61.8325C13.8235 70.0325 22.9235 75.2325 33.1235 76.6325C43.3235 78.0325 53.4235 75.3325 61.6235 69.0325C69.7235 62.7325 74.9235 53.6325 76.3235 43.4325C77.6235 33.2325 74.9235 23.1325 68.7235 15.0325Z"
                                    fill="#00BA6C" />
                                <path
                                    d="M33.6232 58.1326C33.9232 58.7326 34.6232 59.1326 35.2232 59.1326C35.8232 59.1326 36.4232 58.8326 36.8232 58.2326L62.3232 16.2326L65.4232 11.1326L69.3232 4.73262C70.1232 3.33262 69.0232 1.93262 67.7232 1.93262C67.2232 1.93262 66.8232 2.13262 66.4232 2.53262L61.8232 7.83262L58.0232 12.1326L35.1232 38.5326L22.1232 29.6326C21.8232 29.4326 21.4232 29.3326 21.1232 29.3326C19.8232 29.3326 18.8232 30.7326 19.5232 32.0326L33.6232 58.1326Z"
                                    fill="#00BA6C" />
                            </svg>
                        @endif
                    @endcan

                </div>
            </div>
        </div>
        <div class="col-8">

            <ul class="nav nav-tabs" role="tablist" id="relationship-tabs" style="background-color: #1B4242">
                <li class="nav-item">
                    <a class="nav-link active text-dark" href="#building_General" role="tab" data-toggle="tab"
                        style="font-weight: bold ; font-size: 20px; text-decoration: underline">
                        بيانات عامه
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link text-dark" href="#building_results" role="tab" data-toggle="tab"
                        style="font-weight: bold; font-size: 20px; text-decoration: underline">
                        النتائج
                    </a>
                </li>

            </ul>
            <div class="tab-content">
                <div class="tab-pane active" role="tabpanel" id="building_General">
                    @includeIf('admin.buildings.building-general', ['building' => $building])
                </div>
                <div class="tab-pane" role="tabpanel" id="building_results">
                    @includeIf('admin.buildings.building-results', ['building' => $building])
                </div>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-md-12">

            <div class="card-header w-100" style="background-color: #191919">
                {{ trans('global.relatedData') }}
            </div>
            <ul class="nav nav-tabs w-100" role="tablist" id="relationship-tabs" style="background-color: #1B4242">
                <li class="nav-item">
                    <a class="nav-link active text-dark" href="#building_building_contractors" role="tab"
                        data-toggle="tab" style="font-weight: bold; font-size: 20px; text-decoration: underline">
                        {{ trans('cruds.buildingContractor.title') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="#building_beneficiaries" role="tab" data-toggle="tab"
                        style="font-weight: bold; font-size: 20px; text-decoration: underline">
                        {{ trans('cruds.beneficiary.title') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="#building_building_supporters" role="tab" data-toggle="tab"
                        style="font-weight: bold; font-size: 20px; text-decoration: underline">
                        {{ trans('cruds.buildingSupporter.title') }}
                    </a>
                </li>
            </ul>

            <div class="tab-content w-100 h-100">
                <div class="tab-pane active" role="tabpanel" id="building_building_contractors">
                    @includeIf('admin.buildings.relationships.buildingBuildingContractors', [
                        'buildingContractors' => $building->buildingBuildingContractors,
                        'contractors' => $contractors,
                    ])
                </div>
                <div class="tab-pane" role="tabpanel" id="building_beneficiaries">
                    @includeIf('admin.buildings.relationships.buildingBeneficiaries', [
                        'beneficiaries' => $building->buildingBeneficiaries,
                    ])
                </div>
                <div class="tab-pane" role="tabpanel" id="building_building_supporters">
                    @includeIf('admin.buildings.relationships.buildingBuildingSupporters', [
                        'buildingSupporters' => $building->buildingBuildingSupporters,
                    ])
                </div>
            </div>


        </div>
    </div>


    @include('admin.buildings.buildingModal', ['building' => $building])

@endsection

@section('scripts')
    {{-- researsh result scripts --}}
    @if ($building->stages == 'research_visit' && $building->research_vist_result == null)
        <script>
            $(document).ready(function() {
                @if ($errors->count() > 0)
                    $('#exampleModal').modal('show');
                @endif
            });
            Dropzone.options.researchVistResultDropzone = {
                url: '{{ route('admin.buildings.storeMedia') }}',
                maxFilesize: 2, // MB
                maxFiles: 1,
                addRemoveLinks: true,
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                params: {
                    size: 2
                },
                success: function(file, response) {
                    $('form').find('input[name="research_vist_result"]').remove()
                    $('form').append('<input type="hidden" name="research_vist_result" value="' + response.name + '">')
                },
                removedfile: function(file) {
                    file.previewElement.remove()
                    if (file.status !== 'error') {
                        $('form').find('input[name="research_vist_result"]').remove()
                        this.options.maxFiles = this.options.maxFiles + 1
                    }
                },
                init: function() {
                    @if (isset($building) && $building->research_vist_result)
                        var file = {!! json_encode($building->research_vist_result) !!}
                        this.options.addedfile.call(this, file)
                        file.previewElement.classList.add('dz-complete')
                        $('form').append('<input type="hidden" name="research_vist_result" value="' + file.file_name +
                            '">')
                        this.options.maxFiles = this.options.maxFiles - 1
                    @endif
                },
                error: function(file, response) {
                    if ($.type(response) === 'string') {
                        var message = response //dropzone sends it's own error messages in string
                    } else {
                        var message = response.errors.file
                    }
                    file.previewElement.classList.add('dz-error')
                    _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
                    _results = []
                    for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                        node = _ref[_i]
                        _results.push(node.textContent = message)
                    }

                    return _results
                }
            }
        </script>
    @endif

    {{-- engnering result script --}}
    @if ($building->stages == 'engineering_visit' && $building->engineering_vist_result == null)
        <script>
            Dropzone.options.engineeringVistResultDropzone = {
                url: '{{ route('admin.buildings.storeMedia') }}',
                maxFilesize: 2, // MB
                maxFiles: 1,
                addRemoveLinks: true,
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                params: {
                    size: 2
                },

                success: function(file, response) {
                    $('form').find('input[name="engineering_vist_result"]').remove()
                    $('form').append('<input type="hidden" name="engineering_vist_result" value="' + response.name +
                        '">')
                },

                removedfile: function(file) {
                    file.previewElement.remove()
                    if (file.status !== 'error') {
                        $('form').find('input[name="engineering_vist_result"]').remove()
                        this.options.maxFiles = this.options.maxFiles + 1
                    }
                },

                init: function() {
                    @if (isset($building) && $building->engineering_vist_result)
                        var file = {!! json_encode($building->engineering_vist_result) !!}
                        this.options.addedfile.call(this, file)
                        file.previewElement.classList.add('dz-complete')
                        $('form').append('<input type="hidden" name="engineering_vist_result" value="' + file
                            .file_name + '">')
                        this.options.maxFiles = this.options.maxFiles - 1
                    @endif
                },
                error: function(file, response) {
                    if ($.type(response) === 'string') {
                        var message = response //dropzone sends it's own error messages in string
                    } else {
                        var message = response.errors.file
                    }
                    file.previewElement.classList.add('dz-error')
                    _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
                    _results = []
                    for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                        node = _ref[_i]
                        _results.push(node.textContent = message)
                    }

                    return _results
                }
            }
        </script>
    @endif
@endsection
