<?php

namespace App\Http\Requests;

use App\Models\Organization;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreOrganizationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('organization_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'email' => [
                'required',
                'unique:users,email,' . request()->user_id,
            ],
            'password' => [
                'required',
            ],
            'organization_name' => [
                'string',
                'required',
            ],
            'website' => [
                'string',
                'required',
            ],
            'mobile_number' => [
                'string',
                'nullable',
            ],
            'phone_number' => [
                'string',
                'nullable',
            ],
            'organization_type_id' => [
                'required',
                'integer',
            ],
            'commercial_record' => [
                'required',
            ],
            'partnership_agreement' => [
                'required',
            ],
            'logo' => [
                'required',
            ],
        ];
    }
}
