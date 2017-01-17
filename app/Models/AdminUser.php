<?php

namespace App\Models;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class AdminUser extends Authenticatable
{
    use Notifiable;

    protected $table = 'iz_admin_user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['username',  "nickname", 'password', "register_time", "last_login_time"];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    //定义一号用户为超级用户
    public function getIsSuperAttribute()
    {
        return ($this->id == 1);
    }

    /***
     * 用户的角色
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class, "iz_role_user","user_id");
    }


    /***
     * 用户是否拥有某个角色
     * @param $role
     * @return bool
     */
    public function hasRole($role)
    {
        if (is_string($role)) {
            return $this->roles->contains("name", $role);
        }

        return !!$role->intersect($this->roles)->count();   // intersect 相交／交集。
    }

    /**
     * 给用户添加角色
     * @param $roleid
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function attachRole($roleid)
    {
        $role = Role::where('id', $roleid)->first();

        return $this->roles()->save($role);
    }
}
