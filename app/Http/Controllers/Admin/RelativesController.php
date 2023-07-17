<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyRelativeRequest;
use App\Http\Requests\StoreRelativeRequest;
use App\Http\Requests\UpdateRelativeRequest;
use App\Models\Relative;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RelativesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('relative_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $relatives = Relative::all();

        return view('admin.relatives.index', compact('relatives'));
    }

    public function create()
    {
        abort_if(Gate::denies('relative_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.relatives.create');
    }

    public function store(StoreRelativeRequest $request)
    {
        $relative = Relative::create($request->all());

        return redirect()->route('admin.relatives.index');
    }

    public function edit(Relative $relative)
    {
        abort_if(Gate::denies('relative_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.relatives.edit', compact('relative'));
    }

    public function update(UpdateRelativeRequest $request, Relative $relative)
    {
        $relative->update($request->all());

        return redirect()->route('admin.relatives.index');
    }

    public function show(Relative $relative)
    {
        abort_if(Gate::denies('relative_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.relatives.show', compact('relative'));
    }

    public function destroy(Relative $relative)
    {
        abort_if(Gate::denies('relative_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $relative->delete();

        return back();
    }

    public function massDestroy(MassDestroyRelativeRequest $request)
    {
        $relatives = Relative::find(request('ids'));

        foreach ($relatives as $relative) {
            $relative->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
