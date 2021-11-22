<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class authadmin
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
        if ($request->session()->has('LoggedUserId') or $request->ajax()) {
            return $next($request);
        } else {
            return redirect('/auth/login')->with('login', '系統提示：請登入會員！');
        }
    }
}