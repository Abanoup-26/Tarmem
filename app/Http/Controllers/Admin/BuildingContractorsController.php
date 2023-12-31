<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyBuildingContractorRequest;
use App\Http\Requests\StoreBuildingContractorRequest;
use App\Http\Requests\UpdateBuildingContractorRequest;
use App\Models\Building;
use App\Models\BuildingContractor;
use App\Models\Contractor;
use Gate;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class BuildingContractorsController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('building_contractor_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = BuildingContractor::with(['contractor', 'building'])->select(sprintf('%s.*', (new BuildingContractor)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'building_contractor_show';
                $editGate      = 'building_contractor_edit';
                $deleteGate    = 'building_contractor_delete';
                $crudRoutePart = 'building-contractors';

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

            $table->editColumn('stages', function ($row) {
                return $row->stages ? BuildingContractor::STAGES_SELECT[$row->stages] : '';
            });
            $table->editColumn('contract', function ($row) {
                return $row->contract ? '<a href="' . $row->contract->getUrl() . '" target="_blank">' . trans('global.downloadFile') . '</a>' : '';
            });
            $table->addColumn('contractor_position', function ($row) {
                return $row->contractor ? $row->contractor->position : '';
            });

            $table->addColumn('building_building_number', function ($row) {
                return $row->building ? $row->building->building_number : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'contract', 'contractor', 'building']);

            return $table->make(true);
        }

        return view('admin.buildingContractors.index');
    }

    public function create()
    {
        abort_if(Gate::denies('building_contractor_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contractors = Contractor::pluck('position', 'id')->prepend(trans('global.pleaseSelect'), '');

        $buildings = Building::pluck('building_number', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.buildingContractors.create', compact('buildings', 'contractors'));
    }

    public function store(StoreBuildingContractorRequest $request)
    {

        // prevent from adding the contractor to the same building mutliple times
        if (BuildingContractor::where('contractor_id', $request->contractor_id)->where('building_id', $request->building_id)->first()) {
            Alert::warning('The Contractor Already Exsist', '');
            return redirect()->route('admin.buildings.show', $request->building_id);
        }

        $buildingContractor = BuildingContractor::create($request->all());

        if ($request->input('contract', false)) {
            $buildingContractor->addMedia(storage_path('tmp/uploads/' . basename($request->input('contract'))))->toMediaCollection('contract');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $buildingContractor->id]);
        }
        Alert::success(trans('flash.store.title'), trans('flash.store.body'));
        return redirect()->route('admin.buildings.show', $buildingContractor->building_id);
    }

    public function edit(BuildingContractor $buildingContractor)
    {
        abort_if(Gate::denies('building_contractor_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contractors = Contractor::pluck('position', 'id')->prepend(trans('global.pleaseSelect'), '');

        $buildings = Building::pluck('building_number', 'id')->prepend(trans('global.pleaseSelect'), '');

        $buildingContractor->load('contractor', 'building');

        return view('admin.buildingContractors.edit', compact('buildingContractor', 'buildings', 'contractors'));
    }

    public function update(UpdateBuildingContractorRequest $request, BuildingContractor $buildingContractor)
    {
        $buildingContractor->update($request->all());
        Alert::success(trans('flash.update.title'), trans('flash.update.body'));
        return redirect()->route('admin.buildings.show', $buildingContractor->building_id);
    }

    public function show(BuildingContractor $buildingContractor)
    {
        abort_if(Gate::denies('building_contractor_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $buildingContractor->load('contractor', 'building');

        return view('admin.buildingContractors.show', compact('buildingContractor'));
    }

    public function destroy(BuildingContractor $buildingContractor)
    {
        abort_if(Gate::denies('building_contractor_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $buildingContractor->delete();
        Alert::success(trans('flash.destroy.title'), trans('flash.destroy.body'));
        return back();
    }

    public function massDestroy(MassDestroyBuildingContractorRequest $request)
    {
        $buildingContractors = BuildingContractor::find(request('ids'));

        foreach ($buildingContractors as $buildingContractor) {
            $buildingContractor->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('building_contractor_create') && Gate::denies('building_contractor_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new BuildingContractor();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
