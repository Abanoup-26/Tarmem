<?php

namespace App\Http\Requests;

use App\Models\Illnesstype;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreIllnesstypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('illnesstype_create');
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
