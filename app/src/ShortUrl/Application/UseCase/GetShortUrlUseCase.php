<?php

declare(strict_types=1);

namespace app\src\ShortUrl\Application\UseCase;


use App\Hexagonal\Domain\Resources\ShortUrl\GetShortUrlRequestResource;
use App\src\ShortUrl\Domain\Converter\GetShortUrlConverter;
use App\src\ShortUrl\Domain\Service\GetTinyUrlService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;
use Throwable;

class GetShortUrlUseCase
{
    private GetTinyUrlService $getTinyUrlService;
    private GetShortUrlConverter $getShortUrlConverter;

    public function __construct(
        GetTinyUrlService $getTinyUrlService,
        GetShortUrlConverter $getShortUrlConverter
    ) {
        $this->getTinyUrlService = $getTinyUrlService;
        $this->getShortUrlConverter = $getShortUrlConverter;
    }

    /**
     * @throws \Exception
     */
    public function execute(
        GetShortUrlRequestResource $requestResource,
    ): JsonResponse
    {
        try {
            $newUrl = $this->getTinyUrlService->execute($requestResource);

            return $this->getShortUrlConverter->converter($newUrl);
        }
        catch (Throwable $e)
        {
            throw new \Exception($e->getMessage());
        }
    }
}
