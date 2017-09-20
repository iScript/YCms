<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;



class ArticleCategory extends Model
{
    //
    //use Searchable;


    protected $table = 'iz_article_category';
    //protected $fillable = ["title","content"];


    public function __construct()
    {

    }

    public function getChildrenAttribute()
    {

        return $this->where("pid",$this->id)->get();
    }

}
