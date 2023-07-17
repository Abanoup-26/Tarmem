<?php

namespace App\Http\Requests;

use App\Models\ContractorServieceType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyContractorServieceTypeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('contractor_serviece_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:contractor_serviece_types,id',
        ];
    }
}
