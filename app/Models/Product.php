<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'iz_product';

    protected $fillable = ["title","description","content","cat_id","uid","picture","price","status"];


    public function category(){
        return $this->belongsTo('App\Models\Product_category',"cat_id");
    }

}
