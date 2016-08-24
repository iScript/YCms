<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
    protected $table = 'iz_tag';

    protected $fillable = ["name"];




    public function articles()
    {
        return $this->belongsToMany('App\Models\Article',"iz_tag_map_article","tag_id","article_id"); //多对多必须有一张枢纽表,不然无法实现多对多
    }


}
