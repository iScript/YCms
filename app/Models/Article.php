<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Article extends Model
{
    use SoftDeletes;


    protected $table = 'iz_articles';


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
}
