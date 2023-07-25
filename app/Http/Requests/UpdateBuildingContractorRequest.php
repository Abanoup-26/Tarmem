<?php

namespace App\Http\Requests;

use App\Models\BuildingContractor;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateBuildingContractorRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('building_contractor_edit');
    }

    public function rules()
    {
        return [ 
            'stages' => [
                'nullable',
                'in:'. implode(',', array_keys(BuildingContractor::STAGES_SELECT)),
            ], 
        ];
    }
}
