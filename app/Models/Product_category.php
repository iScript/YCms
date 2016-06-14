<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product_category extends Model
{
    //
    protected $table = 'iz_product_category';



    protected $appends = ['children'];

    public function getChildrenAttribute()
    {

        return $this->where("pid",$this->id)->get();
    }

}
