<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

use Zizaco\Entrust\Traits\EntrustUserTrait;


class User extends Authenticatable
{
    



    use SoftDeletes;

    use EntrustUserTrait{
        EntrustUserTrait::restore insteadof SoftDeletes;
        EntrustUserTrait::can as allow;
    }


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'iz_user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     * 哪些值支持批量复制, create批量赋值必须制定 fillable 或 guarded
     */
    protected $fillable = ['username', 'email', 'password',"register_time","last_login_time"];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];



    // 附加属性
    protected $appends = ['is_super'];
    public function getIsSuperAttribute()
    {
        return ($this->id == 1);
    }

    public function roles()
    {
        return $this->belongsToMany('App\Models\Role','iz_role_user','user_id');
    }

}
