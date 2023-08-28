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
use PhpParser\Node\Stmt\Return_;
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
        $buildings = Building::pluck('building_number', 'id')->prepend(trans('global.pleaseSelect'), '');
        $units = Unit::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $familyrelations = Relative::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('organization.add-beneficiary', compact('illness_types', 'buildings', 'units', 'familyrelations'));
    }

    public function edit(Request $request)
    {
        // get the beneficiary 
        $beneficiary = Beneficiary::findOrFail($request->id);
        // get important pluckes
        $illness_types = Illnesstype::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $buildings = Building::pluck('building_number', 'id')->prepend(trans('global.pleaseSelect'), '');
        $units = Unit::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $familyrelations = Relative::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $beneficiaries = Beneficiary::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        // get the beneficiary related data 
        $beneficiaryNeed = BeneficiaryNeed::with('unit', 'beneficiary')->where('beneficiary_id', $beneficiary->id)->first();
        $beneficiaryFamily = BeneficiaryFamily::with('illness_type', 'familyrelation')->where('beneficiary_id', $beneficiary->id)->first();

        return view('organization.edit-beneficiary', compact('beneficiary', 'beneficiaryNeed', 'beneficiaryFamily', 'illness_types', 'buildings', 'units', 'familyrelations'));
    }

    public function store(Request $request)
    { 
        // validate all data 
        $validData = $request->validate([
            'name' => 'required',
            'birth_date' => 'required|date_format:' . config('panel.date_format'),
            'address' => 'required',
            'identity_number' => 'required|max:10|min:10',
            'qualifications' => 'required',
            'job_status' => 'required',
            'job_title' => 'required',
            'job_salary' => 'required|numeric',
            'illness_status' => 'required',
            'illness_type_id' => 'required',
            'marital_status' => 'required',
            'marital_state_date' => 'required|date_format:' . config('panel.date_format'),
            'building_id' => 'required',
            'unit_id'  => 'required',
            'trmem_type' => 'required',
            'description' => 'required',
            "family_name" => 'required',
            "family_birth_date" => 'required|date_format:' . config('panel.date_format'),
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

    public function update(Request $request)
    {

        $beneficiary = Beneficiary::findOrFail($request->id);
        $beneficiaryNeed = BeneficiaryNeed::where('beneficiary_id', $beneficiary->id)->first();
        $beneficiaryFamily = BeneficiaryFamily::where('beneficiary_id', $beneficiary->id)->first();
        // validate all data 
        $validUpdatedData = $request->validate([
            'name' => 'required',
            'birth_date' => 'required|date_format:' . config('panel.date_format'),
            'address' => 'required',
            'identity_number' => 'required|max:10|min:10',
            'qualifications' => 'required',
            'job_status' => 'required',
            'job_title' => 'required',
            'job_salary' => 'required|numeric',
            'illness_status' => 'required',
            'illness_type_id' => 'required',
            'marital_status' => 'required',
            'marital_state_date' => 'required|date_format:' . config('panel.date_format'),
            'building_id' => 'required',
            'unit_id'  => 'required',
            'trmem_type' => 'required',
            'description' => 'required',
            "family_name" => 'required',
            "family_birth_date" => 'required|date_format:' . config('panel.date_format'),
            "family_identity_number" => 'required',
            "familyrelation_id" => 'required',
            "family_qualifications" => 'required',
            "family_job_status" => 'required',
            "family_job_salary" => 'required',
            "family_illness_status" => 'required',
            "family_illness_type_id" => 'required',
        ]);
        // update Beneficiary 
        $beneficiary->update([
            'name' => $validUpdatedData['name'],
            'birth_date' => $validUpdatedData['birth_date'],
            'identity_number' => $validUpdatedData['identity_number'],
            'qualifications' => $validUpdatedData['qualifications'],
            'job_status' => $validUpdatedData['job_status'],
            'job_title' => $validUpdatedData['job_title'],
            'job_salary' => $validUpdatedData['job_salary'],
            'marital_status' => $validUpdatedData['marital_status'],
            'marital_state_date' => $validUpdatedData['marital_state_date'],
            'address' => $validUpdatedData['address'],
            'illness_status' => $validUpdatedData['illness_status'],
            'illness_type_id' => $validUpdatedData['illness_type_id'],
            'building_id' => $validUpdatedData['building_id'],
        ]);
        if (count($beneficiary->identity_photo) > 0) {
            foreach ($beneficiary->identity_photo as $media) {
                if (!in_array($media->file_name, $request->input('identity_photo', []))) {
                    $media->delete();
                }
            }
        }
        $media = $beneficiary->identity_photo->pluck('file_name')->toArray();
        foreach ($request->input('identity_photo', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $beneficiary->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('identity_photo');
            }
        }
        // update beneficiary needs 
        $beneficiaryNeed->update([
            'unit_id' => $validUpdatedData['unit_id'],
            'description' => $validUpdatedData['description'],
            'trmem_type' => $validUpdatedData['trmem_type'],
            'beneficiary_id' => $beneficiary->id,
        ]);
        if (count($beneficiaryNeed->photos_before) > 0) {
            foreach ($beneficiaryNeed->photos_before as $media) {
                if (!in_array($media->file_name, $request->input('photos_before', []))) {
                    $media->delete();
                }
            }
        }
        $media = $beneficiaryNeed->photos_before->pluck('file_name')->toArray();
        foreach ($request->input('photos_before', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $beneficiaryNeed->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('photos_before');
            }
        }
        //update beneficiary family 
        $beneficiaryFamily->update([
            'name' => $validUpdatedData['family_name'],
            'birth_date' => $validUpdatedData['family_birth_date'],
            'identity_number' => $validUpdatedData['family_identity_number'],
            'qualifications' => $validUpdatedData['family_qualifications'],
            'marital_status' => 'single',
            'illness_status' => $validUpdatedData['family_illness_status'],
            'illness_type_id' => $validUpdatedData['family_illness_type_id'],
            'job_status' => $validUpdatedData['family_job_status'],
            'job_sallary' => $validUpdatedData['family_job_salary'],
            'beneficiary_id' => $beneficiary->id,
            'familyrelation_id' => $validUpdatedData['familyrelation_id'],
        ]);
        if (count($beneficiaryFamily->identity_photos) > 0) {
            foreach ($beneficiaryFamily->identity_photos as $media) {
                if (!in_array($media->file_name, $request->input('family_identity_photos', []))) {
                    $media->delete();
                }
            }
        }
        $media = $beneficiaryFamily->identity_photos->pluck('file_name')->toArray();
        foreach ($request->input('family_identity_photos', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $beneficiaryFamily->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('identity_photos');
            }
        }
        Alert::success('Data Updated Successfully');
        return redirect()->route('organization.beneficiary.index');
    }

    public function show(Request $request)
    {
        $beneficiary = Beneficiary::findOrFail($request->id);
        $beneficiary->load('building','beneficiaryBeneficiaryFamilies.familyrelation', 'beneficiaryBeneficiaryFamilies.illness_type', 'beneficiaryBeneficiaryNeeds.unit', 'illness_type', 'building');
        return view('organization.beneficiaries_show', compact('beneficiary'));
    }

    public function destroy(Request $request)
    {

        $beneficiary =  Beneficiary::findOrFail($request->beneficiary_id);

        $beneficiary->delete();

        return redirect()->route('organization.beneficiary.index');
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
