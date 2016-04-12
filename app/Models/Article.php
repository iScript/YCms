<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Article extends Model
{
    use SoftDeletes;


    protected $table = 'iz_articles';


    protected $fillable = ['title', 'description', 'content',"published_at","uid"];

}
