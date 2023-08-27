<?php

namespace App\Http\Controllers\Organization;

use App\Http\Controllers\Controller;
use App\Models\BeneficiaryNeed;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class BeneficiaryNeedsController extends Controller
{
    public function store(Request $request)
    {
        $beneficiary_id =  $request->beneficiary_id;
        //  get beneficiary id 

        // validate data 
        $validDate = $request->validate([
            'unit_id' => 'required|exists:units,id',
            'description' => 'required|string|max:255',
            'trmem_type' => 'required|in:' . implode(',', array_keys(BeneficiaryNeed::TRMEM_TYPE_SELECT)),
            'beneficiary_id' => 'required|exists:beneficiaries,id',
        ]);

        // create
        $beneficiaryNeed = BeneficiaryNeed::create([
            'unit_id'  => $validDate['unit_id'],
            'description' => $validDate['description'],
            'trmem_type' => $validDate['trmem_type'],
            'beneficiary_id' => $request->beneficiary_id,
        ]);

        foreach ($request->input('photos_before', []) as $file) {
            $beneficiaryNeed->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('photos_before');
        }

        foreach ($request->input('photos_after', []) as $file) {
            $beneficiaryNeed->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('photos_after');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $beneficiaryNeed->id]);
        }
        Alert::success('تم اضافة وحده الى المستفيد بنجاح ');
        return redirect()->route('organization.beneficiary.show', $beneficiary_id);
    }
    public function destroy(Request $request)
    {
        $beneficiaryNeed = BeneficiaryNeed::findOrFail($request->beneficiaryNeed_id);
        $beneficiaryNeed->delete();
        Alert::success('تم حذف وحده من احتياجات المستفيد بنجاح ');
        return back();
    }
}
