<?php

namespace App\Http\Controllers\organization;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Models\Beneficiary;
use App\Models\BeneficiaryFamily;
use Illuminate\Http\Response;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class BeneficiaryFamilyController extends Controller
{
    use MediaUploadingTrait;
    public function store(Request $request)
    {
        $beneficiary_id = $request->beneficiary_id ;
        // validae data 
        $validData = $request->validate([
            'name' => 'required',
            'birth_date' => 'required|date_format:' . config('panel.date_format'),
            'address' => 'required',
            'identity_number' => 'required|max:10|min:10',
            'qualifications' => ['required', 'in:' . implode(',', array_keys(Beneficiary::QUALIFICATIONS_SELECT))],
            'job_status' => 'required',
            'job_title' => 'nullable',
            'job_salary' => 'nullable|numeric',
            'employer'  => 'nullable',
            'illness_status' => 'required',
            'illness_type_id' => 'nullable',
            'marital_status' => 'required',
            'marital_state_date' => 'nullable|date_format:' . config('panel.date_format'),
            'building_id' => 'required',
            'beneficiary_id' => 'required',
            'familyrelation_id' => 'required',
            

        ]);
        // create 
        $beneficiaryFamily = Beneficiary::create([
            'name' => $validData['name'],
            'birth_date' => $validData['birth_date'],
            'address' => $validData['address'],
            'identity_number' => $validData['identity_number'],
            'qualifications' => $validData['qualifications'],
            'job_status' => $validData['job_status'],
            'job_title' => $validData['job_title'],
            'job_salary' => $validData['job_salary'],
            'employer' => $validData['employer'],
            'illness_status' => $validData['illness_status'],
            'illness_type_id' => $validData['illness_type_id'],
            'marital_status' => $validData['marital_status'],
            'marital_state_date' => $validData['marital_state_date'],
            'building_id' => $validData['building_id'],
            'family_id' => $beneficiary_id,
            'relative_id' => $validData['familyrelation_id'],
            
        ]);

        foreach ($request->input('identity_photos', []) as $file) {
            $beneficiaryFamily->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('identity_photos');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $beneficiaryFamily->id]);
        }
        Alert::success('تم اضافة فرد لاسرة المستفيد بنجاح');
        return redirect()->route('organization.beneficiary.show', $beneficiary_id);
    }

    public function destroy(Request $request)
    {

        $beneficiaryFamily =  Beneficiary::findOrFail($request->member);

        $beneficiaryFamily->delete();

        return redirect()->route('organization.beneficiary.show', $request->beneficiary_id);
    }

    public function storeCKEditorImages(Request $request)
    {
        $model         = new Beneficiary();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
