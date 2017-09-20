<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//use Laravel\Scout\Searchable;


class Article extends Model
{
    //
    //use Searchable;


    protected $table = 'iz_article';
    protected $fillable = ["title","content","description","is_top","is_hot","is_rec","cid"];


//    public function __construct()
//    {
//
//    }

}
