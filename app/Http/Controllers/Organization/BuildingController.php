<?php

namespace App\Http\Controllers\Organization;

use App\Http\Controllers\Controller;
use App\Models\Building;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use Illuminate\Http\Response;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\MediaLibrary\MediaCollections\Models\Media;


class BuildingController extends Controller
{
    use MediaUploadingTrait;
    public function index()
    {
        $buildings = Building::with('buildingBeneficiaries.illness_type', 'buildingBuildingSupporters')->get();
        
        return view('organization.building', compact('buildings'));
    }
    public function create()
    {
        return view('organization.add-building');
    }
    
    public function edit(Request $request) 
    {   
        $building = Building::findOrFail($request->id);
        return view('organization.edit-building', compact('building'));
    }

    public function show(Request $request)
    {
        $building = Building::with('buildingBeneficiaries.beneficiaryBeneficiaryNeeds.unit','buildingBeneficiaries.illness_type','buildingBeneficiaries.beneficiaryBeneficiaryFamilies.illness_type' ,'buildingBeneficiaries.beneficiaryBeneficiaryFamilies.familyrelation')->findOrFail($request->id);
        return view('organization.building-show',compact('building'));
    }

    public function store(Request $request)
    {
        // validate the form data 
        $data = $request->validate([
            'building_type' => 'required',
            'building_number' => 'required|numeric',
            'floor_count' => 'required|numeric',
            'apartments_count' => 'required|numeric',
            'birth_data' => 'required',
            "longtude" => 'nullable',
            "latitude" => "nullable",
        ]);

        //create a new Building 
        $building = Building::create([
            'building_type'  => $data['building_type'],
            'building_number' => $data['building_number'],
            'floor_count' => $data['floor_count'],
            'apartments_count' => $data['apartments_count'],
            'birth_data' => $data['birth_data'],
            'latitude' => $data['latitude'],
            'longtude' => $data['longtude'],
            'management_statuses' => 'pending',
            'stages' => 'managment',
        ]);

        foreach ($request->input('building_photos', []) as $file) {
            $building->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('building_photos');
        }

        Alert::success('تم بنجاح' , 'لقد قمت باضافة مبني راجع التفاصيل جيدا ومن ثم ارسله الي الادراة حسب حاجة المستفيد');
        return redirect()->route('organization.building.index');
    }

    public function update(Request $request) 
    {   
        // get the building 
        $building = Building::findOrFail($request->id);
        // validate the form data 
        $updatedData = $request->validate([
            'building_type' => 'required',
            'building_number' => 'required|numeric',
            'floor_count' => 'required|numeric',
            'apartments_count' => 'required|numeric',
            'birth_data' => 'required',
            "longtude" => 'nullable',
            "latitude" => "nullable",
        ]);
        // update the building 
        $building->update([
            'building_type'  => $updatedData['building_type'],
            'building_number' => $updatedData['building_number'],
            'floor_count' => $updatedData['floor_count'],
            'apartments_count' => $updatedData['apartments_count'],
            'birth_data' => $updatedData['birth_data'],
            'latitude' => $updatedData['latitude'],
            'longtude' => $updatedData['longtude'],
            'management_statuses' => 'pending',
            'stages' => 'managment',
        ]);

        Alert::success('Building updated Succedssfully');
        return redirect()->route('organization.building.index');
    }


    public function send(Request $request)
    {
        $building = Building::findOrFail($request->id);
        $building->update([
            'management_statuses' => 'on_review' ,
        ]);
        Alert::success('تم ارسال الطلب الى ادارة ترميم بنجاح');
        return redirect()->route('organization.building.index');
    }

    public function storeCKEditorImages(Request $request)
    {

        $model         = new Building();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
