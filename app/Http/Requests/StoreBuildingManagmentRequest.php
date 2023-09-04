<?php

namespace App\Http\Requests;

use App\Models\BuildingManagment;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreBuildingManagmentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('building_managment_create');
    }

    public function rules()
    {
        return [
            'buildings.*' => [
                'integer',
            ],
            'buildings' => [
                'required',
                'array',
            ],
            'users.*' => [
                'integer',
            ],
            'users' => [
                'required',
                'array',
            ],
        ];
    }
}