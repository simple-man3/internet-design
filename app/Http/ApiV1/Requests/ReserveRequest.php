<?php

namespace App\Http\ApiV1\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReserveRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'places' => ['required', 'array'],
            'places.*' => ['required', 'integer', 'min:1'],
        ];
    }
}
