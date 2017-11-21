<?php

namespace App\Http\Middleware;

use Closure;
use App\Semester;
class CheckDateRegisterSV
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
        $times = Semester::all();
        $a='';
        foreach ($times as $time) {
            if(date('Y-m-d')>$time->thoi_gian_sv_bat_dau_dk && date('Y-m-d')<$time->thoi_gian_sv_ket_thuc_dk){
                $a = 1;
            }
        }
        if($a==1){
            return $next($request);
        }else{
            return redirect('/')->with('hanchedangkysv',"Không phải là thời điểm đăng ký");
        }
    }
}
