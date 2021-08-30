<?php

namespace Modules\Acl\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HasRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,...$rols_array)
    {



        foreach($rols_array as $role){
            if ($request->user()->hasrole($role)){
                return $next($request);
            }
        }    
        return abort('403');                     

    }
}
