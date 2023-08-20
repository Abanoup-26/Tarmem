<?php

namespace App\Http\Controllers\Organization;

use App\Http\Controllers\Controller;
use App\Models\Beneficiary;
use App\Models\Building;
use App\Models\Illnesstype;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Models\BeneficiaryFamily;
use App\Models\BeneficiaryNeed;
use App\Models\Relative;
use App\Models\Unit;
use Illuminate\Http\Response;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class BeneficiaryController extends Controller
{
    use MediaUploadingTrait;
    public function index()
    {
        $beneficiaries = Beneficiary::with('building', 'beneficiaryBeneficiaryFamilies', 'beneficiaryBeneficiaryNeeds.unit')->get();

        return view('organization.beneficiaries', compact('beneficiaries'));
    }

    public function create()
    {
        $illness_types = Illnesstype::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $buildings = Building::pluck('building_type', 'id')->prepend(trans('global.pleaseSelect'), '');
        $units = Unit::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $familyrelations = Relative::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('organization.add-beneficiary', compact('illness_types', 'buildings', 'units', 'familyrelations'));
    }

    public function store(Request $request)
    {
        // validate all data 
        $validData = $request->validate([
            'name' => 'required',
            'birth_date' => 'required',
            'address' => 'required',
            'identity_number' => 'required|max:14|min:14',
            'qualifications' => 'required',
            'job_status' => 'required',
            'job_title' => 'required',
            'job_salary' => 'required|numeric',
            'illness_status' => 'required',
            'illness_type_id' => 'required',
            'marital_status' => 'required',
            'marital_state_date' => 'required',
            'building_id' => 'required',
            'unit_id'  => 'required',
            'trmem_type' => 'required',
            'description' => 'required',
            "family_name" => 'required',
            "family_birth_date" => 'required',
            "family_identity_number" => 'required',
            "familyrelation_id" => 'required',
            "family_qualifications" => 'required',
            "family_job_status" => 'required',
            "family_job_salary" => 'required',
            "family_illness_status" => 'required',
            "family_illness_type_id" => 'required',
        ]);

        // create Beneficiary 
        $beneficiary = Beneficiary::create([
            'name' => $validData['name'],
            'birth_date' => $validData['birth_date'],
            'identity_number' => $validData['identity_number'],
            'qualifications' => $validData['qualifications'],
            'job_status' => $validData['job_status'],
            'job_title' => $validData['job_title'],
            'job_salary' => $validData['job_salary'],
            'marital_status' => $validData['marital_status'],
            'marital_state_date' => $validData['marital_state_date'],
            'address' => $validData['address'],
            'illness_status' => $validData['illness_status'],
            'illness_type_id' => $validData['illness_type_id'],
            'building_id' => $validData['building_id'],
        ]);
        foreach ($request->input('identity_photo', []) as $file) {
            $beneficiary->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('identity_photo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $beneficiary->id]);
        }
        // ceate Beneficiary needs 
        $beneficiaryNeed = BeneficiaryNeed::create([
            'unit_id' => $validData['unit_id'],
            'description' => $validData['description'],
            'trmem_type' => $validData['trmem_type'],
            'beneficiary_id' => $beneficiary->id,
        ]);
        foreach ($request->input('photos_before', []) as $file) {
            $beneficiaryNeed->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('photos_before');
        }
        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $beneficiaryNeed->id]);
        }
        // create beneficiary familes
        $beneficiaryFamily = BeneficiaryFamily::create([
            'name' => $validData['family_name'],
            'birth_date' => $validData['family_birth_date'],
            'identity_number' => $validData['family_identity_number'],
            'qualifications' => $validData['family_qualifications'],
            'marital_status' => 'single',
            'illness_status' => $validData['family_illness_status'],
            'illness_type_id' => $validData['family_illness_type_id'],
            'job_status' => $validData['family_job_status'],
            'job_sallary' => $validData['family_job_salary'],
            'beneficiary_id' => $beneficiary->id,
            'familyrelation_id' => $validData['familyrelation_id'],
        ]);

        foreach ($request->input('family_identity_photos', []) as $file) {
            $beneficiaryFamily->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('identity_photos');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $beneficiaryFamily->id]);
        }

        Alert::success('Beneficiariy with its related data Added Successfully');
        return redirect()->route('organization.beneficiary.index');
    }

    public function show()
    {
        return view('organization.beneficiaries_show');
    }

    public function storeCKEditorImages(Request $request)
    {
        $model         = new Beneficiary();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');
        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
    public function storeCKEditorImages2(Request $request)
    {

        $model         = new BeneficiaryNeed();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
    public function storeCKEditorImages3(Request $request)
    {

        $model         = new BeneficiaryFamily();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
