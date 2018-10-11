<?php

namespace App\Http\Middleware;

use Closure;

class TenantMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->is('api/*')) {
            $user = \Auth::guard('api')->user();
            \Tenant::setTenant($user);
        }
        return $next($request);

//        // Antes de chegar nos controllers
//        $response = $next($request);
//        // Algo depois dos controllers
//        return $response;

    }
}
