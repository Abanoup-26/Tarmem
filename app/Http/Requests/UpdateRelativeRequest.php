<?php

namespace App\Http\Requests;

use App\Models\Relative;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateRelativeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('relative_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'nullable',
            ],
        ];
    }
}
