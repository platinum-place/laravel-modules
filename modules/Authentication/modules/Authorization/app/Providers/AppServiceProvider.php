<?php

namespace Modules\Authentication\modules\Authorization\app\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->register(\Spatie\Permission\PermissionServiceProvider::class);
        $this->app->register(ConfigServiceProvider::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__.'/../../database/migrations');
    }
}
