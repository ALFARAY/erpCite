<?php

namespace erpCite\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class CheckLogistica
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
      if(Auth::check())
      {
        if(auth()->user()->role==3)
        {
          return $next($request);
        }
        elseif(auth()->user()->role==1)
        {
          return redirect('Admin');
        }
        elseif (auth()->user()->role==2)
        {
          return $next($request);
        }

      }
      else {
        return redirect('login');
      }
    }
}
