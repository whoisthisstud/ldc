<?php

namespace App\Providers;

use View;
use App\City;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->isLocal()) {
            $this->app->register(TelescopeServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $active_count = City::where('is_active',true)
            ->where('deleted_at',null)
            ->count();
        View::share('active_count', $active_count);
    }
}
