<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AuthController extends Controller
{


    /**
     * @return \Illuminate\View\View
     */
    public function getLogin()
    {
        return view('admin.auth.login');
    }

    public function postLogin(Request $request){

        $r = $request->all();

        if( \Auth::guard("admin")->attempt(['username' => $r["username"], 'password' => ($r["password"]) ])  ){


            // 认证通过...
            \Auth::guard("admin")->user()->update([
                "last_login_time"   => date("Y-m-d H:i:s",time()),
                "last_login_ip"     => $request->getClientIp()
            ]);



            //
            if(!empty($r["returnUrl"])){
                return redirect($r["returnUrl"]);
            }

            return redirect("/admin");
        }

        //echo $r["returnUrl"];exit;


        return redirect('/admin/login');
    }

    public function getLogout(){
        \Auth::guard("admin")->logout();
        return redirect('/admin/login');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function getRegister()
    {
        return view('auth.register');
    }




    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            //'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
//        return User::create([
//            'nickname' => substr_replace($data['mobile'],'****',3,4),
//            'password' => password_crypt($data['password']),
//            "register_time" => date("Y-m-d H:i:s",time()),
//            "last_login_time"=> date("Y-m-d H:i:s",time()),
//            "register_type"=>2
//        ]);
    }
}
