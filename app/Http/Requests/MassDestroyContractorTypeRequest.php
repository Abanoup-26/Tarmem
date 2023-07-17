<?php

namespace App\Http\Requests;

use App\Models\ContractorType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyContractorTypeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('contractor_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:contractor_types,id',
        ];
    }
}
