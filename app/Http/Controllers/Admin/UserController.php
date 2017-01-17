<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repositories\UserRepository;

class UserController extends Controller
{

    private $userRepository;

    public function __construct(UserRepository $userRepository )
    {
        $this->userRepository  = $userRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $users = $this->userRepository->index($request->all());

        return view('admin.user.index')->with("users",$users);
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


}
