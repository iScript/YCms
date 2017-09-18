<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//use Laravel\Scout\Searchable;


class Article extends Model
{
    //
    //use Searchable;


    protected $table = 'iz_article';
    protected $fillable = ["title","content"];


    public function __construct()
    {
        echo "init";
        echo request("u");

    }

}
