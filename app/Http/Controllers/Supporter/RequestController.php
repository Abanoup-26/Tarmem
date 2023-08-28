<?php

namespace App\Http\Controllers\Supporter;

use App\Http\Controllers\Controller;
use App\Models\Building;
use App\Models\Supporter;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function index()
    {
        // contractor_ id 
        $supporter = Supporter::where('user_id', auth()->user()->id)->first();
        // get the building which is for this contractor
        if ($supporter) {
            $buildings = Building::with(['buildingBuildingSupporters' => function ($query) use ($supporter) {
                $query->where('supporter_id', $supporter->id)->where('supporter_status','!=','pending');
            }])
            ->where('stages', 'supporting')
            ->get();
        } 
        return view('supporter.requests' ,compact('buildings'));
    }
    
    public function show(Request $request )
    {
        $building =Building::findOrFail( $request->id );  
        // start her to know what is the  بيانات الوحدات  وتكمل مهمات الcontrctor 
        return view('supporter.building-show',compact('building'));
    }
}
