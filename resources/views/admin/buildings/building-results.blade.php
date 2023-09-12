<div class="card">
    <div class="card-body">
        <div class="form-group">
            <div class="container">
                <div class="row mb-5">
                    <div class="title col-md-6 m-auto"> {{ trans('cruds.building.fields.research_vist_date') }} : <span
                            class="sub-title">
                            {{ $building->research_vist_date ?? 'لم يتم تحديد حتي الان' }}</span></div>
                    <div class="title col-md-6"> {{ trans('cruds.building.fields.research_vist_result') }} : <span
                            class="sub-title">
                            @if ($building->research_vist_result)
                                <img src="{{ $building->research_vist_result->getUrl() }}" alt="research_vist_result"
                                    style="width: 100px; height: 100px">
                            @endif
                        </span>
                    </div>
                </div>

                <div class="row  mb-5">
                    <div class="title col-md-6 m-auto"> {{ trans('cruds.building.fields.engineering_vist_date') }} : <span
                            class="sub-title">
                            {{ $building->engineering_vist_date ?? 'لم يتم تحديد حتي الان' }}</span>
                    </div>
                    <div class="title col-md-6"> {{ trans('cruds.building.fields.engineering_vist_result') }} : <span
                            class="sub-title">
                            @if ($building->engineering_vist_result)
                                <img src="{{ $building->engineering_vist_result->getUrl() }}"
                                    alt="engineering_vist_result" style="width: 100px; height: 100px">
                            @endif
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
