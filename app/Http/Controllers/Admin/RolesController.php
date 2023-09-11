<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyRoleRequest;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Models\Permission;
use App\Models\Role;
use RealRashid\SweetAlert\Facades\Alert;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RolesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('role_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::with(['permissions'])->get();

        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        abort_if(Gate::denies('role_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $permissions = Permission::pluck('title', 'id');
        // return view('admin.roles.create', compact('permissions'));
        Alert::toast("You Can't Add Roles Please Ask the Developer",'warning')->position('center');
        return redirect()->route('admin.roles.index');
    }

    // public function store(StoreRoleRequest $request)
    // {
    //     $role = Role::create($request->all());
    //     $role->permissions()->sync($request->input('permissions', []));

    //     return redirect()->route('admin.roles.index');
    // }

    public function edit(Role $role)
    {
        abort_if(Gate::denies('role_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $permissions = Permission::pluck('title', 'id');

        $role->load('permissions');

        // return view('admin.roles.edit', compact('permissions', 'role'));
        Alert::toast("You Can't Edit Roles Please Ask the Developer",'warning')->position('center');
        return redirect()->route('admin.roles.index');
    }

    public function update(UpdateRoleRequest $request, Role $role)
    {
        $role->update($request->all());
        $role->permissions()->sync($request->input('permissions', []));

        // return redirect()->route('admin.roles.index');
        Alert::toast("You Can't Update Roles Please Ask the Developer",'warning')->position('center');
        return redirect()->route('admin.roles.index');
    }

    public function show(Role $role)
    {
        abort_if(Gate::denies('role_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $role->load('permissions');

        // return view('admin.roles.show', compact('role'));
        Alert::toast("You Can't show Roles Please Ask the Developer",'warning')->position('center');
        return redirect()->route('admin.roles.index');
    }

    public function destroy(Role $role)
    {
        abort_if(Gate::denies('role_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        Alert::toast("You Can't Delete Roles Please Ask the Developer",'warning')->position('center');
        return redirect()->route('admin.roles.index');
        // $role->delete();
        
        // return back();
    }

    public function massDestroy(MassDestroyRoleRequest $request)
    {
        $roles = Role::find(request('ids'));
        Alert::toast("You Can't Delete Roles Please Ask the Developer",'warning')->position('center');
        return redirect()->route('admin.roles.index');
        // foreach ($roles as $role) {
        //     $role->delete();
        // }

        // return response(null, Response::HTTP_NO_CONTENT);
    }
}
