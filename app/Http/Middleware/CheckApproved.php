<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class CheckApproved
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Route::is('member.approval') && auth()->user()->approved_at)
        {
            return redirect()->route('member.home');
        }
        if (!Route::is('member.approval') && !auth()->user()->approved_at) {
            return redirect()->route('member.approval');
        }
        return $next($request);
    }
}
