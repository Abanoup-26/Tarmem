<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyOrganizationRequest;
use App\Http\Requests\StoreOrganizationRequest;
use App\Http\Requests\UpdateOrganizationRequest;
use App\Models\Organization;
use App\Models\OrganizationType;
use Gate;
use \RealRashid\SweetAlert\Facades\Alert;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class OrganizationsController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('organization_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Organization::with(['organization_type', 'user'])->select(sprintf('%s.*', (new Organization)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'organization_show';
                $editGate      = 'organization_edit';
                $deleteGate    = 'organization_delete';
                $crudRoutePart = 'organizations';

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
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('website', function ($row) {
                return $row->website ? $row->website : '';
            });
            $table->addColumn('organization_type_name', function ($row) {
                return $row->organization_type ? $row->organization_type->name : '';
            });

            $table->editColumn('user_approved', function ($row) {
                return  '<label class="c-switch c-switch-pill c-switch-success">
                            <input onchange="update_statuses(this,\'approved\')" value="' . $row->user->id . '" 
                                type="checkbox" class="c-switch-input" ' . ($row->user->approved ? "checked" : null) . '>
                            <span class="c-switch-slider"></span>
                        </label>';
            });
            
            $table->editColumn('logo', function ($row) {
                if ($photo = $row->logo) {
                    return sprintf(
                        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
                        $photo->url,
                        $photo->thumbnail
                    );
                }

                return '';
            });
            $table->rawColumns(['actions', 'placeholder', 'organization_type' , 'user_approved' , 'logo']);

            return $table->make(true);
        }

        return view('admin.organizations.index');
    }

    public function create()
    {
        abort_if(Gate::denies('organization_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $organization_types = OrganizationType::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.organizations.create', compact('organization_types', 'users'));
    }

    public function store(StoreOrganizationRequest $request)
    {
        // create organization user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'approved'       => 0,
            'position'       => $request->position,
            'user_type'      => 'organization',
            'mobile_number'  => $request->mobile_number,
        ]);

        
        // create Organization 
        $organization = Organization::create([
            'name' => $request->organization_name,
            'website' => $request->website,
            'mobile_number' => $request->mobile_number,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'organization_type_id' => $request->organization_type_id,
            'user_id' => $user->id
        ]);
        
        foreach ($request->input('identity_photos', []) as $file) {
            $user->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('identity_photos');
        }

        if ($request->input('commercial_record', false)) {
            $organization->addMedia(storage_path('tmp/uploads/' . basename($request->input('commercial_record'))))->toMediaCollection('commercial_record');
        }

        if ($request->input('partnership_agreement', false)) {
            $organization->addMedia(storage_path('tmp/uploads/' . basename($request->input('partnership_agreement'))))->toMediaCollection('partnership_agreement');
        }

        if ($request->input('logo', false)) {
            $organization->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo'))))->toMediaCollection('logo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $organization->id]);
        }
        Alert::success(trans('flash.store.title'), trans('flash.store.body'));
        return redirect()->route('admin.organizations.index');
    }

    public function edit(Organization $organization)
    {
        abort_if(Gate::denies('organization_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $organization_types = OrganizationType::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $organization->load('organization_type', 'user');

        return view('admin.organizations.edit', compact('organization', 'organization_types'));
    }

    public function update(UpdateOrganizationRequest $request, Organization $organization)
    {
        $organization->update([
            'name' => $request->organization_name,
            'website' => $request->website,
            'mobile_number' => $request->mobile_number,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'organization_type_id' => $request->organization_type_id,
        ]);

        //update the user 
        $user = User::find($organization->user_id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            // check if new password != null 
            'password' => $request->password != null ? bcrypt($request->password) : $user->password,
            'position'       => $request->position,
            'mobile_number'  => $request->mobile_number,

        ]);

        if (count($user->identity_photos) > 0) {
            foreach ($user->identity_photos as $media) {
                if (!in_array($media->file_name, $request->input('identity_photos', []))) {
                    $media->delete();
                }
            }
        }
        $media = $user->identity_photos->pluck('file_name')->toArray();
        foreach ($request->input('identity_photos', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $user->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('identity_photos');
            }
        }

        if ($request->input('commercial_record', false)) {
            if (!$organization->commercial_record || $request->input('commercial_record') !== $organization->commercial_record->file_name) {
                if ($organization->commercial_record) {
                    $organization->commercial_record->delete();
                }
                $organization->addMedia(storage_path('tmp/uploads/' . basename($request->input('commercial_record'))))->toMediaCollection('commercial_record');
            }
        } elseif ($organization->commercial_record) {
            $organization->commercial_record->delete();
        }

        if ($request->input('partnership_agreement', false)) {
            if (!$organization->partnership_agreement || $request->input('partnership_agreement') !== $organization->partnership_agreement->file_name) {
                if ($organization->partnership_agreement) {
                    $organization->partnership_agreement->delete();
                }
                $organization->addMedia(storage_path('tmp/uploads/' . basename($request->input('partnership_agreement'))))->toMediaCollection('partnership_agreement');
            }
        } elseif ($organization->partnership_agreement) {
            $organization->partnership_agreement->delete();
        }

        if ($request->input('logo', false)) {
            if (!$organization->logo || $request->input('logo') !== $organization->logo->file_name) {
                if ($organization->logo) {
                    $organization->logo->delete();
                }
                $organization->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo'))))->toMediaCollection('logo');
            }
        } elseif ($organization->logo) {
            $organization->logo->delete();
        }
        Alert::success(trans('flash.update.title'), trans('flash.update.body'));
        return redirect()->route('admin.organizations.index');
    }

    public function show(Organization $organization)
    {
        abort_if(Gate::denies('organization_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $organization->load('organization_type', 'user');

        return view('admin.organizations.show', compact('organization'));
    }

    public function destroy(Organization $organization)
    {
        abort_if(Gate::denies('organization_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $organization->delete();
        Alert::success(trans('flash.destroy.title'), trans('flash.destroy.body'));
        return back();
    }

    public function massDestroy(MassDestroyOrganizationRequest $request)
    {
        $organizations = Organization::find(request('ids'));

        foreach ($organizations as $organization) {
            $organization->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('organization_create') && Gate::denies('organization_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Organization();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
