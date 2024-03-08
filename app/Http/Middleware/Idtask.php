<?php

namespace App\Http\Middleware;

use Closure;

class Idtask
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
        if(session()->has('id_task')){
            session()->forget('id_task');
        }
        return $next($request);
    }
}
