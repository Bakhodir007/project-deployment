<?php

namespace Modules\Auth\Requests;

use Illuminate\Http\Request;

class LoginRequest extends Request
{
    public function rules(): array
    {
        return [
            'name' => ['required','string'],
            'password' => ['required','string'],
            'remember' => ['nullable','string'],
        ];
    }
}
