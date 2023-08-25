<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LowAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->user() && ($request->user()->type === "superAdmin" || $request->user()->type === "admin")) {
            return $next($request);
        }
        return redirect("/");
    }
}
