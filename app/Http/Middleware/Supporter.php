<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth ;
use Symfony\Component\HttpFoundation\Response;

class Supporter
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
        if ( Auth::user()->user_type == 'supporter') 
        {
            return $next($request);
        } 
        elseif ( Auth::user()->user_type == 'organization') 
        {
            return redirect()->route('organization.dashboard');
        } 

        elseif ( Auth::user()->user_type == 'contractor') 
        {
            return redirect()->route('contractor.dashboard');
        } 

        elseif ( Auth::user()->user_type == 'staff') 
        {
            return redirect()->route('home');
        } 
        
        else {
            return redirect('/login');
        }
    }
}
