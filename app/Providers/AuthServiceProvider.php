<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        if(!empty($_SERVER['SCRIPT_NAME']) && strtolower($_SERVER['SCRIPT_NAME']) ==='artisan' ){
            return false;
        }
        return;
        $this->registerPolicies();

        // 这里还要判断下是否是前台后台，如果是前台就直接返回false，不定义acl

        //
        foreach($this->getPermissions() as $permission ){
            Gate::define($permission->name,function( $user) use ($permission){
                return $user->hasRole($permission->roles);
            });
        }
    }

    protected function getPermissions(){
        return Permission::with("roles")->get();
    }
}
