<?php

namespace Pipen\ApiNomenclature\Middleware;

use Closure;
use Illuminate\Http\Request;
use Pipen\ApiNomenclature\Traits\DatabaseConfigs;

class UseTestDatabaseMiddleware
{
    use DatabaseConfigs;
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next): mixed
    {
       $this->setDatabaseConnection();

        return $next($request);
    }
}