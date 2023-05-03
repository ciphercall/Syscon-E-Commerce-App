<?php
  
namespace App\Http\Middleware;
  
use Closure;
   
class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(auth()->user()->role_id == 1){
            return redirect()->route('dashboard');
            // return $next($request);
        }

        if(auth()->user()->role_id == 2){
            return redirect()->route('seller-dashboard');
            // return $next($request);
        }

        if(auth()->user()->role_id == 0){
            return redirect()->route('customer');
            // return $next($request);
        }
   
        return redirect('home')->with('error',"You don't have admin access.");
    }
}