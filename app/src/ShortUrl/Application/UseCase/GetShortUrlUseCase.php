<?php

declare(strict_types=1);

namespace app\src\ShortUrl\Application\UseCase;


use App\Hexagonal\Domain\Resources\ShortUrl\GetShortUrlRequestResource;
use Illuminate\Http\JsonResponse;

class GetShortUrlUseCase
{
    public function __construct(
    ) {
    }

    public function execute(
        GetShortUrlRequestResource $requestResource
    ): JsonResponse
    {
        try {
            return new JsonResponse('tinyUrl');
        }
        catch (\Throwable $e)
        {
            return new JsonResponse($e->getMessage());
        }
    }
}
