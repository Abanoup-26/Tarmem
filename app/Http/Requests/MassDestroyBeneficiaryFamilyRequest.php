<?php

namespace App\Http\Requests;

use App\Models\BeneficiaryFamily;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyBeneficiaryFamilyRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('beneficiary_family_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:beneficiary_families,id',
        ];
    }
}
