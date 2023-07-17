<?php

namespace App\Http\Requests;

use App\Models\Illnesstype;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyIllnesstypeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('illnesstype_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:illnesstypes,id',
        ];
    }
}
