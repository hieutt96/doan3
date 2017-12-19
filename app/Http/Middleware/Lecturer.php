<?php

namespace App\Http\Middleware;

use Closure;

class Lecturer
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
        if(Auth::check() && Auth::user()->level==5){
            return $next($request);
        }else{
            return redirect('/')->with('han-che-quyen-lecturer',"Bạn Không Có Quyền Truy Cập");
        }
        
    }
}
