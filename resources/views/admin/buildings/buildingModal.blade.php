<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Building Updates</h1>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-----Reject form---->
            @if ( $building->stages == 'managment' && $building->rejected_reson == null)
                <form method="post" action="{{ route('admin.buildings.update', [$building->id]) }}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="modal-body">
                            <input type="hidden" name="management_statuses" value="rejected"> 
                            <div class="form-group" >
                                <label for="rejected_reson" class="required">{{ trans('cruds.building.fields.rejected_reson') }}</label>
                                <input class="form-control {{ $errors->has('rejected_reson') ? 'is-invalid' : '' }}" type="text"
                                    name="rejected_reson" id="rejected_reson"
                                    value="{{ old('rejected_reson', $building->rejected_reson) }}" required>
                                @if ($errors->has('rejected_reson'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('rejected_reson') }}
                                    </div>  
                                @endif
                                <span class="help-block">{{ trans('cruds.building.fields.rejected_reson_helper') }}</span>
                            </div>
                        
                    </div>
                    <div class="modal-footer form-group">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button class="btn btn-danger" type="submit">
                            {{ trans('global.save') }}
                        </button>
                    </div>
                </form>
            @endif
            <!-----End Reject form---->
            <!-----RE-Reject form---->
            @if ( $building->stages == 'managment' && $building->rejected_reson != null)
                <form method="post" action="{{ route('admin.buildings.update', [$building->id]) }}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="modal-body">
                            <input type="hidden" name="management_statuses" value="rejected"> 
                            <div class="form-group" >
                                <label for="rejected_reson">{{ trans('cruds.building.fields.rejected_reson') }}</label>
                                <input class="form-control {{ $errors->has('rejected_reson') ? 'is-invalid' : '' }}" type="text"
                                    name="rejected_reson" id="rejected_reson"
                                    value="{{ old('rejected_reson', $building->rejected_reson) }}">
                                @if ($errors->has('rejected_reson'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('rejected_reson') }}
                                    </div>  
                                @endif
                                <span class="help-block">{{ trans('cruds.building.fields.rejected_reson_helper') }}</span>
                            </div>
                        
                    </div>
                    <div class="modal-footer form-group">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button class="btn btn-danger" type="submit">
                            {{ trans('global.save') }}
                        </button>
                    </div>
                </form>
            @endif
            <!-----End ReReject form---->
            <!-----Research vist  form ---->
            @if ($building->stages == 'engineering' && $building->research_vist_date == null)
                <form method="post" action="{{ route('admin.buildings.update', [$building->id]) }}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="modal-body"> 
                        <input type="hidden" name="stages" value="research_visit">
                        <div class="form-group">
                            <label for="research_vist_date" class="required">{{ trans('cruds.building.fields.research_vist_date') }}</label>
                            <input class="form-control date {{ $errors->has('research_vist_date') ? 'is-invalid' : '' }}"
                                type="text" name="research_vist_date" id="research_vist_date"
                                value="{{ old('research_vist_date', $building->research_vist_date) }}" required>
                            @if ($errors->has('research_vist_date'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('research_vist_date') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.building.fields.research_vist_date_helper') }}</span>
                        </div>
                    </div>
                    <div class="modal-footer form-group">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button class="btn btn-danger" type="submit">
                            {{ trans('global.save') }}
                        </button>
                    </div>
                </form>
            @endif
            <!-----End Research vist  form ---->

            <!-----Research result  form ---->
            @if ($building->stages == 'research_visit' && $building->research_vist_result == null  )
                <form method="post" action="{{ route('admin.buildings.update', [$building->id]) }}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <input type="hidden" name="research_result_req">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="research_vist_result" class="required">{{ trans('cruds.building.fields.research_vist_result') }}</label>
                            <div class="needsclick dropzone {{ $errors->has('research_vist_result') ? 'is-invalid' : '' }}" id="research_vist_result-dropzone">
                            </div>
                            @if($errors->has('research_vist_result'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('research_vist_result') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.building.fields.research_vist_result_helper') }}</span>
                        </div>
                    </div>
                    <div class="modal-footer form-group">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button class="btn btn-danger" type="submit">
                            {{ trans('global.save') }}
                        </button>
                    </div>
                    
                </form>
            @endif
            <!----- End Research result form ---->
            <!-----Engineering vist form ---->
            @if ($building->stages == 'research_visit' && $building->engineering_vist_date == null && $building->research_vist_result != null )
                <form method="post" action="{{ route('admin.buildings.update', [$building->id]) }}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="stages" value="engineering_visit">
                        <div class="form-group">
                            <label for="engineering_vist_date" class="required">{{ trans('cruds.building.fields.engineering_vist_date') }}</label>
                            <input class="form-control date {{ $errors->has('engineering_vist_date') ? 'is-invalid' : '' }}"
                                type="text" name="engineering_vist_date" id="engineering_vist_date"
                                value="{{ old('engineering_vist_date', $building->engineering_vist_date) }}" required>
                            @if($errors->has('engineering_vist_date'))
                            <div class="invalid-feedback">
                                {{ $errors->first('engineering_vist_date') }}
                            </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.building.fields.engineering_vist_date_helper') }}</span>
                        </div>
                    </div>
                    <div class="modal-footer form-group">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button class="btn btn-danger" type="submit">
                            {{ trans('global.save') }}
                        </button>
                    </div>
                </form>
            @endif
            <!-----End Engineering vist  form ---->
            <!-----Engineering result form ---->
            @if ($building->stages == 'engineering_visit' && $building->engineering_vist_result == null)
                <form method="post" action="{{ route('admin.buildings.update', [$building->id]) }}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <input type="hidden" name="engineering_result_req">
                        <div class="modal-body"> 
                            <div class="form-group">
                                <label for="engineering_vist_result" class="required">{{ trans('cruds.building.fields.engineering_vist_result')
                                    }}</label>
                                <div class="needsclick dropzone {{ $errors->has('engineering_vist_result') ? 'is-invalid' : '' }}"
                                    id="engineering_vist_result-dropzone">
                                </div>
                                @if($errors->has('engineering_vist_result'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('engineering_vist_result') }}
                                </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.building.fields.engineering_vist_result_helper') }}</span>
                            </div>
                        </div>
                        <div class="modal-footer form-group">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                </form>
            @endif
            <!-----End Engineering result form ---->
        </div>
    </div>
</div>

