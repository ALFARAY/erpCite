<?php

namespace erpCite\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class CheckRoles
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
        if(auth()->user()->role==2)
        {
          return $next($request);
        }
        if(auth()->user()->role==1)
        {
          return redirect('Admin');
        }
        else {
          return redirect('bienvenida');
        }
      }
      else {
        return redirect('login');
      }
    }
}
