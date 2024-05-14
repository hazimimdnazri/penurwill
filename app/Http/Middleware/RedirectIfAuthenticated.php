<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use App\Models\UserLogin;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $login = new UserLogin;
                $login->user_id = Auth::user()->id;
                $login->timestamp = date('Y-m-d H:i:s');
                $login->ip_address = $_SERVER['REMOTE_ADDR'];
                $login->save();
                return redirect(RouteServiceProvider::HOME);
            }
        }

        return $next($request);
    }
}
