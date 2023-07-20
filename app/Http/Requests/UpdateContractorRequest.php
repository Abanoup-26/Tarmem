<?php

namespace App\Http\Requests;

use App\Models\Contractor;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateContractorRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('contractor_edit');
    }

    public function rules()
    {
        return [
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
            'tax' => [
                'required',
            ],
            'income' => [
                'required',
            ],
            'contractor_type_id' => [
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
            'user_id' => [
                'required',
                'integer',
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
