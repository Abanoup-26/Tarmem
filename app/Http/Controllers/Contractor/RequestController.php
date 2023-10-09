<?php

namespace App\Http\Controllers\Contractor;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Controllers\Controller;
use App\Models\Building;
use App\Models\BuildingContractor;
use App\Models\Contractor;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
class RequestController extends Controller
{
    use MediaUploadingTrait;
    public function index()
    {
        // contractor_ id 
        $contractor = Contractor::where('user_id', auth()->user()->id)->first();
        // get the building which is for this contractor
        if ($contractor) {
            $buildings = Building::with(['buildingBuildingContractors' => function ($query) use ($contractor) {
                $query->where('contractor_id', $contractor->id)->where('stages','!=','pending');
            }])
            ->whereIn('stages', ['send_to_contractor','done','supporting'])
            ->get();
        } 
        return view('contractor.requests' ,compact('buildings'));
    }

    public function show(Request $request )
    {
        $building =Building::findOrFail( $request->id );
        $building->load('buildingBuildingContractors.contractor.user');
        // get the auth contractor 
        $buildingcontractor =  $building->buildingBuildingContractors()
        ->whereHas('contractor.user', function ($query) {
            $query->where('id', auth()->user()->id);
        })->first();
        // return $contractor ;
        return view('contractor.building-show',compact('building' ,'buildingcontractor'));
    }

    public function edit($id)
    {
        $building =Building::findOrFail( $id ); 
        return view('contractor.building-edit',compact('building'));
    }

    public function update(Request $request)
    {
        $contractor = Contractor::where('user_id', auth()->user()->id)->first();
        $building =Building::findOrFail($request->building_id); 
        $buildingContractor = BuildingContractor::where('contractor_id',$contractor->id)->where('building_id',$building->id)->first(); 
        if(!$buildingContractor){
            return abort(404);
        }
        $buildingContractor->stages = 'send_quotation';

         if ($request->input('contract', false)) {
            $buildingContractor->addMedia(storage_path('tmp/uploads/' . basename($request->input('contract'))))->toMediaCollection('contract');
        }
        
        $buildingContractor->save();  
        return redirect()->route('contractor.requests');
    }public function storeCKEditorImages(Request $request)
    {
        $model         = new BuildingContractor();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
