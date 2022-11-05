<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Illuminate\Http\Request;

class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next,$guard=null)
    {
        if(!auth()->guard($guard)->check()){
            return redirect()->route('admin.login');
        }

            // $path=$request->path();
            // if(($path =="dashboard/login") && Session::get('admin')){
            //      return redirect()->route('admin.home');
            //

        return $next($request);
    }
}
