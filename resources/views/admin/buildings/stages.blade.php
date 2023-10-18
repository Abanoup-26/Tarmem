<!---manageStage--->
@if ($building->stages == 'managment')
    <div class="row mb-5">
        <div class="container">
            <ul class="progressbar">
                <li class="done active">بدء المشروع</li>
                <li> زيارة المسح المبدئي</li>
                <li>نتيجة المسح المبدئي</li>
                <li> زيارة المسح الهندسي</li>
                <li>نتيجة المسح الهندسي</li>
                <li>اعتماد الماليه</li>
                <li>موافقة الرئيس التنفيذي</li>
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
                <li> زياره مسح مبدئي</li>
                <li>نتيجة الزيارة المسح مبدئي</li>
                <li> زيارة المسح الهندسي</li>
                <li>نتيجة المسح الهندسي</li>
                <li>اعتماد الماليه</li>
                <li>موافقة الرئيس التنفيذي</li>
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
                <li class="active"> زيارة المسح المبدئي</li>
                <li>نتيجة المسح المبدئي</li>
                <li> زيارة المسح الهندسي</li>
                <li>نتيجة المسح الهندسي</li>
                <li>اعتماد الماليه</li>
                <li>موافقة الرئيس التنفيذي</li>
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
                <li class="done "> زيارة المسح المبدئي</li>
                <li class="active">نتيجة المسح المبدئي</li>
                <li> زيارة المسح الهندسي</li>
                <li>نتيجة المسح الهندسي</li>
                <li>اعتماد الماليه</li>
                <li>موافقة الرئيس التنفيذي</li>
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
                <li class="done"> زيارة المسح المبدئي</li>
                <li class="done">نتيجة المسح المبدئي</li>
                <li class="active"> زيارة المسح الهندسي</li>
                <li>نتيجة المسح الهندسي</li>
                <li>اعتماد الماليه</li>
                <li>موافقة الرئيس التنفيذي</li>
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
                <li class="done"> زيارة المسح المبدئي</li>
                <li class="done">نتيجة المسح المبدئي</li>
                <li class="done"> زيارة المسح الهندسي</li>
                <li class="active">نتيجة المسح الهندسي</li>
                <li> طلب عرض سعر من المقاولين</li>
                <li>الموافقه على عرض السعر</li>
                <li>الارسال للمانحين</li>
            </ul>
        </div>
    </div>
    <!--- End engineering_stage--->
@elseif ($building->stages == 'Finances')
    <!---Finance Stage--->
    <div class="row mb-5">
        <div class="container">
            <ul class="progressbar">
                <li class="done">بدء المشروع</li>
                <li class="done"> زيارة المسح المبدئي</li>
                <li class="done">نتيجة المسح المبدئي</li>
                <li class="done"> زيارة المسح الهندسي</li>
                <li class="done">نتيجة المسح الهندسي</li>
                <li class="active">اعتماد الماليه</li>
                <li>موافقة الرئيس التنفيذي</li>
                <li> طلب عرض سعر من المقاولين</li>
                <li>الموافقه على عرض السعر</li>
                <li>الارسال للمانحين</li>
            </ul>
        </div>
    </div>
    <!--- End Finance Stage--->
@elseif ($building->stages == 'Executive director' && $building->management_statuses == 'CEO')
    <!---CEO Stage--->
    <div class="row mb-5">
        <div class="container">
            <ul class="progressbar">
                <li class="done">بدء المشروع</li>
                <li class="done"> زيارة المسح المبدئي</li>
                <li class="done">نتيجة المسح المبدئي</li>
                <li class="done"> زيارة المسح الهندسي</li>
                <li class="done">نتيجة المسح الهندسي</li>
                <li class="done">اعتماد الماليه</li>
                <li class="active">موافقة الرئيس التنفيذي</li>
                <li> طلب عرض سعر من المقاولين</li>
                <li>الموافقه على عرض السعر</li>
                <li>الارسال للمانحين</li>
            </ul>
        </div>
    </div>
    <!--- End CEO Stage--->
@elseif ($building->stages == 'Executive director' && $building->management_statuses == 'Finish')
    <!---contractor Stage--->
    <div class="row mb-5">
        <div class="container">
            <ul class="progressbar">
                <li class="done">بدء المشروع</li>
                <li class="done"> زيارة المسح المبدئي</li>
                <li class="done">نتيجة المسح المبدئي</li>
                <li class="done"> زيارة المسح الهندسي</li>
                <li class="done">نتيجة المسح الهندسي</li>
                <li class="done">اعتماد الماليه</li>
                <li class="done">موافقة الرئيس التنفيذي</li>
                <li class="active"> طلب عرض سعر من المقاولين</li>
                <li>الموافقه على عرض السعر</li>
                <li>الارسال للمانحين</li>
            </ul>
        </div>
    </div>
    <!--- End contractor Stage--->
@elseif ($building->stages == 'send_to_contractor')
    <!---contractor_stage--->
    <div class="row mb-5">
        <div class="container">
            <ul class="progressbar">
                <li class="done">بدء المشروع</li>
                <li class="done"> زيارة المسح المبدئي</li>
                <li class="done">نتيجة المسح المبدئي</li>
                <li class="done"> زيارة المسح الهندسي</li>
                <li class="done">نتيجة المسح الهندسي</li>
                <li class="done"> طلب عرض سعر من المقاولين</li>
                <li class="done">اعتماد الماليه</li>
                <li class="done">موافقة الرئيس التنفيذي</li>
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
                <li class="done"> زيارة المسح المبدئي</li>
                <li class="done">نتيجة المسح المبدئي</li>
                <li class="done"> زيارة المسح الهندسي</li>
                <li class="done">نتيجة المسح الهندسي</li>
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
                <li class="done"> زيارة المسح المبدئي</li>
                <li class="done">نتيجة المسح المبدئي</li>
                <li class="done"> زيارة المسح الهندسي</li>
                <li class="done">نتيجة المسح الهندسي</li>
                <li class="done"> طلب عرض سعر من المقاولين</li>
                <li class="done">الموافقه على عرض السعر</li>
                <li class="done">الارسال للمانحين</li>
            </ul>
        </div>
    </div>
    <!--- End done_stage--->
@endif
