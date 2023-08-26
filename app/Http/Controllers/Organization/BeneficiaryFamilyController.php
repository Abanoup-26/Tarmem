<?php

namespace App\Http\Controllers\organization;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Models\BeneficiaryFamily;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class BeneficiaryFamilyController extends Controller
{
    use MediaUploadingTrait;
    public function store(Request $request)
    {

        $beneficiary_id = $request->input('beneficiary_id');

        // validae data 
        $validData = $request->validate([
            "name"  => 'required',
            "birth_date" => 'required',
            "identity_number" => 'required',
            "qualifications" => 'required',
            "marital_status" => 'required',
            "illness_status" => 'required',
            "illness_type_id" => 'required',
            "job_status" => 'required',
            "job_sallary" => 'required',
            "beneficiary_id" => 'required',
            "familyrelation_id" => 'required',
            "job_title" => 'required',
        ]);
        // create 
        $beneficiaryFamily = BeneficiaryFamily::create([
            "name"  => $validData['name'],
            "birth_date" => $validData['birth_date'],
            "identity_number" => $validData['identity_number'],
            "qualifications" => $validData['qualifications'],
            "marital_status" => $validData['marital_status'],
            "illness_status" => $validData['illness_status'],
            "illness_type_id" => $validData['illness_type_id'],
            "job_status" => $validData['job_status'],
            "job_sallary" => $validData['job_sallary'],
            "beneficiary_id" => $beneficiary_id,
            "familyrelation_id" => $validData['familyrelation_id'],
            "job_title" => $validData['job_title'],
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

        $beneficiaryFamily =  BeneficiaryFamily::findOrFail($request->member);

        $beneficiaryFamily->delete();

        return redirect()->route('organization.beneficiary.show', $request->beneficiary_id);
    }

    public function storeCKEditorImages(Request $request)
    {
        $model         = new BeneficiaryFamily();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
