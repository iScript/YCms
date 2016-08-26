<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Verify extends Model
{
    //
    protected $table = 'iz_verify';
    protected $fillable = ["uid","type","account","verify","ip","state"];



}
