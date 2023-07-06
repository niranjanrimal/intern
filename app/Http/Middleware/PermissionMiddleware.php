<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class PermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $permission): Response
    {
        $permissions = explode('|', $permission);
        $access = [];
        foreach($permissions as $permission){

            if(auth()->user()->checkPermission($permission)){
                $access[] = 1;
            }else{
                $access[] = 0;
            }
        }
        if(in_array(0, $access)){
            abort(403);
        }
        return $next($request);
    }
}
