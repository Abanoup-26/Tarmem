<?php

namespace App\Http\Requests;

use App\Models\BeneficiaryFamily;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateBeneficiaryFamilyRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('beneficiary_family_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'birth_date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'identity_number' => [
                'string',
                'required',
            ],
            'identity_photos' => [
                'array',
            ],
            'qualifications' => [
                'string',
                'nullable',
            ],
            'marital_status' => [
                'required',
            ],
            'illness_status' => [
                'required',
            ],
            'illness_type_id' => [
                'required',
                'integer',
            ],
            'job_status' => [
                'required',
            ],
            'beneficiary_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
