<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Tag;


class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

//        $a = Article::find(28);
//        var_dump($a->tags()->get());
//        $a->tags()->sync([3]);
//        exit;
        $list = Article::orderBy('id', 'DESC')->paginate(2);


        //$list->appends(['sort' => 'votes']);
        return view('admin.article.index')->with("list",$list);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * -ykq
     */
    public function create()
    {
        //
        return view('admin.article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        //
        $input = $request->all();
        $input["published_at"] = date("Y-m-d H:i:s",time());
        $input["uid"] = 0;
        $article = Article::create($input);

        $tags = [];
        foreach( explode(" ",$input["tags"]) as $key => $value ){
            $tag = Tag::firstOrCreate(['name' => $value]);
            $tags[] = $tag->id;
        }
        $article->tags()->attach($tags);


        return redirect("admin/article");

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
        $article = Article::findOrFail($id);

        return view('admin.article.edit')->with("article",$article);;
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

        $input = $request->all();

        $article = Article::find($id);
        $article->update($request->except("id"));

        $tags = [];
        foreach( explode(" ",$input["tags"]) as $key => $value ){
            $tag = Tag::firstOrCreate(['name' => $value]);
            $tags[] = $tag->id;
        }
        $article->tags()->sync($tags);

        return redirect("admin/article");


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $result = Article::find($id)->delete();
        if($result == true){
            return response()->json(["code"=>200,"message"=>"删除成功","data"=>[]]);
        }
        return response()->json(["code"=>400,"message"=>"删除失败","data"=>[]]);
    }
}
