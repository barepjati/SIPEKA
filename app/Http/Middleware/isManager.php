<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class isManager
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next,  ...$role)
    {
        // if (!Auth::check())
        //     return redirect()->guest(route('login'));

        if (in_array($request->user()->role->nama, $role)) {
            return $next($request);
        } elseif (in_array($request->user()->role->nama, $role)) {
            return redirect()->to('/');
        } else {
            abort(404);
        }
    }
}
