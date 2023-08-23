<?php

namespace App\Http\Controllers\Contractor;

use App\Http\Controllers\Controller;
use App\Models\Building;
use App\Models\BuildingContractor;
use App\Models\Contractor;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function index()
    {
        // contractor_ id 
        $contractor = Contractor::where('user_id', auth()->user()->id)->first();
        // get the building which is for this contractor
        if ($contractor) {
            $buildings = Building::with(['buildingBuildingContractors' => function ($query) use ($contractor) {
                $query->where('contractor_id', $contractor->id);
            }])
            ->where('stages', 'send_to_contractor')
            ->get();
        }
        // return $buildings;
        return view('contractor.requests' ,compact('buildings'));
    }

    public function show(Request $request )
    {
        $building =Building::findOrFail( $request->id );
        // start her to know what is the  بيانات الوحدات  وتكمل مهمات الcontrctor 
        return view('contractor.building-show',compact('building'));
    }
}
