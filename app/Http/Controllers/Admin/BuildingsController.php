<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Models\Building;
use Gate;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\UpdateBuildingRequest;
use App\Models\BuildingContractor;
use App\Models\Contractor;
use App\Models\Organization;
use App\Models\Supporter;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class BuildingsController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('building_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Building::with(['organization'])->where('management_statuses', '!=', 'pending')->select(sprintf('%s.*', (new Building)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'building_show';
                $crudRoutePart = 'buildings';

                return view('partials.buildingActions', compact(
                    'viewGate',
                    'crudRoutePart',
                    'row'
                ));
            });


            $table->editColumn('building_type', function ($row) {
                return $row->building_type ? Building::BUILDING_TYPE_SELECT[$row->building_type] : '';
            });

            $table->editColumn('management_statuses', function ($row) {
                return $row->management_statuses ? Building::MANAGEMENT_STATUSES_SELECT[$row->management_statuses] : '';
            });
            $table->editColumn('rejected_reson', function ($row) {
                return $row->rejected_reson ? $row->rejected_reson : '';
            });
            $table->editColumn('stages', function ($row) {
                return $row->stages ? Building::STAGES_SELECT[$row->stages] : '';
            });

            $table->editColumn('research_vist_result', function ($row) {
                return $row->research_vist_result ? '<a href="' . $row->research_vist_result->getUrl() . '" target="_blank">' . trans('global.downloadFile') . '</a>' : '';
            });

            $table->editColumn('engineering_vist_result', function ($row) {
                return $row->engineering_vist_result ? '<a href="' . $row->engineering_vist_result->getUrl() . '" target="_blank">' . trans('global.downloadFile') . '</a>' : '';
            });
            $table->addColumn('organization_name', function ($row) {
                return $row->organization ? $row->organization->name : '';
            });
            $table->editColumn('project_name', function ($row) {
                return $row->project_name ? $row->project_name : '';
            });
            $table->editColumn('buidling_age', function ($row) {
                return $row->buidling_age ? $row->buidling_age : '';
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('price_items', function ($row) {
                return $row->price_items ? '<a href="' . $row->price_items->getUrl() . '" target="_blank">' . trans('global.downloadFile') . '</a>' : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'building_photos', 'research_vist_result', 'engineering_vist_result', 'organization', 'price_items']);

            return $table->make(true);
        }

        return view('admin.buildings.index');
    }

    public function show(Building $building)
    {
        abort_if(Gate::denies('building_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        // get only the approved supporters
        $supporters = Supporter::with(['user' => function ($query) {
            $query->where('approved', 1)->whereNotNull('name');
        }])
            ->whereHas('user', function ($query) {
                $query->where('approved', 1)->whereNotNull('name');
            })
            ->get()
            ->pluck('user.name', 'id')
            ->prepend(trans('global.pleaseSelect'), '');
        // get only the approved contractors 
        $contractors = Contractor::with(['user' => function ($query) {
            $query->where('approved', 1)->whereNotNull('name');
        }])
            ->whereHas('user', function ($query) {
                $query->where('approved', 1)->whereNotNull('name');
            })
            ->get()
            ->pluck('user.name', 'id')
            ->prepend(trans('global.pleaseSelect'), '');

        $buildingcontractors = $building->buildingBuildingContractors;

        // Check if at least one contractor has a contract
        $hasContract = $buildingcontractors->contains(function ($contractor) {
            return $contractor->has_contract;
        });

        $building->load('organization', 'buildingBuildingContractors.contractor.user', 'buildingBuildingContractors.building', 'buildingBeneficiaries.illness_type', 'buildingBuildingSupporters.supporter.user');
        return view('admin.buildings.show', compact('building', 'contractors', 'supporters', 'hasContract'));
    }

    public function showPriceForm(Request $request)
    {
        $buildingId = $request->id;
        return view('admin.buildings.buildingPrice', compact('buildingId'));
    }
    public function storePrices(Request $request)
    {

        $building = Building::findOrFail($request->id);
        $building->update($request->all());
        if ($request->input('price_items', false)) {
            if (!$building->price_items || $request->input('price_items') !== $building->price_items->file_name) {
                if ($building->price_items) {
                    $building->price_items->delete();
                }
                $building->addMedia(storage_path('tmp/uploads/' . basename($request->input('price_items'))))->toMediaCollection('price_items');
            }
        } elseif ($building->price_items) {
            $building->price_items->delete();
        }
        Alert::success('تم اضافة بنود الاسعار للمبني رقم    '    . $request->id .      '   بنجاح     ');
        return redirect()->route('admin.buildings.index');
    }
    public function visits(Request $request)
    {
        $buildingId = $request->id;
        // $users = User::pluck('name','id')->prepend(trans(''),'');
        $users = User::where('user_type', 'staff')->pluck('name', 'id')->prepend(trans(''), '');
        return view('admin.buildings.visits', compact('users', 'buildingId'));
    }
    public function storeVisits(Request $request)
    {
        // building
        $building = Building::with('researchers', 'engineers')->findOrfail($request->building_id)->first();
        $building->researchers()->attach($request->researchers);
        $building->engineers()->attach($request->engineers);
        $building->save();
        Alert::success('تم تحديد الاشخاص للزياره البحثيه والزياره الهندسيه للمبني ');
        return redirect()->route('admin.buildings.index');
    }

    public function edit(Building $building)
    {
        abort_if(Gate::denies('Review_and_Approval'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $organizations = Organization::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $building->load('organization');
        return view('admin.buildings.edit', compact('building', 'organizations'));
    }

    public function update(UpdateBuildingRequest $request, Building $building)
    {
        if ($request->stages == 'send_to_contractor') {
            if (BuildingContractor::where('building_id', $building->id)->where('stages', 'request_quotation')->count() < 3) {
                Alert::warning('يجب عليك اضافة 3 مقاولين وطلب عرض اسعارهم على الاقل ', '');
                return redirect()->route('admin.buildings.show', $building->id);
            }
        }


        if ($request->stages == 'supporting') {
            foreach ($building->buildingBuildingSupporters as $raw) {
                $raw->supporter_status = 'on_review';
                $raw->save();
            }
        }

        $building->update($request->all());

        if ($request->has('building_photos')) {
            if (count($building->building_photos) > 0) {
                foreach ($building->building_photos as $media) {
                    if (!in_array($media->file_name, $request->input('building_photos', []))) {
                        $media->delete();
                    }
                }
            }
            $media = $building->building_photos->pluck('file_name')->toArray();
            foreach ($request->input('building_photos', []) as $file) {
                if (count($media) === 0 || !in_array($file, $media)) {
                    $building->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('building_photos');
                }
            }
        }

        if ($request->has('research_vist_result')) {
            if ($building->stages == 'research_visit' && $building->research_vist_result == null) {
                if ($request->input('research_vist_result', false)) {
                    if (!$building->research_vist_result || $request->input('research_vist_result') !== $building->research_vist_result->file_name) {
                        if ($building->research_vist_result) {
                            $building->research_vist_result->delete();
                        }
                        $building->addMedia(storage_path('tmp/uploads/' . basename($request->input('research_vist_result'))))->toMediaCollection('research_vist_result');
                    }
                } elseif ($building->research_vist_result) {
                    $building->research_vist_result->delete();
                }
            }
        }


        if ($request->has('engineering_vist_result')) {
            if ($building->stages == 'engineering_visit' && $building->engineering_vist_result == null) {
                if ($request->input('engineering_vist_result', false)) {
                    if (!$building->engineering_vist_result || $request->input('engineering_vist_result') !== $building->engineering_vist_result->file_name) {
                        if ($building->engineering_vist_result) {
                            $building->engineering_vist_result->delete();
                        }
                        $building->addMedia(storage_path('tmp/uploads/' . basename($request->input('engineering_vist_result'))))->toMediaCollection('engineering_vist_result');
                    }
                } elseif ($building->engineering_vist_result) {
                    $building->engineering_vist_result->delete();
                }
            }
        }

        Alert::success(trans('flash.update.title'), trans('flash.update.body'));
        return redirect()->route('admin.buildings.show', $building->id);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('building_create') && Gate::denies('Review_and_Approval'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Building();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
