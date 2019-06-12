<?php

namespace App\Http\Middleware;

use Closure;

class CheckStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->computer->status == 'online') {
            return response('Access denied', 423)->header('Content-Type', 'text/plain');
        }

        return $next($request);
    }
}
