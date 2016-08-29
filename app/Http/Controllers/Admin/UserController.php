<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\RegisterRequest;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Repositories\UserRepository;

class UserController extends Controller
{


    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        //parent::__construct();

        $this->userRepository = $userRepository;
        view()->share('roles', Role::all());    // 共享视图


    }




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


//        $user = $this->userRepository->getById(1);
//        var_dump($user);

        $users = User::paginate(10);
        return view('admin.user.index')->with("users",$users);
    }




    /**
     * User create.
     *
     * @return View
     */
    public function create()
    {
        return view('admin.user.create');
    }



    public function store(RegisterRequest $request)
    {
        $this->createUser($request->all());
        return redirect("admin/user");

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $obj = User::findOrFail($id);

        return view('admin.user.edit')->with("obj",$obj);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $this->updateUser($user,$request->except("id"));
        return redirect("admin/user");
    }


    /**
     * @param  $id
     * @param  DeleteUserRequest $request
     * @return mixed
     */
    public function destroy($id)
    {
        $result = User::find($id)->delete();
        return response()->json(["code"=>200,"message"=>"删除成功","data"=>[]]);
        //var_dump($result);
//        if($result == true){
//
//        }
//        return response()->json(["code"=>400,"message"=>"删除失败","data"=>[]]);

    }



    protected function createUser(array $data)
    {
        $email = !empty($data['email'])  ? $data['email'] : null;   //email可为空
        //var_dump($email);exit;
        $user =  User::create([
            'username' => $data['username'],
            'email' => $email,
            'password' => password_crypt($data['password']),
            "register_time" => date("Y-m-d H:i:s",time()),
            "last_login_time"=> date("Y-m-d H:i:s",time()),
        ]);

        if(!empty($data["role_id"])){
            $user->roles()->detach();
            $user->attachRole($data["role_id"]);

        }

        return $user;
    }

    protected function updateUser(User $user ,array $data)
    {

        if($data["password"] == ""){
            unset($data["password"]);
        }else{
            $data["password"] = password_crypt($data['password']);

        }

        $user->update($data);

        if(isset($data["role_id"])){
            $user->roles()->detach();
            if($data["role_id"] != "0"){
                $user->attachRole($data["role_id"]);
            }
        }

        return $user;
    }




}
