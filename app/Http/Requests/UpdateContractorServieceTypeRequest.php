<?php

namespace App\Http\Requests;

use App\Models\ContractorServieceType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateContractorServieceTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('contractor_serviece_type_edit');
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
