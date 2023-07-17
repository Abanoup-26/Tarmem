<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Models\Beneficiary;
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
            $query = Beneficiary::with(['illness_type', 'building'])->select(sprintf('%s.*', (new Beneficiary)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'beneficiary_show';
                $editGate      = 'beneficiary_edit';
                $deleteGate    = 'beneficiary_delete';
                $crudRoutePart = 'beneficiaries';

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
            $table->editColumn('identity_photo', function ($row) {
                if (! $row->identity_photo) {
                    return '';
                }
                $links = [];
                foreach ($row->identity_photo as $media) {
                    $links[] = '<a href="' . $media->getUrl() . '" target="_blank"><img src="' . $media->getUrl('thumb') . '" width="50px" height="50px"></a>';
                }

                return implode(' ', $links);
            });
            $table->editColumn('qualifications', function ($row) {
                return $row->qualifications ? $row->qualifications : '';
            });
            $table->editColumn('job_status', function ($row) {
                return $row->job_status ? Beneficiary::JOB_STATUS_RADIO[$row->job_status] : '';
            });
            $table->editColumn('job_title', function ($row) {
                return $row->job_title ? $row->job_title : '';
            });
            $table->editColumn('job_salary', function ($row) {
                return $row->job_salary ? $row->job_salary : '';
            });
            $table->editColumn('marital_status', function ($row) {
                return $row->marital_status ? Beneficiary::MARITAL_STATUS_SELECT[$row->marital_status] : '';
            });

            $table->editColumn('address', function ($row) {
                return $row->address ? $row->address : '';
            });
            $table->editColumn('illness_status', function ($row) {
                return $row->illness_status ? Beneficiary::ILLNESS_STATUS_RADIO[$row->illness_status] : '';
            });
            $table->addColumn('illness_type_name', function ($row) {
                return $row->illness_type ? $row->illness_type->name : '';
            });

            $table->addColumn('building_building_type', function ($row) {
                return $row->building ? $row->building->building_type : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'identity_photo', 'illness_type', 'building']);

            return $table->make(true);
        }

        return view('admin.beneficiaries.index');
    }

    public function show(Beneficiary $beneficiary)
    {
        abort_if(Gate::denies('beneficiary_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $beneficiary->load('illness_type', 'building', 'beneficiaryBeneficiaryFamilies','beneficiaryBeneficiaryNeeds');

        return view('admin.beneficiaries.show', compact('beneficiary'));
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
