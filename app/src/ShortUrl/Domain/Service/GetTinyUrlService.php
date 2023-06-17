<?php

declare(strict_types=1);

namespace App\src\ShortUrl\Domain\Service;

use App\Hexagonal\Domain\Resources\ShortUrl\GetShortUrlRequestResource;
use Illuminate\Http\JsonResponse;
use Throwable;

class GetTinyUrlService
{
    public function __construct(
    ) {
    }

    public function execute(GetShortUrlRequestResource $requestResource): String
    {
        $api_url = 'https://tinyurl.com/api-create.php?url=' . $requestResource->url();

        $curl = curl_init();
        $timeout = 10;
    try{
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, $timeout);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_URL, $api_url);

        $newUrl = curl_exec($curl);
        curl_close($curl);

        return $newUrl;

    }catch(Throwable $e) {
        throw $e;
    }



    }
}
