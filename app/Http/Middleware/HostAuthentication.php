<?php

namespace App\Http\Middleware;

use Closure;

class HostAuthentication
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
        if (!$request->user()->isHostUser())
        {
            return redirect(route('become-host'));
        }
        return $next($request);

    }
}
