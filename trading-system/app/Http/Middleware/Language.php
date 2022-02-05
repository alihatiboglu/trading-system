<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

class Language
{
    public function handle($request, Closure $next)
    {
        if (Session::has('app_locale')) {
            App::setLocale(Session::get('app_locale'));
        }
        else {
            App::setLocale(Config::get('app.fallback_locale'));
        }
        return $next($request);
    }
}
