<?php

namespace App\Http\Controllers\api;

use App\Hexagonal\Domain\Resources\ShortUrl\GetShortUrlRequestResource;
use App\Http\Controllers\Controller;
use App\src\ShortUrl\Application\UseCase\GetShortUrlUseCase;
use App\src\ShortUrl\Request\GetShortUrlControllerRequest;
use Illuminate\Http\JsonResponse;

/** @POST(
 *      path="/short-urls",
 *      operationId="GetShortUrlUseCase",
 *     summary="get url"
 *     tags=["url"},
 *    )
 */

class GetShortUrlController extends Controller
{
    /**
     * @throws \Exception
     */
    public function __invoke(
        GetShortUrlControllerRequest $request,
        GetShortUrlUseCase $useCase
    ): JsonResponse
    {
        try{
            $requestResource = new  GetShortUrlRequestResource(
                $request->json('url')
            );

            return $useCase->execute($requestResource);
        }catch(\Throwable $e) {
            throw new \Exception($e->getMessage());
        }
    }
}
