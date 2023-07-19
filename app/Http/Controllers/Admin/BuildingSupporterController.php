<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyBuildingSupporterRequest;
use App\Http\Requests\StoreBuildingSupporterRequest;
use App\Http\Requests\UpdateBuildingSupporterRequest;
use App\Models\Building;
use App\Models\BuildingSupporter;
use App\Models\Supporter;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BuildingSupporterController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('building_supporter_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $buildingSupporters = BuildingSupporter::with(['supporter', 'building'])->get();

        return view('admin.buildingSupporters.index', compact('buildingSupporters'));
    }

    public function create()
    {
        abort_if(Gate::denies('building_supporter_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $supporters = Supporter::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $buildings = Building::pluck('building_type', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.buildingSupporters.create', compact('buildings', 'supporters'));
    }

    public function store(StoreBuildingSupporterRequest $request)
    {
        $buildingSupporter = BuildingSupporter::create($request->all());
        Alert::success(trans('flash.store.title'),trans('flash.store.body'));
        return redirect()->route('admin.building-supporters.index');
    }

    public function edit(BuildingSupporter $buildingSupporter)
    {
        abort_if(Gate::denies('building_supporter_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $supporters = Supporter::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $buildings = Building::pluck('building_type', 'id')->prepend(trans('global.pleaseSelect'), '');

        $buildingSupporter->load('supporter', 'building');

        return view('admin.buildingSupporters.edit', compact('buildingSupporter', 'buildings', 'supporters'));
    }

    public function update(UpdateBuildingSupporterRequest $request, BuildingSupporter $buildingSupporter)
    {
        $buildingSupporter->update($request->all());
        Alert::success(trans('flash.update.title'),trans('flash.update.body'));
        return redirect()->route('admin.building-supporters.index');
    }

    public function show(BuildingSupporter $buildingSupporter)
    {
        abort_if(Gate::denies('building_supporter_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $buildingSupporter->load('supporter', 'building');

        return view('admin.buildingSupporters.show', compact('buildingSupporter'));
    }

    public function destroy(BuildingSupporter $buildingSupporter)
    {
        abort_if(Gate::denies('building_supporter_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $buildingSupporter->delete();
        Alert::success(trans('flash.destroy.title'),trans('flash.destroy.body'));
        return back();
    }

    public function massDestroy(MassDestroyBuildingSupporterRequest $request)
    {
        $buildingSupporters = BuildingSupporter::find(request('ids'));

        foreach ($buildingSupporters as $buildingSupporter) {
            $buildingSupporter->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
