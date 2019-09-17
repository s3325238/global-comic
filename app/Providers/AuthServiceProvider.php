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
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        $this->registerSideBarPermission();

        $this->registerSideBarAccess();

        //
    }

    public function registerSideBarAccess()
    {
        Gate::define('editAll','App\Policies\SideBarAccess@editAll');
        Gate::define('changeSettings','App\Policies\SideBarAccess@changeSettings');
        // User Permission
        Gate::define('viewUserLists','App\Policies\SideBarAccess@viewUserLists');
        Gate::define('createNewUser','App\Policies\SideBarAccess@createNewUser');
        Gate::define('updateUser','App\Policies\SideBarAccess@updateUser');
        Gate::define('deleteUser','App\Policies\SideBarAccess@deleteUser');
    }

    public function registerSideBarPermission()
    {
        Gate::define('isAdmin','App\Policies\sideBarPermissionPolicy@isAdmin');
    }
}
