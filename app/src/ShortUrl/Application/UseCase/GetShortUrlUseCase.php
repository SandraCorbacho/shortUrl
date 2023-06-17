<?php

declare(strict_types=1);

namespace app\src\ShortUrl\Application\UseCase;


use App\Hexagonal\Domain\Resources\ShortUrl\GetShortUrlRequestResource;
use App\src\ShortUrl\Domain\Service\GetTinyUrlService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;
use Throwable;

class GetShortUrlUseCase
{
    private GetTinyUrlService $getTinyUrlService;

    public function __construct(
        GetTinyUrlService $getTinyUrlService
    ) {
        $this->getTinyUrlService = $getTinyUrlService;
    }

    public function execute(
        GetShortUrlRequestResource $requestResource,
    ): String
    {
        try {

           $newUrl = $this->getTinyUrlService->execute($requestResource);


            return $newUrl;
        }
        catch (Throwable $e)
        {
            throw new \Exception($e->getMessage());
        }
    }
}
