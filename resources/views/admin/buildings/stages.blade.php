<!---manageStage--->
@if ($building->stages == 'managment')
    <div class="row mb-5">
        <div class="container">
            <ul class="progressbar">
                <li class="done active">بدء المشروع</li>
                <li>تحديد زياره بحثيه</li>
                <li>نتيجة الزيارة البحثيه</li>
                <li>تحديد زياره هندسيه</li>
                <li>نتيجة زيارة الهندسيه</li>
                <li> طلب عرض سعر من المقاولين</li>
                <li>الموافقه على عرض السعر</li>
                <li>الارسال للمانحين</li>
            </ul>
        </div>
    </div>
    <!--- End manageStage--->
@elseif ($building->rejected_reson != null && $building->management_statuses == 'rejected')
    <!---research_stage--->
    <div class="row mb-5">
        <div class="container">
            <ul class="progressbar">
                <li class="done active">بدء المشروع</li>
                <li>تحديد زياره بحثيه</li>
                <li>نتيجة الزيارة البحثيه</li>
                <li>تحديد زياره هندسيه</li>
                <li>نتيجة زيارة الهندسيه</li>
                <li> طلب عرض سعر من المقاولين</li>
                <li>الموافقه على عرض السعر</li>
                <li>الارسال للمانحين</li>
            </ul>
        </div>
    </div>
    <!--- End research_stage--->
@elseif ($building->stages == 'engineering' && $building->research_vist_date == null)
    <!---research_stage--->
    <div class="row mb-5">
        <div class="container">
            <ul class="progressbar">
                <li class="done active">بدء المشروع</li>
                <li class="active">تحديد زياره بحثيه</li>
                <li>نتيجة الزيارة البحثيه</li>
                <li>تحديد زياره هندسيه</li>
                <li>نتيجة زيارة الهندسيه</li>
                <li> طلب عرض سعر من المقاولين</li>
                <li>الموافقه على عرض السعر</li>
                <li>الارسال للمانحين</li>
            </ul>
        </div>
    </div>
@elseif ($building->stages == 'research_visit' && $building->research_vist_result == null)
    <div class="row mb-5">
        <div class="container">
            <ul class="progressbar">
                <li class="done">بدء المشروع</li>
                <li class="done ">تحديد زياره بحثيه</li>
                <li class="active">نتيجة الزيارة البحثيه</li>
                <li>تحديد زياره هندسيه</li>
                <li>نتيجة زيارة الهندسيه</li>
                <li> طلب عرض سعر من المقاولين</li>
                <li>الموافقه على عرض السعر</li>
                <li>الارسال للمانحين</li>
            </ul>
        </div>
    </div>
@elseif ($building->research_vist_result != null && $building->engineering_vist_date == null)
    <!---engineering_stage--->
    <div class="row mb-5">
        <div class="container">
            <ul class="progressbar">
                <li class="done">بدء المشروع</li>
                <li class="done">تحديد زياره بحثيه</li>
                <li class="done">نتيجة الزيارة البحثيه</li>
                <li class="active">تحديد زياره هندسيه</li>
                <li>نتيجة زيارة الهندسيه</li>
                <li> طلب عرض سعر من المقاولين</li>
                <li>الموافقه على عرض السعر</li>
                <li>الارسال للمانحين</li>
            </ul>
        </div>
    </div>
    <!--- End engineering_stage--->
@elseif ($building->stages == 'engineering_visit' && $building->engineering_vist_result == null)
    <!---engineering_stage--->
    <div class="row mb-5">
        <div class="container">
            <ul class="progressbar">
                <li class="done">بدء المشروع</li>
                <li class="done">تحديد زياره بحثيه</li>
                <li class="done">نتيجة الزيارة البحثيه</li>
                <li class="done">تحديد زياره هندسيه</li>
                <li class="active">نتيجة زيارة الهندسيه</li>
                <li> طلب عرض سعر من المقاولين</li>
                <li>الموافقه على عرض السعر</li>
                <li>الارسال للمانحين</li>
            </ul>
        </div>
    </div>
    <!--- End engineering_stage--->
@elseif ($building->stages == 'engineering_visit' && $building->engineering_vist_result != null)
    <!---engineering_stage--->
    <div class="row mb-5">
        <div class="container">
            <ul class="progressbar">
                <li class="done">بدء المشروع</li>
                <li class="done">تحديد زياره بحثيه</li>
                <li class="done">نتيجة الزيارة البحثيه</li>
                <li class="done">تحديد زياره هندسيه</li>
                <li class="done">نتيجة زيارة الهندسيه</li>
                <li class="active"> طلب عرض سعر من المقاولين</li>
                <li>الموافقه على عرض السعر</li>
                <li>الارسال للمانحين</li>
            </ul>
        </div>
    </div>
    <!--- End engineering_stage--->
@elseif ($building->stages == 'send_to_contractor')
    <!---contractor_stage--->
    <div class="row mb-5">
        <div class="container">
            <ul class="progressbar">
                <li class="done">بدء المشروع</li>
                <li class="done">تحديد زياره بحثيه</li>
                <li class="done">نتيجة الزيارة البحثيه</li>
                <li class="done">تحديد زياره هندسيه</li>
                <li class="done">نتيجة زيارة الهندسيه</li>
                <li class="done"> طلب عرض سعر من المقاولين</li>
                <li class="active">الموافقه على عرض السعر</li>
                <li>الارسال للمانحين</li>
            </ul>
        </div>
    </div>
    <!--- End contractor_stage--->
@elseif ($building->stages == 'done')
    <!---supporting_stage--->
    <div class="row mb-5">
        <div class="container">
            <ul class="progressbar">
                <li class="done">بدء المشروع</li>
                <li class="done">تحديد زياره بحثيه</li>
                <li class="done">نتيجة الزيارة البحثيه</li>
                <li class="done">تحديد زياره هندسيه</li>
                <li class="done">نتيجة زيارة الهندسيه</li>
                <li class="done"> طلب عرض سعر من المقاولين</li>
                <li class="done">الموافقه على عرض السعر</li>
                <li class="active">الارسال للمانحين</li>
            </ul>
        </div>
    </div>
    <!--- End supporting_stage--->
@elseif ($building->stages == 'supporting')
    <!---done_stage--->
    <div class="row mb-5">
        <div class="container">
            <ul class="progressbar">
                <li class="done">بدء المشروع</li>
                <li class="done">تحديد زياره بحثيه</li>
                <li class="done">نتيجة الزيارة البحثيه</li>
                <li class="done">تحديد زياره هندسيه</li>
                <li class="done">نتيجة زيارة الهندسيه</li>
                <li class="done"> طلب عرض سعر من المقاولين</li>
                <li class="done">الموافقه على عرض السعر</li>
                <li class="done">الارسال للمانحين</li>
            </ul>
        </div>
    </div>
    <!--- End done_stage--->
@endif
