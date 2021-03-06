<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\TranslateGroup' => 'App\Policies\GroupPolicy',
        'App\Manga' => 'App\Policies\MangaPolicy',
        'App\Videos' => 'App\Policies\LeaderMemberPolicy',
        'App\User' => 'App\Policies\UserPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $this->registerSideBarAccess();

        //
    }

    public function registerSideBarAccess()
    {
        Gate::define('access-admin-right', 'App\Policies\SideBarAccess@access_admin_right');
        // Copyright Permission
        Gate::define('access-copyright', 'App\Policies\SideBarAccess@access_copyright');

        Gate::define('assign-task', 'App\Policies\SideBarAccess@assignTask');
        Gate::define('change-settings', 'App\Policies\SideBarAccess@changeSettings');
        Gate::define('access-finance', 'App\Policies\SideBarAccess@accessFinance');
        
        Gate::define('both-leader-member','App\Policies\SideBarAccess@both_leader_member');
        Gate::define('only-leader', 'App\Policies\SideBarAccess@only_leader');
        Gate::define('only-member', 'App\Policies\SideBarAccess@only_member');
        // Manga Permission
        Gate::define('view-manga', 'App\Policies\SideBarAccess@viewMangaLists');
        Gate::define('create-manga', 'App\Policies\SideBarAccess@createNewManga');
        Gate::define('update-manga', 'App\Policies\SideBarAccess@updateManga');
        Gate::define('delete-manga', 'App\Policies\SideBarAccess@deleteManga');
        
        // Group Permission
        Gate::define('view-group', 'App\Policies\SideBarAccess@viewGroupLists');
        Gate::define('create-group', 'App\Policies\SideBarAccess@createNewGroup');
        Gate::define('update-group', 'App\Policies\SideBarAccess@updateGroup');
        Gate::define('delete-group', 'App\Policies\SideBarAccess@deleteGroup');
        // User Permission
        Gate::define('view-user', 'App\Policies\SideBarAccess@viewUserLists');
        Gate::define('create-user', 'App\Policies\SideBarAccess@createNewUser');
        Gate::define('update-user', 'App\Policies\SideBarAccess@updateUser');
        Gate::define('delete-user', 'App\Policies\SideBarAccess@deleteUser');
        // Video Permission
        Gate::define('view-video', 'App\Policies\SideBarAccess@viewVideoLists');
        Gate::define('create-video', 'App\Policies\SideBarAccess@createVideo');
        Gate::define('update-video', 'App\Policies\SideBarAccess@updateVideo');
        Gate::define('delete-video', 'App\Policies\SideBarAccess@deleteVideo');
    }
}
