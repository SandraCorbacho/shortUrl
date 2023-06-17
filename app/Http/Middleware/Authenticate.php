<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */

    protected function redirectTo(Request $request): ?string
    {
        $bearerToken =  $request->bearerToken();
        if($this->isValidBearer($bearerToken)){
           return $request->json('url');
        }
        return $request->expectsJson() ? null : route('login');
    }

    function isValidBearer($bearerToken): bool
    {

        $regex = '/\(\)|\{\}|\[\]/';

        while (preg_match($regex, $bearerToken)) {
            $bearerToken = preg_replace($regex, '', $bearerToken);
        }
        return empty($bearerToken);
    }
}
