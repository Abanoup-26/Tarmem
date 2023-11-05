<div class="card">
    <div class="card-body">
        <div class="form-group container">
            <div class="row justify-content-between mb-3">
                <div class="title"> {{ trans('cruds.building.fields.project_name') }} :
                    <span class="sub-title"> {{ $building->project_name }}</span>
                </div>
                <div class="title"> {{ trans('cruds.building.fields.building_number') }} :
                    <span class="sub-title">{{ $building->building_number }}</span>
                </div>
                <div class="title"> {{ trans('cruds.building.fields.building_type') }} :
                    <span class="sub-title">
                        {{ App\Models\Building::BUILDING_TYPE_SELECT[$building->building_type] ?? '' }}</span>
                </div>
                <div class="title"> {{ trans('cruds.building.fields.birth_data') }} : <span class="sub-title">
                        {{ $building->birth_data }}</span></div>
            </div>
            <div class="row justify-content-between mb-3">
                <div class="title"> {{ trans('cruds.building.fields.floor_count') }} :
                    <span class="sub-title"> {{ $building->floor_count }}</span>
                </div>
                <div class="title"> {{ trans('cruds.building.fields.apartments_count') }}
                    :
                    <span class="sub-title">{{ $building->apartments_count }}</span>
                </div>
                <div class="title"> {{ trans('cruds.building.fields.buidling_age') }} :
                    <span class="sub-title"> {{ $building->buidling_age }}</span>
                </div>
                <div class="title">
                    <span class="sub-title"> </span>
                </div>

            </div>
            <div class="row justify-content-between mb-3">
                <div class="title">{{ trans('cruds.building.fields.building_photos') }} :
                </div>
                <div class="container mt-3">
                    @foreach ($building->building_photos as $key => $media)
                        <img src="{{ $media->getUrl() }}" alt="building-images" style="width: 100px; height: 100px">
                    @endforeach
                </div>
            </div>
            <div class="row ">
                <div class="col-3">
                    <a href="https://www.google.com/maps/?q={{ $building->latitude }},{{ $building->longtude }}"
                        target="_blank">
                        <i class="fas fa-map-marker-alt"></i> عرض الموقع
                    </a>
                </div>


                <div class="title col-4"> {{ trans('cruds.building.fields.organization') }} : <span class="sub-title">
                        {{ $building->organization->name ?? '' }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
