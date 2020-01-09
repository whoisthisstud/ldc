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

        Gate::define('access-testing', function ($user) {
            return $user->hasRole('superadmin');
        });

        Gate::define('manage-dashboard', function ($user) {
            return $user->hasAnyRoles(['superadmin','admin']);
        });

        Gate::define('manage-states', function ($user) {
            return $user->hasAnyRoles(['superadmin','admin']);
        });

        Gate::define('manage-cities', function ($user) {
            return $user->hasAnyRoles(['superadmin', 'admin']);
        });

        Gate::define('manage-businesses', function ($user) {
            return $user->hasAnyRoles(['superadmin','admin','business-manager']);
        });

        Gate::define('manage-discounts', function ($user) {
            return $user->hasAnyRoles(['superadmin','admin','business-manager','business-user']);
        });

        Gate::define('manage-users', function ($user) {
            return $user->hasAnyRoles(['superadmin','admin']);
        });

        Gate::define('manage-faqs', function ($user) {
            return $user->hasAnyRoles(['superadmin','admin']);
        });
    }
}
