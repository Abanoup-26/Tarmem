<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Models\BeneficiaryNeed;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class BeneficiaryNeedsController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('beneficiary_need_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = BeneficiaryNeed::with(['unit', 'beneficiary'])->select(sprintf('%s.*', (new BeneficiaryNeed)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'beneficiary_need_show';
                $editGate      = 'beneficiary_need_edit';
                $deleteGate    = 'beneficiary_need_delete';
                $crudRoutePart = 'beneficiary-needs';

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
            $table->addColumn('unit_name', function ($row) {
                return $row->unit ? $row->unit->name : '';
            });

            $table->editColumn('description', function ($row) {
                return $row->description ? $row->description : '';
            });
            $table->editColumn('trmem_type', function ($row) {
                return $row->trmem_type ? BeneficiaryNeed::TRMEM_TYPE_SELECT[$row->trmem_type] : '';
            });
            $table->editColumn('photos_before', function ($row) {
                if (! $row->photos_before) {
                    return '';
                }
                $links = [];
                foreach ($row->photos_before as $media) {
                    $links[] = '<a href="' . $media->getUrl() . '" target="_blank">' . trans('global.downloadFile') . '</a>';
                }

                return implode(', ', $links);
            });
            $table->editColumn('photos_after', function ($row) {
                if (! $row->photos_after) {
                    return '';
                }
                $links = [];
                foreach ($row->photos_after as $media) {
                    $links[] = '<a href="' . $media->getUrl() . '" target="_blank">' . trans('global.downloadFile') . '</a>';
                }

                return implode(', ', $links);
            });
            $table->addColumn('beneficiary_name', function ($row) {
                return $row->beneficiary ? $row->beneficiary->name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'unit', 'photos_before', 'photos_after', 'beneficiary']);

            return $table->make(true);
        }

        return view('admin.beneficiaryNeeds.index');
    }

    public function show(BeneficiaryNeed $beneficiaryNeed)
    {
        abort_if(Gate::denies('beneficiary_need_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $beneficiaryNeed->load('unit', 'beneficiary');

        return view('admin.beneficiaryNeeds.show', compact('beneficiaryNeed'));
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('beneficiary_need_create') && Gate::denies('beneficiary_need_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new BeneficiaryNeed();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
