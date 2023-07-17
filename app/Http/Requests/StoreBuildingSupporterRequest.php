<?php

namespace App\Http\Requests;

use App\Models\BuildingSupporter;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreBuildingSupporterRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('building_supporter_create');
    }

    public function rules()
    {
        return [
            'supporter_id' => [
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
