<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\User;

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
        Gate::define('status_ticket', function (User $user) {
            foreach ($user->roles as $role) {
                if ($role->name == 'Admin' || $role->name == 'User') {
                    return true;
                };
            };
            return false;
        });

        Gate::define('edit-ticket', function (User $user) {
            foreach ($user->roles as $role) {
                if ($role->name == 'Admin') {
                    return true;
                };
            };
            return false;
        });
        Gate::define('create-ticket', function (User $user) {
            foreach ($user->roles as $role) {
                if ($role->name == 'User' || $role->name == 'Admin') {
                    return true;
                };
            };
            return false;
        });
    }
}
