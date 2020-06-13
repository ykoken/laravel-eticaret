<?php

namespace App\Http\Middleware;

use Closure;

class isAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth()->user()->role == 'ROLE_ADMIN') {
            return $next($request);
        }
        return redirect('/admin/login')->with('Yetkilere Sahip Değilsiniz.');
    }
}
