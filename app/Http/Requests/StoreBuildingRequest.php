<?php

namespace App\Http\Requests;

use App\Models\Building;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreBuildingRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('building_create');
    }

    public function rules()
    {
        return [
            'building_number' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'floor_count' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'apartments_count' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'birth_data' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'latitude' => [
                'string',
                'nullable',
            ],
            'longtude' => [
                'string',
                'nullable',
            ],
            'building_photos' => [
                'array',
            ],
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
            'organization_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
