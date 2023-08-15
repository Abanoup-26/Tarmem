<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class Staff
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::user()->user_type == 'contractor')
        {
            return redirect()->route('contractor.dashboard');
        }
        elseif(Auth::user()->user_type == 'organization')
        {
            return redirect()->route('organization.dashboard');
        }
        elseif(Auth::user()->user_type == 'suppoter')
        {
            return redirect()->route('supporter.dashboard');
        }
        elseif(Auth::user()->user_type == 'staff')
        {
            return $next($request);
        }
        else
        {
            return redirect('/login');

        }
    
    }
}
