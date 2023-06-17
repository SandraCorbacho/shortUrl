<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use http\Client\Request;

/**
 * Class APIVersion
 * @package App\Http\Middleware
 */
class APIVersion
{
    /**
     * Handle an incoming request.
     *
     * @param  Request $request
     * @param  Closure $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next, $guard)
    {
        config(['app.api.version' => $guard]);
        return $next($request);
    }
}
