<?php

namespace App\Http\Requests;

use App\Models\BeneficiaryNeed;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyBeneficiaryNeedRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('beneficiary_need_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:beneficiary_needs,id',
        ];
    }
}
