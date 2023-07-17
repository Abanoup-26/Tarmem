<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySupporterRequest;
use App\Http\Requests\StoreSupporterRequest;
use App\Http\Requests\UpdateSupporterRequest;
use App\Models\Supporter;
use App\Models\User;
use Gate;
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
         // create supporter user 
        $user=User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'approved'       => 0,
            'position'       => $request->position,
            'user_type'      => 'suppoter',
            'mobile_number'  => $request->mobile_number,
        ]); 
        // validate supporter user id 
         // validate user id 
         $validated_request = $request->all();
         $validated_request['user_id'] = $user->id;

        $supporter = Supporter::create($validated_request);

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
        //update supporter User 
        
        $user = User::find($supporter->user_id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            // check if new password != null 
            'password' => $request->password != null ? bcrypt($request->password) : $user->password,
            'approved'       => 0,
            'position'       => $request->position,
            'user_type'      => 'supporter',
            'mobile_number'  => $request->mobile_number,
        ]);
        
        $supporter->update($request->all());

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
