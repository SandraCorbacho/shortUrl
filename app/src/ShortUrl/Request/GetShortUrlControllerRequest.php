<?php

declare(strict_types=1);

namespace App\src\ShortUrl\Request;

use Illuminate\Foundation\Http\FormRequest;

class GetShortUrlControllerRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'url' => [
                'required',
                'string'
            ],
        ];
    }
}
