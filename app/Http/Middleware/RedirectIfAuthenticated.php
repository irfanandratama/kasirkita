<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {

        // MultiAuthGuards

        switch ($guard) {
            case 'cashier':
                if (Auth::guard($guard)->check()) {
                    return redirect(route('cashier.dashboard'));
                }
            break;
            case 'management':
                if (Auth::guard($guard)->check()) {
                    return redirect(route('management.dashboard'));
                }
            break;
            case 'manejeman':
                if (Auth::guard($guard)->check()) {
                    return redirect(route('manejeman.dashboard'));
                }
            break;
            case 'admin':
                if (Auth::guard($guard)->check()) {
                    return redirect(route('admin.dashboard'));
                }
            break;
            case 'web':
                if (Auth::guard($guard)->check()) {
                    return redirect('/home');
                }
            break;
            default:
                if (Auth::guard($guard)->check()) {
                    return redirect('/home');
                }
            break;
        }
        return $next($request);
    }
}
