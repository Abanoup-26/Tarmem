@extends('layouts.contractor') 
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <!-- Base Control -->
                    <div class="form-element base-control mb-30">
                        <h4 class="font-20 mb-4">أرسال السعر للأدارة </h4>
                        @if ($errors->count() > 0)
                            <div class="alert alert-danger">
                                <ul class="list-unstyled">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <!-- Form -->
                        <form action="{{ route('contractor.building.update') }}" method="POST">
                            @csrf
                            <input type="hidden" name="building_id" value="{{ $building->id }}">
                            <div class="row"> 
                                <div class="form-group col-md-4 mt-4">
                                    <label class="required mb-2 font-14 bold black"
                                        for="quotation_with_materials">{{ trans('cruds.buildingContractor.fields.quotation_with_materials') }}</label>
                                    <input class="form-control {{ $errors->has('quotation_with_materials') ? 'is-invalid' : '' }}"
                                        type="number" name="quotation_with_materials" id="quotation_with_materials"
                                        value="{{ old('quotation_with_materials', $building->quotation_with_materials) }}" step="1" required>
                                    @if ($errors->has('quotation_with_materials'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('quotation_with_materials') }}
                                        </div>
                                    @endif
                                    <span
                                        class="help-block">{{ trans('cruds.buildingContractor.fields.quotation_with_materials_helper') }}</span>
                                </div> 
                                
                                <div class="form-group col-md-4 mt-4">
                                    <label class="required mb-2 font-14 bold black"
                                        for="quotation_without_materials">{{ trans('cruds.buildingContractor.fields.quotation_without_materials') }}</label>
                                    <input class="form-control {{ $errors->has('quotation_without_materials') ? 'is-invalid' : '' }}"
                                        type="number" name="quotation_without_materials" id="quotation_without_materials"
                                        value="{{ old('quotation_without_materials', $building->quotation_without_materials) }}" step="1" required>
                                    @if ($errors->has('quotation_without_materials'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('quotation_without_materials') }}
                                        </div>
                                    @endif
                                    <span
                                        class="help-block">{{ trans('cruds.buildingContractor.fields.quotation_without_materials_helper') }}</span>
                                </div>
                            </div> 
                            <!-- Button Group -->
                            <div class="button-group  row justify-content-center  pt-1">
                                <button type="submit" class="btn long col-4">تعديل</button>
                                <a href="{{route('contractor.requests')}}" class="link-btn bg-transparent mr-3 soft-pink">إلغاء</a>
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
