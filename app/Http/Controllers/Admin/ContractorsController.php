<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyContractorRequest;
use App\Http\Requests\StoreContractorRequest;
use App\Http\Requests\UpdateContractorRequest;
use App\Models\Contractor;
use App\Models\ContractorServieceType;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ContractorsController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('contractor_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Contractor::with(['user', 'services'])->select(sprintf('%s.*', (new Contractor)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'contractor_show';
                $editGate      = 'contractor_edit';
                $deleteGate    = 'contractor_delete';
                $crudRoutePart = 'contractors';

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
            $table->editColumn('position', function ($row) {
                return $row->position ? $row->position : '';
            });
            $table->editColumn('website', function ($row) {
                return $row->website ? $row->website : '';
            });
            $table->editColumn('commercial_record', function ($row) {
                return $row->commercial_record ? '<a href="' . $row->commercial_record->getUrl() . '" target="_blank">' . trans('global.downloadFile') . '</a>' : '';
            });
            $table->editColumn('safety_certificate', function ($row) {
                return $row->safety_certificate ? '<a href="' . $row->safety_certificate->getUrl() . '" target="_blank">' . trans('global.downloadFile') . '</a>' : '';
            });
            $table->editColumn('tax', function ($row) {
                return $row->tax ? '<a href="' . $row->tax->getUrl() . '" target="_blank">' . trans('global.downloadFile') . '</a>' : '';
            });
            $table->editColumn('income', function ($row) {
                return $row->income ? '<a href="' . $row->income->getUrl() . '" target="_blank">' . trans('global.downloadFile') . '</a>' : '';
            });
            $table->editColumn('social_insurance', function ($row) {
                return $row->social_insurance ? '<a href="' . $row->social_insurance->getUrl() . '" target="_blank">' . trans('global.downloadFile') . '</a>' : '';
            });
            $table->editColumn('human_resources', function ($row) {
                return $row->human_resources ? '<a href="' . $row->human_resources->getUrl() . '" target="_blank">' . trans('global.downloadFile') . '</a>' : '';
            });
            $table->editColumn('bank_certificate', function ($row) {
                return $row->bank_certificate ? '<a href="' . $row->bank_certificate->getUrl() . '" target="_blank">' . trans('global.downloadFile') . '</a>' : '';
            });
            $table->editColumn('commitment_letter', function ($row) {
                return $row->commitment_letter ? '<a href="' . $row->commitment_letter->getUrl() . '" target="_blank">' . trans('global.downloadFile') . '</a>' : '';
            });
            $table->addColumn('user_name', function ($row) {
                return $row->user ? $row->user->name : '';
            });

            $table->editColumn('services', function ($row) {
                $labels = [];
                foreach ($row->services as $service) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $service->name);
                }

                return implode(' ', $labels);
            });

            $table->rawColumns(['actions', 'placeholder', 'commercial_record', 'safety_certificate', 'tax', 'income', 'social_insurance', 'human_resources', 'bank_certificate', 'commitment_letter', 'user', 'services']);

            return $table->make(true);
        }

        return view('admin.contractors.index');
    }

    public function create()
    {
        abort_if(Gate::denies('contractor_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $services = ContractorServieceType::pluck('name', 'id');

        return view('admin.contractors.create', compact('services', 'users'));
    }

    public function store(StoreContractorRequest $request)
    {
        $contractor = Contractor::create($request->all());
        $contractor->services()->sync($request->input('services', []));
        if ($request->input('commercial_record', false)) {
            $contractor->addMedia(storage_path('tmp/uploads/' . basename($request->input('commercial_record'))))->toMediaCollection('commercial_record');
        }

        if ($request->input('safety_certificate', false)) {
            $contractor->addMedia(storage_path('tmp/uploads/' . basename($request->input('safety_certificate'))))->toMediaCollection('safety_certificate');
        }

        if ($request->input('tax', false)) {
            $contractor->addMedia(storage_path('tmp/uploads/' . basename($request->input('tax'))))->toMediaCollection('tax');
        }

        if ($request->input('income', false)) {
            $contractor->addMedia(storage_path('tmp/uploads/' . basename($request->input('income'))))->toMediaCollection('income');
        }

        if ($request->input('social_insurance', false)) {
            $contractor->addMedia(storage_path('tmp/uploads/' . basename($request->input('social_insurance'))))->toMediaCollection('social_insurance');
        }

        if ($request->input('human_resources', false)) {
            $contractor->addMedia(storage_path('tmp/uploads/' . basename($request->input('human_resources'))))->toMediaCollection('human_resources');
        }

        if ($request->input('bank_certificate', false)) {
            $contractor->addMedia(storage_path('tmp/uploads/' . basename($request->input('bank_certificate'))))->toMediaCollection('bank_certificate');
        }

        if ($request->input('commitment_letter', false)) {
            $contractor->addMedia(storage_path('tmp/uploads/' . basename($request->input('commitment_letter'))))->toMediaCollection('commitment_letter');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $contractor->id]);
        }

        return redirect()->route('admin.contractors.index');
    }

    public function edit(Contractor $contractor)
    {
        abort_if(Gate::denies('contractor_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $services = ContractorServieceType::pluck('name', 'id');

        $contractor->load('user', 'services');

        return view('admin.contractors.edit', compact('contractor', 'services', 'users'));
    }

    public function update(UpdateContractorRequest $request, Contractor $contractor)
    {
        $contractor->update($request->all());
        $contractor->services()->sync($request->input('services', []));
        if ($request->input('commercial_record', false)) {
            if (! $contractor->commercial_record || $request->input('commercial_record') !== $contractor->commercial_record->file_name) {
                if ($contractor->commercial_record) {
                    $contractor->commercial_record->delete();
                }
                $contractor->addMedia(storage_path('tmp/uploads/' . basename($request->input('commercial_record'))))->toMediaCollection('commercial_record');
            }
        } elseif ($contractor->commercial_record) {
            $contractor->commercial_record->delete();
        }

        if ($request->input('safety_certificate', false)) {
            if (! $contractor->safety_certificate || $request->input('safety_certificate') !== $contractor->safety_certificate->file_name) {
                if ($contractor->safety_certificate) {
                    $contractor->safety_certificate->delete();
                }
                $contractor->addMedia(storage_path('tmp/uploads/' . basename($request->input('safety_certificate'))))->toMediaCollection('safety_certificate');
            }
        } elseif ($contractor->safety_certificate) {
            $contractor->safety_certificate->delete();
        }

        if ($request->input('tax', false)) {
            if (! $contractor->tax || $request->input('tax') !== $contractor->tax->file_name) {
                if ($contractor->tax) {
                    $contractor->tax->delete();
                }
                $contractor->addMedia(storage_path('tmp/uploads/' . basename($request->input('tax'))))->toMediaCollection('tax');
            }
        } elseif ($contractor->tax) {
            $contractor->tax->delete();
        }

        if ($request->input('income', false)) {
            if (! $contractor->income || $request->input('income') !== $contractor->income->file_name) {
                if ($contractor->income) {
                    $contractor->income->delete();
                }
                $contractor->addMedia(storage_path('tmp/uploads/' . basename($request->input('income'))))->toMediaCollection('income');
            }
        } elseif ($contractor->income) {
            $contractor->income->delete();
        }

        if ($request->input('social_insurance', false)) {
            if (! $contractor->social_insurance || $request->input('social_insurance') !== $contractor->social_insurance->file_name) {
                if ($contractor->social_insurance) {
                    $contractor->social_insurance->delete();
                }
                $contractor->addMedia(storage_path('tmp/uploads/' . basename($request->input('social_insurance'))))->toMediaCollection('social_insurance');
            }
        } elseif ($contractor->social_insurance) {
            $contractor->social_insurance->delete();
        }

        if ($request->input('human_resources', false)) {
            if (! $contractor->human_resources || $request->input('human_resources') !== $contractor->human_resources->file_name) {
                if ($contractor->human_resources) {
                    $contractor->human_resources->delete();
                }
                $contractor->addMedia(storage_path('tmp/uploads/' . basename($request->input('human_resources'))))->toMediaCollection('human_resources');
            }
        } elseif ($contractor->human_resources) {
            $contractor->human_resources->delete();
        }

        if ($request->input('bank_certificate', false)) {
            if (! $contractor->bank_certificate || $request->input('bank_certificate') !== $contractor->bank_certificate->file_name) {
                if ($contractor->bank_certificate) {
                    $contractor->bank_certificate->delete();
                }
                $contractor->addMedia(storage_path('tmp/uploads/' . basename($request->input('bank_certificate'))))->toMediaCollection('bank_certificate');
            }
        } elseif ($contractor->bank_certificate) {
            $contractor->bank_certificate->delete();
        }

        if ($request->input('commitment_letter', false)) {
            if (! $contractor->commitment_letter || $request->input('commitment_letter') !== $contractor->commitment_letter->file_name) {
                if ($contractor->commitment_letter) {
                    $contractor->commitment_letter->delete();
                }
                $contractor->addMedia(storage_path('tmp/uploads/' . basename($request->input('commitment_letter'))))->toMediaCollection('commitment_letter');
            }
        } elseif ($contractor->commitment_letter) {
            $contractor->commitment_letter->delete();
        }

        return redirect()->route('admin.contractors.index');
    }

    public function show(Contractor $contractor)
    {
        abort_if(Gate::denies('contractor_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contractor->load('user', 'services');

        return view('admin.contractors.show', compact('contractor'));
    }

    public function destroy(Contractor $contractor)
    {
        abort_if(Gate::denies('contractor_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contractor->delete();

        return back();
    }

    public function massDestroy(MassDestroyContractorRequest $request)
    {
        $contractors = Contractor::find(request('ids'));

        foreach ($contractors as $contractor) {
            $contractor->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('contractor_create') && Gate::denies('contractor_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Contractor();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
