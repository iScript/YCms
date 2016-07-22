<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Role::paginate(10);
        return view('admin.role.index')->with("list",$list);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.role.create');
    }

    /**
     * 添加角色方法
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * author 袁克强
     */
    public function store(Request $request)
    {
        Role::create($request->all());
        return redirect("admin/role");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $obj = Role::findOrFail($id);

        return view('admin.role.edit')->with("obj",$obj);
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
        $obj = Role::findOrFail($id);
        $obj->update($request->except("id"));
        return redirect("admin/role");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = Role::find($id)->delete();
        return response()->json(["code"=>200,"message"=>"删除成功","data"=>[]]);
    }

    public function permissions($id)
    {


        $role = Role::find($id);



        //$permissions = $this->permission->topPermissions();

        $rolePermissions = $role->perms()->get(); //当前角色拥有的权限
        $rolePerms = [];
        foreach ($rolePermissions as $item) {
            $rolePerms[] = $item->name;
        }

        //print_r($rolePermissions);

        $permissions = Permission::all();
        $p = array();
        foreach($permissions as $k => $v){
            $pa = explode(".",$v->name);
            if(count($pa) == 3  ){
                $p[$pa[1]][] = $v;
            }

        }
        //print_r($p);


        //var_dump($rolePermissions);exit;
        return view('admin.role.permissions', compact('role', 'rolePerms',"p"));
    }

    public function storePermissions($id,Request $request)
    {
        $permissions = $request->input('permissions', []);
        Role::find($id)->perms()->sync($permissions);

        //print_r($permissions);
        return redirect("admin/role/".$id."/permissions");
    }
}
