<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyBuildingManagmentRequest;
use App\Http\Requests\StoreBuildingManagmentRequest;
use App\Http\Requests\UpdateBuildingManagmentRequest;
use App\Models\Building;
use App\Models\BuildingManagment;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class BuildingManagmentController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('building_managment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = BuildingManagment::with(['buildings', 'users'])->select(sprintf('%s.*', (new BuildingManagment)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'building_managment_show';
                $editGate      = 'building_managment_edit';
                $deleteGate    = 'building_managment_delete';
                $crudRoutePart = 'building-managments';

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
            $table->editColumn('building', function ($row) {
                $labels = [];
                foreach ($row->buildings as $building) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $building->building_number);
                }

                return implode(' ', $labels);
            });
            $table->editColumn('user', function ($row) {
                $labels = [];
                foreach ($row->users as $user) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $user->name);
                }

                return implode(' ', $labels);
            });

            $table->rawColumns(['actions', 'placeholder', 'building', 'user']);

            return $table->make(true);
        }

        return view('admin.buildingManagments.index');
    }

    public function create()
    {
        abort_if(Gate::denies('building_managment_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $buildings = Building::pluck('building_number', 'id');

        $users = User::pluck('name', 'id');

        return view('admin.buildingManagments.create', compact('buildings', 'users'));
    }

    public function store(StoreBuildingManagmentRequest $request)
    {
        $buildingManagment = BuildingManagment::create($request->all());
        $buildingManagment->buildings()->sync($request->input('buildings', []));
        $buildingManagment->users()->sync($request->input('users', []));

        return redirect()->route('admin.building-managments.index');
    }

    public function edit(BuildingManagment $buildingManagment)
    {
        abort_if(Gate::denies('building_managment_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $buildings = Building::pluck('building_number', 'id');

        $users = User::pluck('name', 'id');

        $buildingManagment->load('buildings', 'users');

        return view('admin.buildingManagments.edit', compact('buildingManagment', 'buildings', 'users'));
    }

    public function update(UpdateBuildingManagmentRequest $request, BuildingManagment $buildingManagment)
    {
        $buildingManagment->update($request->all());
        $buildingManagment->buildings()->sync($request->input('buildings', []));
        $buildingManagment->users()->sync($request->input('users', []));

        return redirect()->route('admin.building-managments.index');
    }

    public function show(BuildingManagment $buildingManagment)
    {
        abort_if(Gate::denies('building_managment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $buildingManagment->load('buildings', 'users');

        return view('admin.buildingManagments.show', compact('buildingManagment'));
    }

    public function destroy(BuildingManagment $buildingManagment)
    {
        abort_if(Gate::denies('building_managment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $buildingManagment->delete();

        return back();
    }

    public function massDestroy(MassDestroyBuildingManagmentRequest $request)
    {
        $buildingManagments = BuildingManagment::find(request('ids'));

        foreach ($buildingManagments as $buildingManagment) {
            $buildingManagment->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}