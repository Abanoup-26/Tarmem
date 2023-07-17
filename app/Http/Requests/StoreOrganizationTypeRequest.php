<?php

namespace App\Http\Requests;

use App\Models\OrganizationType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreOrganizationTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('organization_type_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
        ];
    }
}
