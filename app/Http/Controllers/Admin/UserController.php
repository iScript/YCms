<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\RegisterRequest;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
     * @param  $id
     * @param  DeleteUserRequest $request
     * @return mixed
     */
    public function destroy($id)
    {
        //$result = User::find($id)->delete();
       // var_dump($result);
        //$this->users->destroy($id);
        //return redirect()->back()->withFlashSuccess(trans('alerts.backend.users.deleted'));
    }



    protected function createUser(array $data)
    {
        $email = !empty($data['email'])  ? $data['email'] : null;   //email可为空
        //var_dump($email);exit;
        return User::create([
            'username' => $data['username'],
            'email' => $email,
            'password' => sha1($data['password']),
            "register_time" => date("Y-m-d H:i:s",time()),
            "last_login_time"=> date("Y-m-d H:i:s",time()),
        ]);
    }




}
