<?php

namespace App\Http\Middleware;

use Closure;
use Auth,Route;
class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$guard = null)
    {

        if(!\Auth::guard($guard)->check()){

            $returnUrl = $request->getRequestUri();
            return redirect('/admin/login?returnUrl='.$returnUrl);
        }

        $name   = "admin.".Route::currentRouteName();    // 获取当前路由  admin.user.edit



        // 是否超级管理员
        if(\Auth::guard($guard)->user()->is_super){
            return $next($request);
        }

        // 如果权限验证不通过
        if(! \Gate::forUser(\Auth::guard($guard)->user())->allows($name) ){
            if($request->ajax() ) {
                return response()->json(["code"=>403,"message"=>"没有权限"]);

            }else{
                return response()->view('admin.errors.403');
            }

        }

        return $next($request);
    }
}
