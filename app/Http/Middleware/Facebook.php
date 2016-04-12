<?php

namespace App\Http\Middleware;

use URL;
use Auth;
use Closure;

class Facebook
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
        if (Auth::check() AND Auth::user()->provider === 'facebook') {
            return $next($request);
        }

        if ($request->ajax() || $request->wantsJson()) {
            return response('Unauthorized.', 401);
        } else {
            return redirect(URL::to('facebook/auth'));
        }
    }
}
