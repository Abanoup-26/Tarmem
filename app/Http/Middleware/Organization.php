<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Organization
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
        if (Auth::user()->user_type == 'organization') 
        {
            return $next($request);
            
        } 
        elseif (Auth::user()->user_type == 'contractor') 
        {
            return redirect()->route('contractor.dashboard');
        } 
        elseif (Auth::user()->user_type == 'supporter') 
        {
            return redirect()->route('supporter.dashboard');
        } 
        elseif (Auth::user()->user_type == 'staff') 
        {
            return redirect()->route('home');
        } 
        else {
            return redirect('/login');
        }
    }
}
