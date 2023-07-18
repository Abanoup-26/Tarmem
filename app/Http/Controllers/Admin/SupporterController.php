<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySupporterRequest;
use App\Http\Requests\StoreSupporterRequest;
use App\Http\Requests\UpdateSupporterRequest;
use App\Models\Supporter;
use App\Models\User;
use Gate;
use Alert;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class SupporterController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('supporter_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Supporter::with(['user'])->select(sprintf('%s.*', (new Supporter)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'supporter_show';
                $editGate      = 'supporter_edit';
                $deleteGate    = 'supporter_delete';
                $crudRoutePart = 'supporters';

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
            $table->addColumn('user_name', function ($row) {
                return $row->user ? $row->user->name : '';
            });

            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'user']);

            return $table->make(true);
        }

        return view('admin.supporters.index');
    }

    public function create()
    {
        abort_if(Gate::denies('supporter_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.supporters.create', compact('users'));
    }

    public function store(StoreSupporterRequest $request)
    {
        $supporter = Supporter::create($request->all());
        Alert::success(trans('flash.store.success_title'),trans('flash.store.success_body'));
        return redirect()->route('admin.supporters.index');
    }

    public function edit(Supporter $supporter)
    {
        abort_if(Gate::denies('supporter_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $supporter->load('user');

        return view('admin.supporters.edit', compact('supporter', 'users'));
    }

    public function update(UpdateSupporterRequest $request, Supporter $supporter)
    {
        $supporter->update($request->all());
        Alert::success(trans('flash.update.success_title'),trans('flash.update.success_body'));
        return redirect()->route('admin.supporters.index');
    }

    public function show(Supporter $supporter)
    {
        abort_if(Gate::denies('supporter_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $supporter->load('user');

        return view('admin.supporters.show', compact('supporter'));
    }

    public function destroy(Supporter $supporter)
    {
        abort_if(Gate::denies('supporter_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $supporter->delete();
        Alert::success(trans('flash.destory.success_title'),trans('flash.destory.success_body'));
        return back();
    }

    public function massDestroy(MassDestroySupporterRequest $request)
    {
        $supporters = Supporter::find(request('ids'));

        foreach ($supporters as $supporter) {
            $supporter->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
