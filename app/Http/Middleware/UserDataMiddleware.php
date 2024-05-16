<?php

namespace App\Http\Middleware;

use App\Models\Entorno;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserDataMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        $environments = Entorno::all();

        view()->share('user', $user);
        view()->share('environments', $environments);

        return $next($request);
    }
}
