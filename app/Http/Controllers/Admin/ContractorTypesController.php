<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyContractorTypeRequest;
use App\Http\Requests\StoreContractorTypeRequest;
use App\Http\Requests\UpdateContractorTypeRequest;
use App\Models\ContractorType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ContractorTypesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('contractor_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contractorTypes = ContractorType::all();

        return view('admin.contractorTypes.index', compact('contractorTypes'));
    }

    public function create()
    {
        abort_if(Gate::denies('contractor_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.contractorTypes.create');
    }

    public function store(StoreContractorTypeRequest $request)
    {
        $contractorType = ContractorType::create($request->all());

        return redirect()->route('admin.contractor-types.index');
    }

    public function edit(ContractorType $contractorType)
    {
        abort_if(Gate::denies('contractor_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.contractorTypes.edit', compact('contractorType'));
    }

    public function update(UpdateContractorTypeRequest $request, ContractorType $contractorType)
    {
        $contractorType->update($request->all());

        return redirect()->route('admin.contractor-types.index');
    }

    public function show(ContractorType $contractorType)
    {
        abort_if(Gate::denies('contractor_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.contractorTypes.show', compact('contractorType'));
    }

    public function destroy(ContractorType $contractorType)
    {
        abort_if(Gate::denies('contractor_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contractorType->delete();

        return back();
    }

    public function massDestroy(MassDestroyContractorTypeRequest $request)
    {
        $contractorTypes = ContractorType::find(request('ids'));

        foreach ($contractorTypes as $contractorType) {
            $contractorType->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
