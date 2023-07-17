<?php

namespace App\Http\Requests;

use App\Models\OrganizationType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyOrganizationTypeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('organization_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:organization_types,id',
        ];
    }
}
