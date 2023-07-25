<?php

namespace App\Http\Requests;

use App\Models\BuildingContractor;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreBuildingContractorRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('building_contractor_create');
    }

    public function rules()
    {
        return [
            'visit_date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'stages' => [
                'required',
            ],
            'contract' => [
                'nullable',
            ],
            'contractor_id' => [
                'required',
                'integer',
            ],
            'building_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
