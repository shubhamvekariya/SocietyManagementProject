<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            if(Route::is('society.*') || Route::is('society.*') ){
                return route('login.society');
            }
            if(Route::is('member.*') || Route::is('member.*') ){
                return route('login.member');
            }
            if(Route::is('staff.*') || Route::is('staff.*') ){
                return route('login.staff');
            }
            return route('login');
        }
    }
}
