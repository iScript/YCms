<?php

namespace App\Http\Controllers;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

use App\Services\SmsService;
use App\Services\CaptchaService;
use App\Models\Verify;



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


    protected $smsService;
    protected $captchaService;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct(SmsService $smsService,CaptchaService $captchaService)
    {
        $this->smsService = $smsService;
        $this->captchaService = $captchaService;

        //$this->middleware('guest', ['except' => 'getLogout']);
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


        $user = User::whereRaw("username = ? and password = ? and register_type = 1  or mobile = ? and password = ? and register_type = 2",[ $r["username"] , password_crypt($r["password"]),$r["username"] , password_crypt($r["password"]) ])->first();
        if(isset($user) ){

            \Auth::login($user);
            // 认证通过...
            \Auth::User()->update(["last_login_time"=>date("Y-m-d H:i:s",time())]);

            //
            if(!empty($r["returnUrl"])){
                return redirect($r["returnUrl"]);
            }

            return redirect("/");
        }

        //echo $r["returnUrl"];exit;


        return redirect('/login');
    }

    public function getLogout(){
        \Auth::logout();
        return redirect('/login');
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
        $code = $request->input("verify_code");
        $verify = Verify::whereRaw(" account = ? and unix_timestamp(created_at) > ?  ",[$request->input("mobile"),time()-config("sms.valid_time")])->orderBy('created_at', 'desc')->first();
        if(!($verify && $code != null && $verify->verify == $code)){
           return  redirect()->back()->withErrors("验证码不正确");
        }


        \Auth::login($this->create($request->all()));
        
        //
        return redirect("/");
    }


    /***
     * 验证码短信发送接口
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function verify_code(Request $request)
    {

        $mobile = $request->input("mobile");
        if(!preg_match("/^1[34578]{1}\d{9}$/",$mobile)){
            return response()->json(['code' => '400', 'message' => '请输入正确的手机号', "data" => ""]);
        }

        $verify = Verify::whereRaw(" account = ? and unix_timestamp(created_at) > ?  ",[$mobile,time()-config("sms.wait_time")])->orderBy('created_at', 'desc')->first();
        if($verify){
            return response()->json(['code' => '400', 'message' => '发送时间太频繁了', "data" => ""]);
        }


        $isPass = $this->captchaService->check($request->all());
        if(!$isPass){
            return response()->json(['code' => '400', 'message' => '验证失败,请过几分钟重试', "data" => ""]);
        }

        $this->smsService->sendVerify($mobile);

        return response()->json(['code' => '200', 'message' => '短信发送成功', "data" => ""]);
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
            'mobile' => $data['mobile'],
            'nickname' => substr_replace($data['mobile'],'****',3,4),
            'password' => password_crypt($data['password']),
            "register_time" => date("Y-m-d H:i:s",time()),
            "last_login_time"=> date("Y-m-d H:i:s",time()),
            "register_type"=>2
        ]);
    }
}
