<?php

namespace App\Http\Requests;

use App\Models\BeneficiaryNeed;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreBeneficiaryNeedRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('beneficiary_need_create');
    }

    public function rules()
    {
        return [
            'unit_id' => [
                'required',
                'integer',
            ],
            'description' => [
                'string',
                'nullable',
            ],
            'photos_before' => [
                'array',
            ],
            'photos_after' => [
                'array',
            ],
            'beneficiary_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
