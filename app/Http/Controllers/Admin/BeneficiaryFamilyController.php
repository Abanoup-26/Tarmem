<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Models\BeneficiaryFamily;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class BeneficiaryFamilyController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('beneficiary_family_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = BeneficiaryFamily::with(['illness_type', 'beneficiary', 'familyrelation'])->select(sprintf('%s.*', (new BeneficiaryFamily)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'beneficiary_family_show';
                $editGate      = 'beneficiary_family_edit';
                $deleteGate    = 'beneficiary_family_delete';
                $crudRoutePart = 'beneficiary-families';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });

            $table->editColumn('identity_number', function ($row) {
                return $row->identity_number ? $row->identity_number : '';
            });
            $table->editColumn('identity_photos', function ($row) {
                if (! $row->identity_photos) {
                    return '';
                }
                $links = [];
                foreach ($row->identity_photos as $media) {
                    $links[] = '<a href="' . $media->getUrl() . '" target="_blank"><img src="' . $media->getUrl('thumb') . '" width="50px" height="50px"></a>';
                }

                return implode(' ', $links);
            });
            $table->editColumn('qualifications', function ($row) {
                return $row->qualifications ? $row->qualifications : '';
            });
            $table->editColumn('marital_status', function ($row) {
                return $row->marital_status ? BeneficiaryFamily::MARITAL_STATUS_SELECT[$row->marital_status] : '';
            });
            $table->editColumn('illness_status', function ($row) {
                return $row->illness_status ? BeneficiaryFamily::ILLNESS_STATUS_RADIO[$row->illness_status] : '';
            });
            $table->addColumn('illness_type_name', function ($row) {
                return $row->illness_type ? $row->illness_type->name : '';
            });

            $table->editColumn('job_status', function ($row) {
                return $row->job_status ? BeneficiaryFamily::JOB_STATUS_RADIO[$row->job_status] : '';
            });
            $table->editColumn('employer', function ($row) {
                return $row->employer ? $row->employer : '';
            });
            $table->editColumn('job_sallary', function ($row) {
                return $row->job_sallary ? $row->job_sallary : '';
            });
            $table->addColumn('beneficiary_name', function ($row) {
                return $row->beneficiary ? $row->beneficiary->name : '';
            });

            $table->addColumn('familyrelation_name', function ($row) {
                return $row->familyrelation ? $row->familyrelation->name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'identity_photos', 'illness_type', 'beneficiary', 'familyrelation']);

            return $table->make(true);
        }

        return view('admin.beneficiaryFamilies.index');
    }

    public function show(BeneficiaryFamily $beneficiaryFamily)
    {
        abort_if(Gate::denies('beneficiary_family_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $beneficiaryFamily->load('illness_type', 'beneficiary', 'familyrelation');

        return view('admin.beneficiaryFamilies.show', compact('beneficiaryFamily'));
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('beneficiary_family_create') && Gate::denies('beneficiary_family_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new BeneficiaryFamily();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
