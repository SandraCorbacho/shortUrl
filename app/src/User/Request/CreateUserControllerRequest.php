<?php

declare(strict_types=1);

namespace App\src\User\Request;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserControllerRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string'
            ],
            'email' => [
                'required',
                'string'
            ],
            'password' => [
                'required',
                'string'
            ]
        ];
    }
}
