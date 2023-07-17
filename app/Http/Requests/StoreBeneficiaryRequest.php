<?php

namespace App\Http\Requests;

use App\Models\Beneficiary;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreBeneficiaryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('beneficiary_create');
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
            'identity_photo' => [
                'array',
                'required',
            ],
            'identity_photo.*' => [
                'required',
            ],
            'qualifications' => [
                'string',
                'required',
            ],
            'job_status' => [
                'required',
            ],
            'job_title' => [
                'string',
                'nullable',
            ],
            'marital_status' => [
                'required',
            ],
            'marital_state_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'address' => [
                'string',
                'nullable',
            ],
            'illness_status' => [
                'required',
            ],
            'building_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
