<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Models\Building;
use Gate;
use Alert;
use App\Http\Requests\UpdateBuildingRequest;
use App\Models\BuildingContractor;
use App\Models\Contractor;
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
            $query = Building::query()->where('management_statuses', '!=', 'pending')->select(sprintf('%s.*', (new Building)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'building_show';
                $editGate      = 'Review_and_Approval';
                $deleteGate    = 'building_delete';
                $crudRoutePart = 'buildings';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
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

            $table->rawColumns(['actions', 'placeholder', 'building_photos', 'research_vist_result', 'engineering_vist_result']);

            return $table->make(true);
        }

        return view('admin.buildings.index');
    }

    public function show(Building $building )
    {
        abort_if(Gate::denies('building_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $contractors = Contractor::with('user')->get()->pluck('user.name', 'id')->prepend(trans('global.pleaseSelect'), ''); 

        $building->load('buildingBuildingContractors.contractor.user' , 'buildingBuildingContractors.building', 'buildingBeneficiaries', 'buildingBuildingSupporters');
        return view('admin.buildings.show', compact('building' ,'contractors'));
    }

    public function edit(Building $building)
    {
        abort_if(Gate::denies('Review_and_Approval'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.buildings.edit', compact('building'));
    }
    
    public function update(UpdateBuildingRequest $request, Building $building)
    {
        if($request->stages == 'send_to_contractor'){
            if(BuildingContractor::where('building_id',$building->id)->where('stages','request_quotation')->count() < 3){
                Alert::warning('You Must add at least 3 contractor with stage request quotation','');
                return redirect()->route('admin.buildings.show', $building->id);
            }
        } 

        $building->update($request->all());

        if (count($building->building_photos) > 0) {
            foreach ($building->building_photos as $media) {
                if (! in_array($media->file_name, $request->input('building_photos', []))) {
                    $media->delete();
                }
            }
        }
        $media = $building->building_photos->pluck('file_name')->toArray();
        foreach ($request->input('building_photos', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $building->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('building_photos');
            }
        }

        if ($building->stages == 'research_visit' && $building->research_vist_result == null  ){
            if ($request->input('research_vist_result', false)) {
                if (! $building->research_vist_result || $request->input('research_vist_result') !== $building->research_vist_result->file_name) {
                    if ($building->research_vist_result) {
                        $building->research_vist_result->delete();
                    }
                    $building->addMedia(storage_path('tmp/uploads/' . basename($request->input('research_vist_result'))))->toMediaCollection('research_vist_result');
                }
            } elseif ($building->research_vist_result) {
                $building->research_vist_result->delete();
            }
        }


        if ($building->stages == 'engineering_visit' && $building->engineering_vist_result == null){ 
            if ($request->input('engineering_vist_result', false)) {
                if (! $building->engineering_vist_result || $request->input('engineering_vist_result') !== $building->engineering_vist_result->file_name) {
                    if ($building->engineering_vist_result) {
                        $building->engineering_vist_result->delete();
                    }
                    $building->addMedia(storage_path('tmp/uploads/' . basename($request->input('engineering_vist_result'))))->toMediaCollection('engineering_vist_result');
                }
            } elseif ($building->engineering_vist_result) {
                $building->engineering_vist_result->delete();
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
