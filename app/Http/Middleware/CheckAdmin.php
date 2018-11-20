<?php

namespace App\Http\Middleware;

use DB;
use Closure;

class CheckAdmin
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
        $admin_status = DB::table('users')
            ->where('id', auth()->id())
            ->select('is_admin' )
            ->get();

        dd($admin_status);
        if($admin_status->is_admin !== 1){
            // not admin;
            abort(404);
        }

        return $next($request);
    }
}
