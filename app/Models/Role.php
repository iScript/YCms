<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //

    protected $table = 'iz_role';
    protected $fillable = ['name', 'display_name', 'description'];

    public function permissions(){
        return $this->belongsToMany(Permission::class,"iz_permission_role");
    }

    public function givePermissions(Permission $permission){
        return $this->permissions()->save($permission);
    }
}
