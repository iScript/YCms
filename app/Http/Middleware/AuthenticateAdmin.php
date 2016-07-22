<?php

namespace App\Http\Middleware;

use Closure;
use Route,URL,Auth;

class AuthenticateAdmin
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
        // 检查是否登录
        if(!Auth::check()){
            return redirect('/login');
        }

        // 是否超级管理员
        if(Auth::user()->is_super){
            return $next($request);
        }

        //$action = Route::currentRouteAction();
        $name   = Route::currentRouteName();    // 获取当前路由  admin.user.edit

//        // 如果权限验证不通过
//        if(!Auth::user()->allow($name) ){
//            if($request->ajax() ) {
//                return response()->json(["code"=>403,"message"=>"没有权限"]);
//
//            }else{
//                return response()->view('admin.errors.403', compact('previousUrl'));
//
//            }
//
//        }

        return $next($request);
    }
}
