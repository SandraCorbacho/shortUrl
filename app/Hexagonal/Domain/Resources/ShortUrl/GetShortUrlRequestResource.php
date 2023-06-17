<?php

declare(strict_types=1);

namespace App\Hexagonal\Domain\Resources\ShortUrl;

class GetShortUrlRequestResource
{

    /*
     *  Short url
     *
     * @var string
     *
     * @OA\Property(
     * example= "www.test.com"
     */

    private string $url;


    public function __construct(
        string $url,

    ) {
        $this->url = $url;
    }

    public function url(): string
    {
        return $this->url;
    }

}
