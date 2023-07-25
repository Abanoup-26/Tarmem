<?php

namespace App\Http\Requests;

use App\Models\Building;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateBuildingRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('Review_and_Approval');
    }

    public function rules()
    {
        return [
            'stages' => 'required|in:' . implode(',', array_keys(Building::STAGES_SELECT)),
            'management_statuses' => 'required|in:' . implode(',', array_keys(Building::MANAGEMENT_STATUSES_SELECT)),
            'rejected_reson' => [
                'string',
                'nullable',
            ],
            'research_vist_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'engineering_vist_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
