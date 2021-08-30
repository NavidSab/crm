<?php

namespace Modules\Acl\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HasPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,...$permissions_array)
    {

        foreach($permissions_array as $permission){
            if (!$request->user()->hasPermissions($permission)){
                // return redirect()->back();   
                return abort('403');                     
            }
        }    
        return $next($request);
    }
}
