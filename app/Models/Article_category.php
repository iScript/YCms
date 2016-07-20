<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article_category extends Model
{
    protected $table = 'iz_article_category';

    public function getChildrenAttribute()
    {

        return $this->where("pid",$this->id)->get();
    }
}
