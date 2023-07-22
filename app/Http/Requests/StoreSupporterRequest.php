<?php

namespace App\Http\Requests;

use App\Models\Supporter;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSupporterRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('supporter_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'email' => [
                'required',
                'unique:users,email,' . request()->user_id,
            ],
            'password' => [
                'required',
            ],
        ];
    }
}
