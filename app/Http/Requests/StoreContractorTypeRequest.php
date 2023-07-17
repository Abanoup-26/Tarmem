<?php

namespace App\Http\Requests;

use App\Models\ContractorType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreContractorTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('contractor_type_create');
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
