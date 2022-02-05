<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Routing\Middleware;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Support\Facades\Auth;


class Admin
{

    protected $auth;
    protected $response;

    public function __construct(Guard $auth, ResponseFactory $response)
    {
        $this->auth = $auth;
        $this->response = $response;
    }

    public function handle($request, Closure $next)
    {
        if (auth()->check())
        {
            if (\Auth::user()->hasRole('admin') || \Auth::user()->hasRole('supervisor')) {
                return $next($request);
            }

            return redirect()->route('home');
        }

        return $this->response->redirectTo('/dashboard/login');
    }
}
