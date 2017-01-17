<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    //
    protected $table = 'iz_permission';
    protected $fillable = ['name', 'display_name', 'description'];

    public function roles(){
        return $this->belongsToMany(Role::class,"iz_permission_role");
    }

}
