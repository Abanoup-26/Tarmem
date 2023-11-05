<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\UpdateBeneficiaryRequest;
use App\Models\Apartment;
use App\Models\Beneficiary;
use App\Models\Building;
use App\Models\Illnesstype;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class BeneficiaryController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('beneficiary_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Beneficiary::with(['illness_type', 'building'])->whereNull('family_id')->select(sprintf('%s.*', (new Beneficiary)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'beneficiary_show';
                $editGate      = 'beneficiary_edit';
                $deleteGate    = 'beneficiary_delete';
                $reviewGate    = 'Review_and_Approval';
                $crudRoutePart = 'beneficiaries';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('qualifications', function ($row) {
                return $row->qualifications ? Beneficiary::QUALIFICATIONS_SELECT[$row->qualifications] : '';
            });
            $table->editColumn('job_status', function ($row) {
                return $row->job_status ? Beneficiary::JOB_STATUS_RADIO[$row->job_status] : '';
            });
            $table->editColumn('marital_status', function ($row) {
                return $row->marital_status ? Beneficiary::MARITAL_STATUS_SELECT[$row->marital_status] : '';
            });
            $table->editColumn('building', function ($row) {
                return $row->name ? $row->building->name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'identity_photo', 'illness_type', 'building']);

            return $table->make(true);
        }

        return view('admin.beneficiaries.index');
    }
    public function change(Request $request)
    {
        $beneficiaryFamilyPerson = Beneficiary::findOrFail($request->id);

        $mainBeneficiary = $beneficiaryFamilyPerson->MainBeneficiary;


        if ($beneficiaryFamilyPerson && $mainBeneficiary) {
            $beneficiaryFamilyPerson->apartment = 'B' . $mainBeneficiary->building_id . '-M' . $mainBeneficiary->id . '-' . 'P' . $beneficiaryFamilyPerson->id;
            $beneficiaryFamilyPerson->family_id = null;
            $beneficiaryFamilyPerson->save();
            $mainBeneficiary->apartment = 'B' . $mainBeneficiary->building_id . '-M' . $mainBeneficiary->id .  '-Partially';
            $mainBeneficiary->save();
            alert('success', 'تم تقسيم الشقة للمستفيد ' . $mainBeneficiary->name . ' إلى قسمين');
        } else {
            // Handle the case where the beneficiaries are not found
            alert('error', 'مستفيد غير موجود');
        }

        return back();
    }




    public function show(Beneficiary $beneficiary)
    {
        abort_if(Gate::denies('beneficiary_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $beneficiary->load('illness_type', 'building', 'familyMembers.family_relation', 'beneficiaryBeneficiaryNeeds.unit');
        // return $beneficiary;
        return view('admin.beneficiaries.show', compact('beneficiary'));
    }
    public function edit(Beneficiary $beneficiary)
    {
        abort_if(Gate::denies('beneficiary_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $illness_types = Illnesstype::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $buildings = Building::pluck('building_type', 'id')->prepend(trans('global.pleaseSelect'), '');

        $beneficiary->load('illness_type', 'building');

        return view('admin.beneficiaries.edit', compact('beneficiary', 'buildings', 'illness_types'));
    }

    public function update(UpdateBeneficiaryRequest $request, Beneficiary $beneficiary)
    {
        // return $request->all();
        $beneficiary->update($request->all());

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

        return redirect()->route('admin.beneficiaries.index');
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('beneficiary_create') && Gate::denies('beneficiary_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Beneficiary();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
