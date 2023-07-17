<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Models\Building;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class BuildingsController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('building_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Building::query()->select(sprintf('%s.*', (new Building)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'building_show';
                $editGate      = 'building_edit';
                $deleteGate    = 'building_delete';
                $crudRoutePart = 'buildings';

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
            $table->editColumn('building_type', function ($row) {
                return $row->building_type ? Building::BUILDING_TYPE_SELECT[$row->building_type] : '';
            });
            $table->editColumn('building_number', function ($row) {
                return $row->building_number ? $row->building_number : '';
            });
            $table->editColumn('floor_count', function ($row) {
                return $row->floor_count ? $row->floor_count : '';
            });
            $table->editColumn('apartments_count', function ($row) {
                return $row->apartments_count ? $row->apartments_count : '';
            });

            $table->editColumn('latitude', function ($row) {
                return $row->latitude ? $row->latitude : '';
            });
            $table->editColumn('longtude', function ($row) {
                return $row->longtude ? $row->longtude : '';
            });
            $table->editColumn('building_photos', function ($row) {
                if (! $row->building_photos) {
                    return '';
                }
                $links = [];
                foreach ($row->building_photos as $media) {
                    $links[] = '<a href="' . $media->getUrl() . '" target="_blank">' . trans('global.downloadFile') . '</a>';
                }

                return implode(', ', $links);
            });
            $table->editColumn('management_statuses', function ($row) {
                return $row->management_statuses ? Building::MANAGEMENT_STATUSES_SELECT[$row->management_statuses] : '';
            });
            $table->editColumn('rejected_reson', function ($row) {
                return $row->rejected_reson ? $row->rejected_reson : '';
            });
            $table->editColumn('stages', function ($row) {
                return $row->stages ? Building::STAGES_SELECT[$row->stages] : '';
            });

            $table->editColumn('research_vist_result', function ($row) {
                return $row->research_vist_result ? '<a href="' . $row->research_vist_result->getUrl() . '" target="_blank">' . trans('global.downloadFile') . '</a>' : '';
            });

            $table->editColumn('engineering_vist_result', function ($row) {
                return $row->engineering_vist_result ? '<a href="' . $row->engineering_vist_result->getUrl() . '" target="_blank">' . trans('global.downloadFile') . '</a>' : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'building_photos', 'research_vist_result', 'engineering_vist_result']);

            return $table->make(true);
        }

        return view('admin.buildings.index');
    }

    public function show(Building $building)
    {
        abort_if(Gate::denies('building_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $building->load('buildingBuildingContractors', 'buildingBeneficiaries', 'buildingBuildingSupporters');

        return view('admin.buildings.show', compact('building'));
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('building_create') && Gate::denies('building_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Building();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
