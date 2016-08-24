<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Article extends Model
{
    use SoftDeletes;


    protected $table = 'iz_article';


    protected $fillable = ['title', 'description', 'content',"published_at","uid"];


    public function getStatusStringAttribute()
    {
        if($this->status == 0){
            return "未审核通过";

        }else{
            return "审核通过";

        }

        //return $this->email."--".$this->id."--".rand(1,100);
    }

    public function tags()
    {
        //多对多必须有一张枢纽表,不然无法实现多对多
        //第一个参数对应的模型,第二个参数枢纽表,第三个参数和本类的外键,第四个参数另一个
        return $this->belongsToMany('App\Models\Tag',"iz_tag_map_article","article_id","tag_id");
    }

    public function getTagsStringAttribute()
    {

        $str = "";
        foreach($this->tags as $key=>$value){
            $str .= $value->name." ";

        }

        return $str;
    }
}
