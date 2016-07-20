<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Product_category as Category;

class Product_categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Category::where("pid","0")->paginate(10);


        return view('admin.product_category.index')->with("list",$list);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $category = Category::where("pid","0")->get();
        return view('admin.product_category.create')->with("category",$category);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $name = $request->input("name");
        $category = new Category;
        $category->name = $name;
        $category->pid = $request->input("pid");
        $category->save();
        return redirect("admin/product_category");

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
        $category = Category::where("pid","0")->get();;
        $obj = Category::find($id);
        return view('admin.product_category.edit',["category"=>$category,"obj"=>$obj]);
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
        //
        $category = Category::find($id);
        $category->name = $request->input("name");
        $category->save();
        return redirect("admin/product_category");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = Category::find($id)->delete();
        if($result == true){
            return response()->json(["code"=>200,"message"=>"删除成功","data"=>[]]);
        }
        return response()->json(["code"=>400,"message"=>"删除失败","data"=>[]]);
    }
}
