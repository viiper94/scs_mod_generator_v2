<?php

namespace App\Http\Middleware;

use App\Mods;
use Closure;
use Gate;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){
        if(Gate::denies('admin')) abort(403);

        Mods::cleanUp();

        return $next($request);
    }
}
