<?php

namespace App\Http\Middleware;

use Closure;
use App\Semester;
class CheckDateAdminAssignmentStudent
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
        $a = '';
        foreach($times as $time){
            if(date('Y-m-d')>$time->thoi_gian_sv_ket_thuc_dk && date('Y-m-d')<$time->thoi_gian_sv_bat_dau_thuc_tap){
                $a = 1;
            }
        }
        if($a==1){
            return $next($request);
        }else{
            return redirect('/admin/managestudent')->with('khongdungthoidiem','Không đúng thời điểm phân công ! ');
        }
        
    }
}
