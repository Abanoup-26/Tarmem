<?php

namespace App\Http\Requests;

use App\Models\Contractor;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreContractorRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('contractor_create');
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
                'unique:users',
            ],
            'password' => [
                'required',
            ],
            'position' => [
                'string',
                'required',
            ],
            'website' => [
                'string',
                'required',
            ],
            'commercial_record' => [
                'required',
            ],
            'safety_certificate' => [
                'required',
            ],
            'contractor_type_id' => [
                'required',
            ],
            'tax' => [
                'required',
            ],
            'income' => [
                'required',
            ],
            'social_insurance' => [
                'required',
            ],
            'human_resources' => [
                'required',
            ],
            'bank_certificate' => [
                'required',
            ],
            'commitment_letter' => [
                'required',
            ],
            'services.*' => [
                'integer',
            ],
            'services' => [
                'required',
                'array',
            ],
        ];
    }
}
