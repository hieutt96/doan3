<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class Admin
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
        if( Auth::check() && Auth::user()->level==4){
            return $next($request);
        }else{
          return redirect('/')->with('han_che_quyen',"Bạn không có quyền admin");
        }
    }
}
