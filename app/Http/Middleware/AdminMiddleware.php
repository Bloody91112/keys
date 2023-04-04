<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response|RedirectResponse
    {
        if (auth()->check()){
            if (auth()->user()->hasAccessToAP()){
                return $next($request);
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->route('login');
        }
    }
}
