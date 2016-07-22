<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\EntrustPermission;
class Permission extends EntrustPermission
{
    protected $fillable = ['name', 'display_name', 'description'];
}
