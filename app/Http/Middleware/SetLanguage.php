<?php

namespace App\Http\Middleware;

use Closure;

class SetLanguage
{

    public function handle($request, Closure $next)
    {
        if(session()->has('locale')) {
            app()->setLocale(session('locale'));
            app()->setLocale(config('app.locale'));
        }
        return $next($request);
    }
}
