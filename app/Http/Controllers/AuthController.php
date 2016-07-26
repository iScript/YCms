<?php

namespace App\Http\Controllers;

use App\Models\User;
use Validator;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware('guest', ['except' => 'getLogout']);
    }

     /**
     * @return \Illuminate\View\View
     */
    public function getLogin()
    {
        return view('auth.login');
    }

    public function postLogin(LoginRequest $request){

        //print_r($request->all());
        $r = $request->all();


        $user = User::whereRaw("username = ? and password = ?  ",[ $r["username"] , password_crypt($r["password"]) ])->first();
        if(isset($user) ){

            \Auth::login($user);
            // 认证通过...
            \Auth::User()->update(["last_login_time"=>date("Y-m-d H:i:s",time())]);

            //
            if(!empty($r["returnUrl"])){
                return redirect($r["returnUrl"]);
            }

            return redirect()->route('home');
        }

        //echo $r["returnUrl"];exit;


        return redirect('/auth/login');
    }

    public function getLogout(){
        \Auth::logout();
        return redirect('/auth/login');
    }

     /**
     * @return \Illuminate\View\View
     */
    public function getRegister()
    {
        return view('auth.register');
    }

    /**
     * @param  RegisterRequest                     $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postRegister(RegisterRequest $request)
    {


        \Auth::login($this->create($request->all()));
        
        //
        return redirect()->route('home');
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
        return User::create([
            'username' => $data['username'],
            //'email' => $data['email'],
            'password' => password_crypt($data['password']),
            "register_time" => date("Y-m-d H:i:s",time()),
            "last_login_time"=> date("Y-m-d H:i:s",time()),
        ]);
    }
}
