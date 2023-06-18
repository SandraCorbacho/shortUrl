<?php

declare(strict_types=1);

namespace App\src\ShortUrl\Domain\Service;

use App\Hexagonal\Domain\Resources\ShortUrl\GetShortUrlRequestResource;

class GetTinyUrlService
{
    const TINYURL = 'https://tinyurl.com/api-create.php?url=';
    public function execute(GetShortUrlRequestResource $requestResource): String
    {
        $api_url = self::TINYURL . $requestResource->url();

        $curl = curl_init();
        $timeout = 10;

        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, $timeout);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_URL, $api_url);

        $new_url = curl_exec($curl);
        curl_close($curl);

        return $new_url ?: throw new \Exception('La url introducida no es correcta');
    }
}
