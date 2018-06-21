<?php

namespace App\Http\Middleware;

use Closure;

class AdminAuth
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
        if ($request->user()->can('manager')) {
            return $next($request);
        }
        toastr()->error(__("You do not have permission to access this page!"));
        return redirect()->route('home');
    }
}
