<?php

declare(strict_types=1);

namespace App\src\ShortUrl\Domain\Converter;

use App\Hexagonal\Domain\Resources\ShortUrl\GetShortUrlRequestResource;
use Illuminate\Http\JsonResponse;

class GetShortUrlConverter
{
    public function converter(String $shortUrl): JsonResponse
    {
        return new JsonResponse(["url" => $shortUrl]);
    }
}
