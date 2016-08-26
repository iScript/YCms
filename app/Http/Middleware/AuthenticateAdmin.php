<?php

namespace App\Http\Middleware;

use Closure;
use Route,URL,Auth;

class AuthenticateAdmin
{




    /**
     * 后台中间件,用于权限控制
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // 检查是否登录
        if(!Auth::check()){

            $returnUrl = $request->getRequestUri();
            //echo $returnUrl;exit;
            return redirect('/auth/login?returnUrl='.$returnUrl);
        }

        $name   = "admin.".Route::currentRouteName();    // 获取当前路由  admin.user.edit

        $role = Auth::user()->roles()->first();


        // 是否超级管理员
        if(Auth::user()->is_super){
            return $next($request);
        }

        if(!Auth::user()->roles()->first()){
            redirect('/');
        }

        // 如果权限验证不通过
        if(!Auth::user()->allow($name) ){
            if($request->ajax() ) {
                return response()->json(["code"=>403,"message"=>"没有权限"]);

            }else{
                return response()->view('admin.errors.403');

            }

        }

        return $next($request);
    }
}
