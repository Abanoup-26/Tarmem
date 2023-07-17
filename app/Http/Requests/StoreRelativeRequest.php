<?php

namespace App\Http\Requests;

use App\Models\Relative;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreRelativeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('relative_create');
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
