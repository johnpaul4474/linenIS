<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use DB;

class LinenAdminMDW
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
        $mydata = DB::select("select * from jhay.linen_user WHERE employeeid = '".Auth::user()->employeeid."'");
        $role = $mydata[0]->role_id;

        if($role == 1)
        {
            return $next($request);
        }
        elseif(role == 2)
        {
            return $next($request);
        }
        else
        {
            return redirect ('/home');
        }
    }
}
