<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyContractorServieceTypeRequest;
use App\Http\Requests\StoreContractorServieceTypeRequest;
use App\Http\Requests\UpdateContractorServieceTypeRequest;
use App\Models\ContractorServieceType;
use Gate;
use Alert;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ContractorServieceTypesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('contractor_serviece_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contractorServieceTypes = ContractorServieceType::all();

        return view('admin.contractorServieceTypes.index', compact('contractorServieceTypes'));
    }

    public function create()
    {
        abort_if(Gate::denies('contractor_serviece_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.contractorServieceTypes.create');
    }

    public function store(StoreContractorServieceTypeRequest $request)
    {
        $contractorServieceType = ContractorServieceType::create($request->all());
        Alert::success(trans('flash.store.success_title'),trans('flash.store.success_body'));
        return redirect()->route('admin.contractor-serviece-types.index');
    }

    public function edit(ContractorServieceType $contractorServieceType)
    {
        abort_if(Gate::denies('contractor_serviece_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.contractorServieceTypes.edit', compact('contractorServieceType'));
    }

    public function update(UpdateContractorServieceTypeRequest $request, ContractorServieceType $contractorServieceType)
    {
        $contractorServieceType->update($request->all());
        Alert::success(trans('flash.update.success_title'),trans('flash.update.success_body'));
        return redirect()->route('admin.contractor-serviece-types.index');
    }

    public function show(ContractorServieceType $contractorServieceType)
    {
        abort_if(Gate::denies('contractor_serviece_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.contractorServieceTypes.show', compact('contractorServieceType'));
    }

    public function destroy(ContractorServieceType $contractorServieceType)
    {
        abort_if(Gate::denies('contractor_serviece_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contractorServieceType->delete();
        Alert::success(trans('flash.destory.success_title'),trans('flash.destory.success_body'));
        return back();
    }

    public function massDestroy(MassDestroyContractorServieceTypeRequest $request)
    {
        $contractorServieceTypes = ContractorServieceType::find(request('ids'));

        foreach ($contractorServieceTypes as $contractorServieceType) {
            $contractorServieceType->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
