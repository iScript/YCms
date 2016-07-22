<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\SoftDeletes;

use Zizaco\Entrust\Traits\EntrustUserTrait;


class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword{

        Authorizable::can insteadof EntrustUserTrait;
    }
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
    protected $table = 'iz_users';

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
    protected $appends = ['is_admin'];
    public function getIsAdminAttribute()
    {
        return $this->email."--".$this->id."--".rand(1,100);
    }

    public function roles()
    {
        return $this->belongsToMany('App\Models\Role','iz_role_user','user_id');
    }

}
