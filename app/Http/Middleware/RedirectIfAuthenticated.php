<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // public function handle(Request $request, Closure $next, string ...$guards): Response
    // {
    //     $guards = empty($guards) ? [null] : $guards;

    //     foreach ($guards as $guard) {
    //         if (Auth::guard($guard)->check()) {
    //             return redirect(RouteServiceProvider::);
    //         }
    //     }

    //     return $next($request);
    // }
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                // Check user role and redirect accordingly
                $user = Auth::guard($guard)->user();

                switch ($user->role) {
                    case 'admin':
                        return redirect()->route('dashboard.admin');
                        break;
                    case 'master':
                        return redirect()->route('dashboard.master');
                        break;
                    case 'other':
                        return redirect()->route('dashboard.other');
                        break;
                    // Add more cases for other roles if needed

                    default:
                        // Fallback redirect if the role is not handled
                        return redirect()->route('default.dashboard');
                }
            }
        }

        return $next($request);
    }
}
