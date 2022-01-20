<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class AdminAuthentication
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
        if ($request->user()->isAdminUser() || $request->user()->isStaffUser())
        {
            return $next($request);
        }

       return abort(404);
    }
}
