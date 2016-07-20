<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class test2
 * @package App\Models
 */
class test2 extends Model
{
    use SoftDeletes;

    public $table = 'test2s';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'testt'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'testt' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'testt' => 'required'
    ];
}
