<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Routing\Middleware;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Support\Facades\Auth;


class TimeZone {

    protected $user;

    public function __construct(Guard $auth)
    {
        $this->user = $auth->user();
    }


    public function handle($request, Closure $next)
    {
        $this->setTimeZone($request);
        return $this->addTimeZoneCookie($request, $next($request));
    }


    public function setTimeZone($request)
    {
        if($this->user)
        {
            return date_default_timezone_set($this->user->timezone);
        }

        $timeZone = $request->cookie('time_zone');

        if($timeZone)
        {
            return date_default_timezone_set($timeZone);
        }
        return;
    }


    public function addTimeZoneCookie($request, $response)
    {
        if(! $request->cookie('time_zone') && ! is_null($this->user))
        {
            return $response->withCookie(cookie('time_zone', $this->user->timezone, 120));
        }
        return $response;
    }
}