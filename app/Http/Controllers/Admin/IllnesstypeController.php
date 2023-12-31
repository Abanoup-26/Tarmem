<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyIllnesstypeRequest;
use App\Http\Requests\StoreIllnesstypeRequest;
use App\Http\Requests\UpdateIllnesstypeRequest;
use App\Models\Illnesstype;
use Gate;
use Alert;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IllnesstypeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('illnesstype_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $illnesstypes = Illnesstype::all();

        return view('admin.illnesstypes.index', compact('illnesstypes'));
    }

    public function create()
    {
        abort_if(Gate::denies('illnesstype_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.illnesstypes.create');
    }

    public function store(StoreIllnesstypeRequest $request)
    {
        $illnesstype = Illnesstype::create($request->all());
        Alert::success(trans('flash.store.title'),trans('flash.store.body'));
        return redirect()->route('admin.illnesstypes.index');
    }

    public function edit(Illnesstype $illnesstype)
    {
        abort_if(Gate::denies('illnesstype_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.illnesstypes.edit', compact('illnesstype'));
    }

    public function update(UpdateIllnesstypeRequest $request, Illnesstype $illnesstype)
    {
        $illnesstype->update($request->all());
        Alert::success(trans('flash.update.title'),trans('flash.update.body'));
        return redirect()->route('admin.illnesstypes.index');
    }

    public function show(Illnesstype $illnesstype)
    {
        abort_if(Gate::denies('illnesstype_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.illnesstypes.show', compact('illnesstype'));
    }

    public function destroy(Illnesstype $illnesstype)
    {
        abort_if(Gate::denies('illnesstype_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $illnesstype->delete();
        Alert::success(trans('flash.destroy.title'),trans('flash.destroy.body'));
        return back();
    }

    public function massDestroy(MassDestroyIllnesstypeRequest $request)
    {
        $illnesstypes = Illnesstype::find(request('ids'));

        foreach ($illnesstypes as $illnesstype) {
            $illnesstype->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
